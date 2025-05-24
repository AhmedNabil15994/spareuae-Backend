<?php

namespace Modules\User\Entities;

use Modules\QSale\Entities\Ads;
use Modules\QSale\Entities\Payment;
use Modules\User\Enums\UserType;
use Modules\QSale\Enum\AdsStatus;
use Illuminate\Support\Facades\DB;
use Modules\Area\Entities\Country;
use Modules\User\Entities\Company;
use Modules\Apps\Entities\Donation;
use Modules\Garage\Entities\Garage;
use Illuminate\Support\Facades\Hash;
use Modules\Core\Traits\ScopesTrait;
use Spatie\Permission\Traits\HasRoles;
use Modules\Core\Traits\CasscadeAttach;
use Modules\Question\Entities\Question;
use Illuminate\Notifications\Notifiable;
use Modules\QSale\Entities\Subscription;
use Modules\Core\Traits\ClearsResponseCache;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\DeviceToken\Entities\DeviceToken;
use Modules\Core\Filters\Search\SearchManager;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Spatie\Translatable\HasTranslations;



class User extends Authenticatable implements HasLocalePreference
{
    use Notifiable;
    use ScopesTrait;
    use HasRoles;
    use SearchManager;
    use ClearsResponseCache;

    use CasscadeAttach;

    use HasTranslations;
    use SoftDeletes;


    protected $dates = [
        'deleted_at'
    ];

    protected $with = [];
    protected $guard_name = 'web';
    public $translatable = ['setting.show_account'];


    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_active'      => 1,
        "admin_verified" => 1,
        "number_of_free" => 0,
    ];

    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'image', 'phone_code', "type",
        "is_active", "code_verified", "setting", "country_id", "type", "is_verified", "firebase_uuid",
        "admin_verified"
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        "setting" => "array",
        "is_verified" => "boolean"
    ];

    public function setPasswordAttribute($value)
    {
        if ($value === null || !is_string($value)) {
            return;
        }
        $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    public function deviceTokens()
    {
        return $this->hasMany(DeviceToken::class, "user_id");
    }

    public function ads()
    {
        return $this->hasMany(\Modules\QSale\Entities\Ads::class, "user_id");
    }

    public function adsAllow()
    {
        return $this->hasMany(\Modules\QSale\Entities\Ads::class, "user_id")
            ->allowShow();
    }


    public function adsFavorites()
    {
        return $this->belongsToMany(Ads::class, "favorites", "user_id", "ads_id")
            ->withTimestamps();
    }


    public function rates()
    {
        return $this->hasMany(UserRate::class, "user_id");
    }


    public function scopeWithAvgRate($query)
    {
        $query->withCount([
            "rates as rates_avg" => function ($query) {
                $query->select(DB::raw('ROUND( IFNULL(AVG(user_rates.rate),0) , 1)'));
            },
            "rates"
        ]);
    }

    public function givingRates()
    {
        return $this->hasMany(UserRate::class, "from_id");
    }



    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function office()
    {
        return $this->hasOne(Office::class, 'user_id');
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'user_id');
    }


    public function currentSubscription()
    {
        return $this->hasOne(Subscription::class, 'user_id')->where("is_default", true);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'user_id');
    }

    public function scopeUser($query)
    {
        return $query->whereIn('type', ["user","show"]);
    }

    public function scopeShow($query)
    {
        return $query->whereIn('type', ["show"]);
    }
    public function scopeAdsCount($query)
    {
        return $query->withCount("adsAllow");
    }

    public function scopeCompanyType($query)
    {
        return $query;
        // ->where("type", UserType::COMPANY);
    }
    public function scopeTechnicalType($query)
    {
        return $query;
        // ->where("type", UserType::TECHNICAL);
    }
    public function scopeOfficeUser($query)
    {
        return $query->where('type', "office");
    }

    public function scopeAdminUser($query)
    {
        return $query->where('type', "admin");
    }



    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function preferredLocale()
    {
        return isset($this->setting["lang"]) ? $this->setting["lang"] : locale();
    }

    public function getPhone()
    {
        return $this->phone_code . $this->mobile;
    }



    public function scopeSearchFilter($query, &$request)
    {
    }


    public function scopeAllowShow($query)
    {
        $query->where("is_active", 1)->where("admin_verified", 1);
    }



    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function garages()
    {
        return $this->hasMany(Garage::class);
    }



    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function translateOrDefault($locale = null)
    {
        return $this;
    }
}
