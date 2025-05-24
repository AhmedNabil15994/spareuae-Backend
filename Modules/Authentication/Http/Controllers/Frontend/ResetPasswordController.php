<?php

namespace Modules\Authentication\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Entities\PasswordReset;
use Illuminate\Validation\ValidationException;
use Modules\Authentication\Foundation\Authentication;
use Modules\Authentication\Http\Requests\Frontend\ResetPasswordRequest;
use Modules\Authentication\Http\Requests\Frontend\ForgetPasswordRequest;
use Modules\Authentication\Http\Requests\Frontend\ResetPasswordMobileRequest;
use Modules\Authentication\Repositories\Frontend\AuthenticationRepository as AuthenticationRepo;

class ResetPasswordController extends Controller
{
    use Authentication;

    public function __construct(AuthenticationRepo $auth)
    {
        $this->auth = $auth;
    }

    public function resetPassword($token)
    {
        $resetObj = PasswordReset::where(['token' => $token])->first();
        abort_unless($resetObj, 419);
        $email = $resetObj->email;
        return view('authentication::frontend.auth.passwords.reset', compact('token','email'));
    }


    public function updatePassword(ResetPasswordRequest $request)
    {
        $resetObj = PasswordReset::where(['token' => $request['token'] , 'email' => $request['email']])->first();
        abort_unless($resetObj, 419);

        $reset = $this->auth->resetPassword($request);

        // $errors =  $this->login($request);

        // if ($errors)
        //     return redirect()->back()->withErrors($errors)->withInput($request->except('password'));

        return view('authentication::frontend.auth.login')->with(['status'=>'Password Reset Successfully']);
    }

    public function resetUsingMobile(Request $request)
    {
        return view('authentication::frontend.auth.reset');
    }

    public function postResetUsingMobileSave(ForgetPasswordRequest $request)
    {
        $userObj = $this->auth->findUserByEmail($request);

        if($userObj){
            $this->auth->sendResetEmail($userObj);
            return redirect()->route("frontend.home")->withMessage(__('authentication::api.register.messages.error_sms'));
        }
        return redirect()->route("frontend.home")->withMessage(__('authentication::api.password.messages.sent'));
    }
    public function resetUsingMobileSave(ResetPasswordMobileRequest $request)
    {
        $user = $this->auth->findUser($request->mobile, $request->phone_code);

        if ($user->code_verified != $request->code) {
            throw ValidationException::withMessages(
                ["code" => __('authentication::api.register.messages.code')]
            );
        }

        $user->update(["password"=> bcrypt($request->password)]);

        return redirect()->route("frontend.login")->withMessage(__('authentication::api.forget_password.messages.reset'));
    }
}
