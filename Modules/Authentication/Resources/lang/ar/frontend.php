<?php

return [
    'login'     => [
        'title'         => 'تسجيل الدخول',
        "description"   => 'مرحبًا بعودتك! من فضلك أدخل إسم المستخدم و كلمة المرور الخاصة بك للتسجيل.',
        'user_account' => 'حساب مستخدم',
        'show_account' => 'حساب معرض',
        'name' => 'اسم الحساب',
        'email' => 'البريد الالكتروني',
        'password' => 'كلمة المرور',
        'remember_me' => 'تذكرني',
        'forget' => 'نسيت كلمة المرور ؟',
        'login_btn' => 'تسجيل الدخول',
        "dont_have" => "ليس لديك حساب؟",
        'sign_up' => 'تسجيل مستخدم جديد',
        'email_placeholder' => "ادخل بريدك الالكتروني",
        'password_placeholder' => "ادخل كلمة المرور الخاصة بك",
        'validation'    => [
            'email'     => [
                'email'     => 'من فضلك ادخل البريد بشكل صحيح',
                'required'  => 'من فضلك ادخل البريد الالكتروني',
            ],
            'failed'    => 'هذه البيانات غير متطابقة لدينا من فضلك تآكد من بيانات تسجيل الدخول',
            'password'  => [
                'min'       => 'كلمة المرور يجب ان تكون اكثر من ٦ مدخلات',
                'required'  => 'يجب ان تدخل كلمة المرور',
            ],
        ],
    ],
    'password'  => [
        'alert'         => [
            'reset_sent'    => 'تم ارسال بريد بتعين كلمة مرور جديدة',
        ],
        'form'          => [
            'btn'   => [
                'password'  => 'ارسال تعين كلمة المرور',
            ],
            'email' => 'البريد الالكتروني',
        ],
        'title'         => 'فقدان كلمة المرور',
        'validation'    => [
            'email' => [
                'email'     => 'من فضلك ادخل البريد بشكل صحيح',
                'exists'    => 'هذا البريد غير موجود لدينا',
                'required'  => 'من فضلك ادخل البريد الالكتروني',
            ],
        ],
    ],
    'register'  => [
        'title'         => 'تسجيل مستخدم جديد',
        'description' => 'قم بإنشاء حساب جديد اليوم لجني الفوائد',
        'description_2' => 'يجب أن تتكون كلمة المرور من ثمانية أحرف على الأظقل. لجعلها أقوى ، استخدم الأحرف الكبيرة والصغيرة والأرقام والرموز مثل ! "؟ $٪ ^ &)',
        'btn'   => 'تسجيل الان',
        'name' => 'الاسم',
        'name_placeholder' => 'أدخل أسمك',
        'confirm_password' => 'تأكيد كلمة المرور',
        'confirm_password_placeholder' => 'تأكيد كلمة المرور',
        'alert'         => [
            'policy_privacy'    => 'من خلال التسجيل قد وافقت على',
        ],
        'form'          => [
            'email'                 => 'البريد الالكتروني',
            'mobile'                => 'رقم الهاتف',
            'name'                  => 'اسم المستخدم',
            'password'              => 'كلمة المرور',
            'password_confirmation' => 'تآكيد كلمة المرور',
            "msg" => "أنشئ حسابك فى دقائق ." ,
            "agree"=>"اوافق على كل",
            "footer_note"=>"لدي حساب بالفعل  ؟ اضغط على " ,
            "footer_note2"=> "فى الاعلى"
        ],
        'validation'    => [
            'email'     => [
                'email'     => 'من فضلك ادخل البريد بشكل صحيح',
                'required'  => 'من فضلك ادخل البريد الالكتروني',
                'unique'    => 'هذا البريد الالكتروني تم حجزة من قبل شخص اخر',
            ],
            'mobile'    => [
                'digits_between'    => 'يجب ان يتكون رقم الهاتف من ٨ ارقام',
                'numeric'           => 'من فضلك ادخل رقم الهاتف من ارقام انجليزية فقط',
                'required'          => 'من فضلك ادخل رقم الهاتف',
                'unique'            => 'رقم الهاتف تم حجزه من قبل شخص اخر',
            ],
            'name'      => [
                'required'  => 'من فضلك ادخل الاسم الشخصي',
            ],
            'password'  => [
                'confirmed' => 'كلمة المرور غير متطابقة مع التآكيد',
                'min'       => 'كلمة المرور يجب ان تتكون من اكثر من ٦ مدخلات',
                'required'  => 'يجب ان تدخل كلمة المرور',
            ],
        ],
    ],
    'reset'     => [
        'title'         => 'تعيين كلمة مرور جديدة',
        'description' => 'إعادة تعيين كلمة المرور',
        'btn' => 'ارسال',
        'form'          => [
            'btn'                   => [
                'reset' => 'تعيين كلمة المرور الآن',
            ],


            'password_confirmation' => 'تآكيد كلمة المرور',
        ],
        'mail'          => [
            'button_content'    => 'تعين كلمة مرور جديدة',
            'header'            => 'انت تستقبل هذا البريد الالكتروني لآنك قمت بطلب تعين كلمة مرور جديدة لفقدانك القديمة',
            'subject'           => 'تعين كلمة مرور جديدة',
        ],
        'validation'    => [
            'email'     => [
                'email'     => 'من فضلك ادخل البريد بشكل صحيح',
                'exists'    => 'هذا البريد غير موجود لدينا',
                'required'  => 'من فضلك ادخل البريد الالكتروني',
            ],
            'password'  => [
                'min'       => 'كلمة المرور يجب ان تتكون من اكثر من ٦ مدخلات',
                'required'  => 'يجب ان تدخل كلمة المرور',
            ],
            'token'     => [
                'exists'    => 'انتهت صلاحية هذا الدفع',
                'required'  => 'لا تملك صلاحية تعين كلمة مرور جديدة قم بعمل طلب جديد',
            ],
        ],
    ],
   "forget"=>[
       "mobile"=> "الجوال" ,
       "code"=> "الكود" ,
       "password"=>"كلمة المرور" ,
       'password_confirmation' => 'تآكيد كلمة المرور',
       "resend" => "ارسال الكود",
       "reset" => "اعادة تعين" ,
       "mobile_required"=> "يجب ادخال الموبيل اولا"
   ],
    
    'must_be_login' => 'يجب تسجيل الدخول اولا قبل الاشتراك في الباقة المحددة',
];
