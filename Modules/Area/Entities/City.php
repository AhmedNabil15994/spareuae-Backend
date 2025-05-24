<?php

namespace Modules\Area\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Modules\Core\Traits\ClearsResponseCache;
use Modules\Core\Traits\ScopesTrait;

class City extends Model implements TranslatableContract
{
    use Translatable, SoftDeletes, ScopesTrait;
    // use ClearsResponseCache;

    protected $with = ['translations'];
    protected $guarded = ['id'];
    public $translatedAttributes = ['title', 'slug'];
    public $translationModel = CityTranslation::class;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
