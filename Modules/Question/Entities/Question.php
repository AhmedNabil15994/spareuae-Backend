<?php

namespace Modules\Question\Entities;

use Modules\Core\Traits\ScopesTrait;
use Modules\Comment\Entities\Comment;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\HasTranslations;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Question\Entities\QuestionTranslation;
// use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Question extends Model
{
    use  SoftDeletes, ScopesTrait;

    protected $guarded     = ['id'];
    // public  $translatable  = ['question', 'answer'];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
