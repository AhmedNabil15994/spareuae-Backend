<?php

namespace Modules\Apps\Http\Controllers\Api;

use Notification;
use Illuminate\Http\Request;
use Modules\Apps\Entities\Contact;
use Modules\Apps\Entities\Donation;
use Modules\Apps\Http\Requests\Api\DonationRequest;
use Modules\Apps\Repositories\Api\DonationRepository;
use Modules\Apps\Transformers\Api\DonationResource;

class DonationController extends ApiController
{

    public $repo;
    public function __construct(DonationRepository $repo)
    {
        $this->repo = $repo;
    }
    public function store(DonationRequest $request)
    {

        $donation =  $this->repo->store($request);
        return $this->response(
            new DonationResource($donation)
        );
    }
}
