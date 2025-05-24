<?php

view()->composer([
    'apps::frontend.index',
], Modules\Brand\ViewComposers\Frontend\BrandComposer::class);
