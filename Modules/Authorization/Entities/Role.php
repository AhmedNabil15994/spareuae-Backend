<?php

namespace Modules\Authorization\Entities;

use Spatie\Permission\Models\Role as SpatieRole;
use Modules\Core\Traits\HasTranslations;

class Role extends SpatieRole
{
    use HasTranslations;

    public $translatable = ['display_name'];

    public function translateOrDefault($locale = null)
    {
        return $this->display_name;
    }
}
