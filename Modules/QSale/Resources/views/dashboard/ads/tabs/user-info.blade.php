{!! field()->text('settings[user_name]',__('qsale::dashboard.ads.form.user_name'),field_attributes:['data-name'=>"settings.user_name"]) !!}
{!! field()->textarea('settings[user_description]',__('qsale::dashboard.ads.form.description'),field_attributes:['data-name'=>"settings.user_description",'class' => "form-control"]) !!}
{!! field()->text('settings[user_address]',__('qsale::dashboard.ads.form.address'),field_attributes:['data-name'=>"settings.user_address"]) !!}

{!! field()->email('settings[user_email]',__('qsale::dashboard.ads.form.user_email'),field_attributes:['data-name'=>"settings.user_email"]) !!}


{!! field()->text('settings[user_phone]',__('qsale::dashboard.ads.form.user_phone'),field_attributes:['data-name'=>"settings.user_phone"]) !!}
{!! field()->text('settings[user_whatsapp]',__('qsale::dashboard.ads.form.user_whatsapp'),field_attributes:['data-name'=>"settings.user_whatsapp"]) !!}
