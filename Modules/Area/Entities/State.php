<?php

namespace Modules\Area\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Modules\Core\Traits\ClearsResponseCache;
use Modules\Core\Traits\ScopesTrait;

class State extends Model implements TranslatableContract
{
    use Translatable, SoftDeletes, ScopesTrait;
    // use ClearsResponseCache;

    protected $with = ['translations'];
    protected $guarded = ['id'];
    public $translatedAttributes = ['title', 'slug'];
    public $translationModel = StateTranslation::class;

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
