<?php

namespace Modules\Attribute\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Attribute;
use Modules\Category\Entities\Option;

class AttributeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

//        $this->createBaseAttributes();
//        $this->createBaseOptions();
        // $this->call("OthersTableSeeder");
    }

    public function createBaseAttributes(){
        $data = [
            [
                'name' => [
                    'ar' => 'العداد',
                    'en' => 'Counter',
                ],
                'status' => 1,
                'show_in_search' => 0,
                'allow_from_to' => 0,
                'type' => 'text',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 1,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
            ],
            [
                'name' => [
                    'ar' => 'حجم السيارة',
                    'en' => 'Car Size',
                ],
                'status' => 1,
                'show_in_search' => 0,
                'allow_from_to' => 0,
                'type' => 'text',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 1,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
            ],
            [
                'name' => [
                    'ar' => 'مكان تواجد السيارة',
                    'en' => 'Location',
                ],
                'status' => 1,
                'show_in_search' => 0,
                'allow_from_to' => 0,
                'type' => 'text',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 1,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
            ],
            [
                'name' => [
                    'ar' => 'مكان مقود السيارة',
                    'en' => 'Wheel Position',
                ],
                'status' => 1,
                'show_in_search' => 0,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 1,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'يمين',
                            'en' => 'Right',
                        ],
                    ],
                    [
                        'is_default' => 1,
                        'status' => 1,
                        'value' => [
                            'ar' => 'يسار',
                            'en' => 'Left',
                        ]
                    ]
                ],
            ],
            [
                'name' => [
                    'ar' => 'الناقل',
                    'en' => 'Transporter',
                ],
                'status' => 1,
                'show_in_search' => 0,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 1,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'اوتوماتيك',
                            'en' => 'Automatic',
                        ],
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'يدوي',
                            'en' => 'Manual',
                        ]
                    ]
                ],
            ],
            [
                'name' => [
                    'ar' => 'نوع الوقود',
                    'en' => 'Fuel Type',
                ],
                'status' => 1,
                'show_in_search' => 0,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 1,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'بترول',
                            'en' => 'Petrol',
                        ],
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'غاز طبيعي',
                            'en' => 'Gas',
                        ]
                    ]
                ],
            ],
            [
                'name' => [
                    'ar' => 'السليندرات',
                    'en' => 'Cylinders',
                ],
                'status' => 1,
                'show_in_search' => 0,
                'allow_from_to' => 1,
                'type' => 'number',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 6,
                    'min' => 3,
                    'is_int' => 0,
                    'required' => 1,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
            ],
            [
                'name' => [
                    'ar' => 'لون السيارة',
                    'en' => 'Color',
                ],
                'status' => 1,
                'show_in_search' => 0,
                'allow_from_to' => 0,
                'type' => 'text',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 1,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
            ],
            [
                'name' => [
                    'ar' => 'رقم الشاصي',
                    'en' => 'Vin No',
                ],
                'status' => 1,
                'show_in_search' => 0,
                'allow_from_to' => 0,
                'type' => 'text',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 0,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
            ],
            [
                'name' => [
                    'ar' => 'مدة الضمان',
                    'en' => 'Warranty Term',
                ],
                'status' => 1,
                'show_in_search' => 0,
                'allow_from_to' => 0,
                'type' => 'text',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 1,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
            ],
            [
                'name' => [
                    'ar' => 'الدفعة الاولي',
                    'en' => 'Down Payment',
                ],
                'status' => 1,
                'show_in_search' => 0,
                'allow_from_to' => 0,
                'type' => 'text',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 1,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
            ],
            [
                'name' => [
                    'ar' => 'الموديل',
                    'en' => 'Model',
                ],
                'status' => 1,
                'show_in_search' => 1,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 1,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'Sedan',
                            'en' => 'Sedan',
                        ],
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'MPV',
                            'en' => 'MPV',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'Crossover',
                            'en' => 'Crossover',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'Coupe',
                            'en' => 'Coupe',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'Convertible',
                            'en' => 'Convertible',
                        ]
                    ]
                ],
            ],
            [
                'name' => [
                    'ar' => 'ماركة السيارة',
                    'en' => 'Car Brand',
                ],
                'status' => 1,
                'show_in_search' => 1,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 1,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'Sedan',
                            'en' => 'Sedan',
                        ],
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'MPV',
                            'en' => 'MPV',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'Crossover',
                            'en' => 'Crossover',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'Coupe',
                            'en' => 'Coupe',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'Convertible',
                            'en' => 'Convertible',
                        ]
                    ]
                ],
            ],
            [
                'name' => [
                    'ar' => 'سنة الموديل',
                    'en' => 'Year',
                ],
                'status' => 1,
                'show_in_search' => 1,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 1,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => '2015',
                            'en' => '2015',
                        ],
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => '2016',
                            'en' => '2016',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => '2017',
                            'en' => '2017',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => '2018',
                            'en' => '2018',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => '2019',
                            'en' => '2019',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => '2020',
                            'en' => '2020',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => '2021',
                            'en' => '2021',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => '2022',
                            'en' => '2022',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => '2023',
                            'en' => '2023',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => '2024',
                            'en' => '2024',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => '2025',
                            'en' => '2025',
                        ]
                    ]
                ],
            ],
            [
                'name' => [
                    'ar' => 'حالة السيارة',
                    'en' => 'Car Status',
                ],
                'status' => 1,
                'show_in_search' => 1,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 0,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'وكالة',
                            'en' => 'Agency',
                        ],
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'سكراب',
                            'en' => 'Scrap',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'مستعمل',
                            'en' => 'Used',
                        ]
                    ],
                ],
            ],
            [
                'name' => [
                    'ar' => 'فئة قطع الغيار',
                    'en' => 'Class Spare Parts',
                ],
                'status' => 1,
                'show_in_search' => 1,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 0,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'سيارات',
                            'en' => 'Cars',
                        ],
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'بحريات',
                            'en' => 'Yachts',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'كارافانات',
                            'en' => 'Caravans',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'دراجات هوائية',
                            'en' => 'Bicycle',
                        ]
                    ],
                ],
            ],
            [
                'name' => [
                    'ar' => 'حالة قطع الغيار',
                    'en' => 'Spare Status',
                ],
                'status' => 1,
                'show_in_search' => 1,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 0,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'ممتازة',
                            'en' => 'Excellent',
                        ],
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'غير جيدة',
                            'en' => 'Not Good',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'متوسطة',
                            'en' => 'Medium',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'خالية العيوب',
                            'en' => 'Flawless',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'جيدة',
                            'en' => 'Good',
                        ]
                    ],
                ],
            ],
            [
                'name' => [
                    'ar' => 'نوع الاستخدام',
                    'en' => 'Type Of Use',
                ],
                'status' => 1,
                'show_in_search' => 1,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 0,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'لم يستخدم قط',
                            'en' => 'Never Used',
                        ],
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'استخدام مرة واحدة',
                            'en' => 'One Time Use',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'استخدام طفيف',
                            'en' => 'Minor Use',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'استخدام عادي',
                            'en' => 'Normal Use',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'استخدام عالي',
                            'en' => 'High Use',
                        ]
                    ],
                ],
            ],
            [
                'name' => [
                    'ar' => 'نوع الالكترونيات',
                    'en' => 'Electronics Type',
                ],
                'status' => 1,
                'show_in_search' => 1,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 0,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'كمبيوتر',
                            'en' => 'PC',
                        ],
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'اكسسوارات',
                            'en' => 'Accessories',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'أجهزة التعدين',
                            'en' => 'Mining Devices',
                        ]
                    ],
                ],
            ],
            [
                'name' => [
                    'ar' => 'حالة العقار',
                    'en' => 'Property Condition',
                ],
                'status' => 1,
                'show_in_search' => 1,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 0,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'للبيع',
                            'en' => 'For Sale',
                        ],
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'للايجار',
                            'en' => 'For Rent',
                        ]
                    ],
                ],
            ],
            [
                'name' => [
                    'ar' => 'نوع العقار',
                    'en' => 'Property Type',
                ],
                'status' => 1,
                'show_in_search' => 1,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 0,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'سكني',
                            'en' => 'Residential',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'تجاري',
                            'en' => 'Commercial',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'أرض',
                            'en' => 'Land',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'وحدات متعددة',
                            'en' => 'Multiple Units',
                        ]
                    ],
                ],
            ],
            [
                'name' => [
                    'ar' => 'نوع الوحدة',
                    'en' => 'Unit Type',
                ],
                'status' => 1,
                'show_in_search' => 1,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 0,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'قطعة ارض',
                            'en' => 'Land',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'مجمع فيلات',
                            'en' => 'Villa Compound',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'تاونهاوس',
                            'en' => 'Townhouse',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'طابق سكني',
                            'en' => 'Residential Floor',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'مبني سكني',
                            'en' => 'Residential Building',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'بنتهاوس',
                            'en' => 'Penthouse',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'فيلا',
                            'en' => 'Villa',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'شقة',
                            'en' => 'Apartment',
                        ]
                    ],
                ],
            ],
            [
                'name' => [
                    'ar' => 'نوع المقطورة',
                    'en' => 'Trailer Type',
                ],
                'status' => 1,
                'show_in_search' => 1,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 0,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'ب دابل',
                            'en' => 'B Dobule',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'كارتن سايدر',
                            'en' => 'Karten Sider',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'تريلات دوج',
                            'en' => 'Dog Trills',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'تريلات دولي',
                            'en' => 'International Trills',
                        ]
                    ],
                ]
            ],
            [
                'name' => [
                    'ar' => 'فئة البحريات',
                    'en' => 'Nautical Type',
                ],
                'status' => 1,
                'show_in_search' => 1,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 0,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'الكل',
                            'en' => 'All',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'قوارب',
                            'en' => 'Boats',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'يخوت',
                            'en' => 'Yachts',
                        ]
                    ],
                ]
            ],
            [
                'name' => [
                    'ar' => 'نوع البائع',
                    'en' => 'Seller Type',
                ],
                'status' => 1,
                'show_in_search' => 1,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 0,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'مالك',
                            'en' => 'Owner',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'وكالة',
                            'en' => 'Agency',
                        ]
                    ],
                ],
            ],
            [
                'name' => [
                    'ar' => 'فئة الكارافانات',
                    'en' => 'Caravans Type',
                ],
                'status' => 1,
                'show_in_search' => 1,
                'allow_from_to' => 0,
                'type' => 'drop_down',
                'icon' => '/uploads/default.png',
                'validation' => [
                    'max' => 0,
                    'min' => 0,
                    'is_int' => 0,
                    'required' => 0,
                    'validate_max' => 0,
                    'validate_min' => 0,
                ],
                'options' => [
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'الكل',
                            'en' => 'All',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'جديد',
                            'en' => 'New',
                        ]
                    ],
                    [
                        'is_default' => 0,
                        'status' => 1,
                        'value' => [
                            'ar' => 'مستعمل',
                            'en' => 'Used',
                        ]
                    ],
                ]
            ],
        ];

        foreach ($data as $attribute) {
            # code...
            $children = $attribute["options"];
            unset($attribute["options"]);
            $model = Attribute::create($attribute);
            $model->options()->createMany($children);
        }
    }

}
