<?php

namespace Modules\Garage\Entities;

use Carbon\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Modules\Course\Entities\Course;
use Modules\Core\Traits\ScopesTrait;
use Modules\Comment\Entities\Comment;
use Modules\Projects\Entities\Project;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

class Garage extends Model implements HasMedia
{
    use SoftDeletes;
    use ScopesTrait;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'address',
        'status',
        'is_certified',
        'mobile',
        'info',
        'desc',
        'user_id',
    ];
    protected $casts = [
        'info'            =>  SchemalessAttributes::class,
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeWithInfo(): Builder
    {
        return $this->info->modelScope();
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
