<?php

namespace Modules\QSale\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\QSale\Entities\Package;
use Illuminate\Database\Eloquent\Model;

class PackageSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
        $this->handleBasicPackage();
    }

    public function handleBasicPackage(){
        $data  = [
            [
                "title"=>[
                    "ar"  => "الباقة الاولي" ,
                    "en"  => "First Package" ,
                ],
                "description"=>[
                    "ar"  => "<p><span style=\"background-color:rgb(255,255,255);color:rgb(32,33,36);\">عرض الإعلان عبر مواقع السوشيال ميديا</span></p><ul><li style=\"text-align:right;\">مدة الإعلان : 30 يوماُ</li><li style=\"text-align:right;\">أول 3 أيام مجاناُ</li><li style=\"text-align:right;\">عرض مميز للإعلان</li><li style=\"text-align:right;\">سرعة التواصل</li><li style=\"text-align:right;\">الدعم الفني مدة الإعلان</li></ul><p><br>&nbsp;</p><p>&nbsp;</p><p><br>&nbsp;</p><p><br><br>&nbsp;</p>",
                    "en"  => "<p><span style=\"background-color:rgb(255,255,255);color:rgb(32,33,36);\">Display The Ad on Social Media Sites</span></p><ul><li>Ad Duration: 30 days</li><li>First 3 days for free</li><li>Special offer for advertising</li><li>Communication speed</li><li>Technical support throughout the ad<br>&nbsp;</li></ul><p><br>&nbsp;</p>",
                ],
                "price"     => 20,
                "duration"  => 30 ,
                "is_free"    => false,
                "status"    => true,
            ],
            [
                "title"=>[
                    "ar"  => "الباقة الثانية" ,
                    "en"  => "Second Package" ,
                ],
                "description"=>[
                    "ar"  =>"<p><span style=\"background-color:rgb(255,255,255);color:rgb(32,33,36);\">عرض الإعلان عبر الموقع الإلكتروني</span></p><ul><li style=\"text-align:right;\">مدة الإعلان : 30 يوماُ</li><li style=\"text-align:right;\">أول 4 أيام مجاناُ</li><li style=\"text-align:right;\">عرض مميز للإعلان</li><li style=\"text-align:right;\">سرعة التواصل</li><li style=\"text-align:right;\">الدعم الفني مدة الإعلان</li></ul><p><br>&nbsp;</p><p>&nbsp;</p><p><br>&nbsp;</p><p><br><br>&nbsp;</p>",
                    "en"  => "<p><span style=\"background-color:rgb(255,255,255);color:rgb(32,33,36);\">Display The Ad on The Website</span></p><ul><li>Ad Duration: 30 days</li><li>First 4 days for free</li><li>Special offer for advertising</li><li>Communication speed</li><li>Technical support throughout the ad<br>&nbsp;</li></ul><p><br>&nbsp;</p>",
                ],
                "price"     => 40,
                "duration"  => 30 ,
                "is_free"    => false,
                "status"    => true,
            ],
            [
                "title"=>[
                    "ar"  => "الباقة الثالثة" ,
                    "en"  => "Third Package" ,
                ],
                "description"=>[
                    "ar"  => "<p><span style=\"background-color:rgb(255,255,255);color:rgb(32,33,36);\">عرض الإعلان عبر الموقع الإلكتروني و مواقع السوشيال ميديا</span></p><ul><li style=\"text-align:right;\">مدة الإعلان : 30 يوماُ</li><li style=\"text-align:right;\">أول 5 أيام مجاناُ</li><li style=\"text-align:right;\">عرض مميز للإعلان</li><li style=\"text-align:right;\">سرعة التواصل</li><li style=\"text-align:right;\">الدعم الفني مدة الإعلان</li></ul><p><br>&nbsp;</p><p>&nbsp;</p><p><br>&nbsp;</p><p><br><br>&nbsp;</p>",
                    "en"  => "<p><span style=\"background-color:rgb(255,255,255);color:rgb(32,33,36);\">Display The Ad on The Website and Social Media Sites</span></p><ul><li>Ad Duration: 30 days</li><li>First 5 days for free</li><li>Special offer for advertising</li><li>Communication speed</li><li>Technical support throughout the ad<br>&nbsp;</li></ul><p><br>&nbsp;</p>",
                ],
                "price"     => 50,
                "duration"  => 30 ,
                "is_free"    => false,
                "status"    => true,
            ]

        ];

        foreach ($data as $model) {
            Package::create($model);
        }
    }
}
