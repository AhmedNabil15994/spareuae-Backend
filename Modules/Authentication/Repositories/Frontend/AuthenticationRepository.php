<?php

namespace Modules\Authentication\Repositories\Frontend;

use Modules\User\Entities\PasswordReset;
use Modules\User\Entities\User;
use Carbon\Carbon;
use Hash;
use DB;

class AuthenticationRepository
{
    public function __construct(User $user, PasswordReset $password)
    {
        $this->password  = $password;
        $this->user      = $user;
    }

    public function register($request)
    {
        DB::beginTransaction();
        $have_sms = config("app.have_sms");
        $image = $request['image'] ? pathFileInStroage($request, "image", "users") : "/uploads/users/user.png";


        try {
            $user = $this->user->create([
                'name'      => $request['name'],
                'email'     => $request['email'],
                'mobile'    => $request['mobile'],
                'phone_code' => $request['phone_code'],
                "is_verified"   => $have_sms ? false : true,
                "image"       => $image,
                "type"       => $request['account_type'] == 2 ? 'show':'user',
                'password'  => Hash::make($request['password']),
            ]);

            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function findUserByEmail($request)
    {
        $user = $this->user->where('email', $request->email)->first();
        return $user;
    }

    public function findUser($mobile, $phone_code)
    {
        $user = $this->user
                    ->where('mobile', $mobile)
                    ->where("phone_code", $phone_code)
                    ->firstOrFail();
        return $user;
    }

    public function createToken($request)
    {
        $user = $this->findUserByEmail($request);

        $this->deleteTokens($user);

        $newToken = strtolower(str_random(64));



        $token =  $this->password->insert([
          'email'       => $user->email,
          'token'       => $newToken,
          'created_at'  => Carbon::now(),
        ]);

        $data = [
          'token' => $newToken,
          'user'  => $user
        ];

        return $data;
    }

    public function resetPassword($request)
    {
        $user = $this->findUserByEmail($request);

        $user->update([
          'password' => Hash::make($request->password)
        ]);

        $this->deleteTokens($user);

        return true;
    }

    public function deleteTokens($user)
    {
        $this->password->where('email', $user->email)->delete();
    }

    public function sendResetEmail($userObj){
        $token = \Str::uuid();
        PasswordReset::where('email',$userObj->email)->firstOrCreate([
            'email' => $userObj->email,
            'token' => $token,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $emailData = [
            'name' => $userObj->name,
            'subject' => 'Resetting User Password',
            'template' => "tenant.emailUsers.resetPassword",
            'to'    => $userObj->email,
            'content' => route('frontend.password.reset',['token' => $token]),
            'sender_name' => 'Spare',
            'sender_email' => 'web@stg.spareuae.co',
        ];

        return sendMail($emailData);
    }
}
