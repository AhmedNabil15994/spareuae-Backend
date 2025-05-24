<?php

namespace Modules\QSale\Enum;

class AddationType extends \SplEnum
{

    const NORMAL = 'sticky_ads';
    const Premium = 'premium';
    public static $icons = [
        1 => "<i class='fas fa-clipboard-check'></i>",
        2 => " <i class='fas fa-fire'></i>"
    ];
}
