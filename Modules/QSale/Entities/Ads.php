<?php

namespace Modules\QSale\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Area\Entities\City;
use Modules\Area\Entities\Country;
use Modules\Area\Entities\State;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Modules\Comment\Entities\Comment;
use Modules\Core\Traits\ClearsResponseCache;
use Modules\Core\Traits\ScopesTrait;
use Modules\QSale\Concerns\AdsTrait;
use Modules\QSale\Entities\AdsAddation;
use Modules\QSale\Entities\AdsAttribute;
use Modules\QSale\Entities\AdsOrder;
use Modules\QSale\Entities\Gallery;
use Modules\QSale\Entities\Subscription;
use Modules\User\Entities\Office;
use Modules\User\Entities\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
// use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Ads extends Model implements HasMedia
{
    use InteractsWithMedia,
    ScopesTrait,
    AdsTrait,
    HasSlug,
    ClearsResponseCache,
    SoftDeletes,
        HasTranslations;

    protected $guarded = ["id"];
    public $translatable = ['description', "title","special_specification","malfunctions"];

    protected $casts = [
        "hide_private_number" => "boolean",
        "price" => "double",
        "ads_price" => "double",
        'settings' => SchemalessAttributes::class,
    ];

    protected $dates = [
        "published_at",
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['title'])
            ->saveSlugsTo('slug');
    }

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function registerMediaConversions($media = null): void
    {
        if (strpos($media->mime_type, "video") !== false) {
            $this->addMediaConversion('thumb')
                ->width(368)
                ->height(232)
                ->extractVideoFrameAtSecond(1)
                ->queued();
        } else {
            // $this->addMediaConversion('thumb')
            //     ->watermark(public_path("/uploads/default.png"))
            //     ->watermarkOpacity(50)
            //     ->sharpen(10)
            //     ->watermarkPosition(Manipulations::POSITION_TOP_LEFT)
            //     ->watermarkHeight(20, Manipulations::UNIT_PERCENT)
            //     ->watermarkWidth(20, Manipulations::UNIT_PERCENT)
            //     // ->noQueued()
            //     ;
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, "subscription_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function office()
    {
        return $this->belongsTo(Office::class, "office_id");
    }
    public function userFavorites()
    {
        return $this->belongsToMany(User::class, "favorites", "ads_id", "user_id")
            ->withTimestamps();
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function attributes()
    {
        return $this->hasMany(AdsAttribute::class, "ads_id");
    }

    public function republishes()
    {
        return $this->hasMany(AdsRepublished::class, "ads_id");
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class, "ads_id");
    }

    public function address()
    {
        return $this->hasMany(AdsAddress::class, "ads_id");
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, "ads_id");
    }

    public function addations()
    {
        return $this->hasMany(AdsAddation::class, "ads_id");
    }

    public function addationsModel()
    {
        return $this->belongsToMany(Addation::class, "ads_addations", "ads_id", "addation_id")
            ->withPivot("price")->withTimestamps();
    }

    public function adTypes()
    {
        return $this->belongsToMany(AdType::class, "ads_ad_types", "ads_id", "ad_type_id")
            ->withTimestamps();
    }

    public function adsOrders()
    {
        return $this->hasMany(AdsOrder::class, "ads_id");
    }

    public function payment()
    {
        return $this->morphOne(Payment::class, "order");
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public static function getMainWith()
    {
        return [
            "user", "media", "addations", "attributes", "category", "user.company", "country", "address",
        ];
    }

    public function scopeWithSettings(): Builder
    {
        return $this->settings->modelScope();
    }

    public function translateOrDefault($locale = null)
    {
        return $this;
    }
}
