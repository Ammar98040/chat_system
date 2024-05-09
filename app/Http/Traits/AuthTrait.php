<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

trait AuthTrait
{
    public function checkGuard($request)
    {
        if ($request->usertype == 'member') {
            $guardName = 'member';
        } 
        else {
            $guardName = 'web';
        }
        return $guardName;
    }

    public function redirectToPage($request)
    {
        if ($request->usertype == 'admin') {
            return redirect()->intended(RouteServiceProvider::ADMIN);
        } 
        else {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }

    public function Logout($request){
        if($request->usertype == 'web'){
            auth('web')->logout();
            return redirect('admin/login');
        }
        else {
            auth('member')->logout();
            return redirect('/');
        }
    }
}
