<?php

foreach (["coupons.php", "payments.php", "packages.php", "addations.php", "ads.php", "ad_type.php", "republished_packages.php","news_subscriptions.php"] as  $value) {
    require_once(module_path('QSale', 'Routes/dashboard/' . $value));
}
