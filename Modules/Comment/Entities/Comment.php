<?php

namespace Modules\Comment\Entities;

use Modules\User\Entities\User;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

class Comment extends Model
{

    protected $guarded = [];

    protected $casts = [
        'info'            =>  SchemalessAttributes::class,
    ];



    /**
     * Get the user that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function scopeWithInfo(): Builder
    {
        return $this->info->modelScope();
    }
}
