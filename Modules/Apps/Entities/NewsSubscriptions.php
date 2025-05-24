<?php

namespace Modules\Apps\Entities;

use Modules\Core\Traits\ScopesTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\CasscadeAttach;
use Spatie\Translatable\HasTranslations;
use Modules\Core\Traits\ClearsResponseCache;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsSubscriptions extends Model
{
    use SoftDeletes, ScopesTrait, ClearsResponseCache;
    use CasscadeAttach;
    protected $fillable = ['email'];
    public $timestamps = true;
}
