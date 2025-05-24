<?php

namespace Modules\Customer\Entities;

use Spatie\MediaLibrary\HasMedia;
use Modules\Core\Traits\ScopesTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Modules\Core\Traits\Dashboard\CrudModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model implements HasMedia
{

    use InteractsWithMedia;
    use ScopesTrait;
    protected $fillable = [
        'status',
    ];
}
