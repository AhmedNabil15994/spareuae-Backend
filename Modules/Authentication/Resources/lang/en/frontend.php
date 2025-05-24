<?php

return [
    'login'     => [
        'title'         => 'Login',
        "description"   => 'Welcome Back! Please enter your username and password to register.',
        'user_account' => 'User Account',
        'show_account' => 'Exhibition account',
        'name' => 'Account Name',
        'email' => 'E-Mail',
        'password' => 'Password',
        'remember_me' => 'Remember Me',
        'forget' => 'Forgot your password?',
        'login_btn' => 'Login',
        "dont_have" => "Don't have an account?",
        'sign_up' => 'Sign Up',
        'email_placeholder' => "Enter your email",
        'password_placeholder' => "Enter your password",
        'validation'    => [
            'email'     => [
                'email'     => 'Please enter correct email format',
                'required'  => 'The email or mobile field is required',

            ],
            'failed'    => 'These credentials do not match our records.',
            'password'  => [
                'min'       => 'Password must be more than 6 characters',
                'required'  => 'The password field is required',
            ],
        ],
    ],
    'password'  => [
        'alert'         => [
            'reset_sent'    => 'Reset password sent successfully',
        ],
        'form'          => [
            'btn'   => [
                'password'  => 'Send Reset Password',
            ],
            'email' => 'Email address',
        ],
        'title'         => 'Forget Password',
        'validation'    => [
            'email' => [
                'email'     => 'Please enter correct email format',
                'exists'    => 'This email not exists',
                'required'  => 'The email field is required',
            ],
        ],
    ],
    'register'  => [
        'title'         => 'New Account',
        'description'   => 'Create a new account today to reap the benefits',
        'description_2' => 'Password must be at least eight characters long. To make it stronger, use uppercase and lowercase letters, numbers, and symbols like ! $%^&)',
        'btn'   => 'Register Now',
        'name' => 'Account Name',
        'name_placeholder' => 'Enter Account Name',
        'confirm_password' => 'Confirm your Password',
        'confirm_password_placeholder' => 'Confirm your Password',
        'alert'         => [
            'policy_privacy'    => 'if you register it mean you are confirm',
        ],
        'form'          => [
            'email'                 => 'Email Address',
            'mobile'                => 'Mobile',
            'name'                  => 'Username',
            'password'              => 'Password',
            'password_confirmation' => 'Password Confirmation',
            "msg" => "Setup a new account in a minute." ,
            "agree"=>"I agree to the all",
            "footer_note"=>"Already have an account? click on the " ,
            "footer_note2"=> " button above."
        ],
        'validation'    => [
            'email'     => [
                'email'     => 'Please enter correct email format',
                'required'  => 'The email field is required',
                'unique'    => 'The email has already been taken',
            ],
            'mobile'    => [
                'digits_between'    => 'You must enter mobile number with 8 digits',
                'numeric'           => 'The mobile must be a number',
                'required'          => 'The mobile field is required',
                'unique'            => 'The mobile has already been taken',
            ],
            'name'      => [
                'required'  => 'The name field is required',
            ],
            'password'  => [
                'confirmed' => 'Password not match with the confirmation',
                'min'       => 'Password must be more than 6 characters',
                'required'  => 'The password field is required',
            ],
        ],
    ],
    'reset'     => [
        'title'         => 'Reset Password',
        'description'         => 'Password Reset',
        'btn' => 'Send',
        'form'          => [
            'btn'                   => [
                'reset' => 'Reset Password Now',
            ],
            'email'                 => 'Email Address',
            'password'              => 'Password',
            'password_confirmation' => 'Password Confirmation',
        ],
        'mail'          => [
            'button_content'    => 'Reset Your Password',
            'header'            => 'You are receiving this email because we received a password reset request for your account.',
            'subject'           => 'Reset Password',
        ],
        'validation'    => [
            'email'     => [
                'email'     => 'Please enter correct email format',
                'exists'    => 'This email not exists',
                'required'  => 'The email field is required',
            ],
            'password'  => [
                'min'       => 'Password must be more than 6 characters',
                'required'  => 'The password field is required',
            ],
            'token'     => [
                'exists'    => 'This token expired',
                'required'  => 'The token field is required',
            ],
        ],
    ],

    'must_be_login' => 'You must log in first before subscribing to the specified package',
];
