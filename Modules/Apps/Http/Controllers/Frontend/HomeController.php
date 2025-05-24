<?php

namespace Modules\Apps\Http\Controllers\Frontend;

use App\Imports\DataImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Attribute\Entities\Option;
use Modules\QSale\Enum\AdsType;
use Modules\Brand\Entities\Brand;
use Illuminate\Routing\Controller;
use Modules\Apps\Entities\Contact;
use Modules\Apps\Entities\NewsSubscriptions;
use Modules\QSale\Entities\AdType;
use Illuminate\Support\Facades\Notification;
use Modules\QSale\Repositories\Api\SubscriptionRepository;
use Modules\QSale\Repositories\Frontend\AdsRepository;
use Modules\Apps\Http\Requests\Frontend\ContactUsRequest;
use Modules\Apps\Http\Requests\Frontend\SubscribeNewsRequest;

use Modules\Apps\Notifications\Api\ContactUsNotification;
use Modules\Area\Entities\Country;
use Modules\Category\Repositories\FrontEnd\CategoryRepository;
use Modules\Customer\Entities\Customer;
use Modules\QSale\Repositories\Frontend\PaymentRepository;
use Modules\Slider\Repositories\Frontend\SliderRepository;
use Modules\QSale\Repositories\Frontend\PackageRepository;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct(
        public AdsRepository $adsRepository,
        public CategoryRepository $categoryRepository,
        public PackageRepository $packageRepository,
        public SubscriptionRepository $subscriptionRepo

    ) {
    }
    public function index(Request $request)
    {
        $data['categories'] = $this->categoryRepository->mainCategories('sort');
        $displayData = [];
        $categories = [8,1,2,3,11];
        foreach($categories as $category){
            $request['category_id'] = $category;
            $displayData[] = [
                'category_id' => $category,
                'data' => $this->adsRepository->listActive($request),
            ];
        }
        $data['displayData'] = $displayData;
//        $data['adsRecommend'] = $this->adsRepository->listAdsRecommend(["media", "addationsModel", "category.ancestors", "address"], 8);
//        $data['sliders']  = $this->sliderRepository->getAllActive();
//        $data['brands']   = Brand::active()->get();
//        $data['types']    = AdType::active()->get();
//        $data['countries'] = Country::active()->get();
//        $data['customers'] = Customer::active()->get();
        return view("apps::frontend.index", $data);
    }

    public function contactUs()
    {
        return view('apps::frontend.contact-us');
    }

    public function sendContactUs(ContactUsRequest $request)
    {
        $contact = Contact::create($request->validated());

        try {
            Notification::route('mail', setting('contact_us', 'email'))
                ->notify((new ContactUsNotification($request))->locale(locale()));
        } catch (\Throwable $th) {
        }

        return redirect()->back()->with(['success' => __('apps::frontend.contact_us.alerts.send_message')]);
    }

    public function subscribeToNews(SubscribeNewsRequest $request){
        $subscribe = NewsSubscriptions::create($request->validated());
        return redirect()->back()->with(['success' => __('apps::frontend.contact_us.alerts.send_message')]);
    }

   public function pricing(Request $request)
    {
        $errorsArr = [];
        $packages =  $this->packageRepository->getAll($request);
        if(isset($request->package_id) && (int) $request->package_id > 0){
            if(!auth()->check()){
                $errorsArr = [__('authentication::frontend.must_be_login')];
                return view("apps::frontend.pricing", compact("packages","errorsArr"));
            }

            // Handle Pricing Here
            $packageObj = $this->packageRepository->findById($request->package_id);
            $total = $packageObj->price;
            $start_date = date('Y-m-d');
            $user = auth()->user();
            if(
                $user->currentSubscription &&
                date('Y-m-d',strtotime($user->currentSubscription->end_at)) > date('Y-m-d') &&
                $user->currentSubscription->package_id != $request->package_id
            ){
                $leftDays = diffTwoDates($user->currentSubscription->end_at,date('Y-m-d'));
                $mustPaid = round( (($packageObj->price / $packageObj->duration) * $leftDays) ,2);
                $total = $mustPaid;
                $start_date = $user->currentSubscription->start_at;
            }

            $subscriptionObj = $this->subscriptionRepo->createSubscription($packageObj,$total,$start_date);
            $payment = $this->subscriptionRepo->paymentHandler($subscriptionObj);
            $url = $payment ? $this->packageRepository->getUrlPayment($payment, "frontend-order") : "";
            if($url != ""){
                return  redirect()->away($url);
            }
        }
        return view("apps::frontend.pricing", compact("packages"));
    }

    public function getById(Request  $request) {
        return response()->json([
            'success' => true,
            'data'  => Option::whereIn('id',Option::where([['status',1],['id',$request->ids]])->first()->related_options ?? [])->get(),
        ]);
    }
}
