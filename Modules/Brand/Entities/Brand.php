<?php

namespace Modules\Brand\Entities;

use Carbon\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Modules\Course\Entities\Course;
use Modules\Core\Traits\ScopesTrait;
use Modules\Projects\Entities\Project;
use Illuminate\Database\Eloquent\Model;
use Modules\Question\Entities\Question;
use Modules\Core\Traits\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model implements HasMedia
{
    use SoftDeletes;
    use ScopesTrait;
    use InteractsWithMedia;
    use HasTranslations;

    protected $fillable = ['title', 'desc', 'status'];
    public $translatable  = ['title', 'desc'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
