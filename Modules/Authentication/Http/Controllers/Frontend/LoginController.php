<?php

namespace Modules\Authentication\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Authentication\Foundation\Authentication;
use Modules\Authentication\Http\Requests\Frontend\LoginRequest;
use Modules\Authentication\Http\Requests\Frontend\ResetPasswordMobileRequest;

class LoginController extends Controller
{
    use Authentication;

    /**
     * Display a listing of the resource.
     */
    public function showLogin(Request $request)
    {
        return view('authentication::frontend.auth.login');
    }

    /**
     * Login method
     */
    public function postLogin(LoginRequest $request)
    {
        $errors =  $this->loginWeb($request);

        if ($errors != false) {
            return redirect()->back()->withErrors($errors)->withInput($request->except('password'));
        }


        return $this->redirectTo($request);
    }


    /**
     * Logout method
     */
    public function logout(Request $request)
    {
        auth()->logout();
        return $this->redirectTo($request);
    }



    public function redirectTo($request)
    {
        return redirect()->route("frontend.home");
    }
}
