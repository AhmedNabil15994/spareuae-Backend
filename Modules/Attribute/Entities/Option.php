<?php

namespace Modules\Attribute\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;
use Spatie\Translatable\HasTranslations;
use Modules\Core\Traits\ClearsResponseCache;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

class Option extends Model
{
    use HasTranslations;
    use SchemalessAttributesTrait;
    use ClearsResponseCache;
    use HasJsonRelationships, HasTranslations {
        HasJsonRelationships::getAttributeValue as getAttributeValueJson;
        HasTranslations::getAttributeValue as getAttributeValueTranslations;
    }
    public function getAttributeValue($key)
    {
        if (!$this->isTranslatableAttribute($key)) {
            return $this->getAttributeValueJson($key);
        }
        return $this->getAttributeValueTranslations($key);
    }

    public $translatable = ['value'];
    protected $guarded 				    	= ['id'];

    protected $casts = [
        'validation' => 'boolean',

    ];

    protected $schemalessAttributes = [
        'related_options',
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class, "attribute_id");
    }

    public function translateOrDefault($locale = null)
    {
        return $this;
    }

    public function parent()
    {
        return $this->belongsTo(Attribute::class, 'parent_id');
    }

    public function related(){
        return $this->belongsToJson(self::class, 'related_options');
    }
}
