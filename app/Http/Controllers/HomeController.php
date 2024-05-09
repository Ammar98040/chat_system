<?php

namespace App\Http\Controllers;

use App\Models\chat_groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class HomeController extends Controller
{
    public function index(){
        if(FacadesRequest::is('admin/*')){
            $usertype = 'admin';
        }
        else {
            $usertype = 'member';
        }
        return view('auth.login', compact('usertype'));
    }

    public function adminHome(){
        return view('admin.dashboard');
    }
    public function memberHome(){
        return view('dashboard');
    }

    public function blocked(){
        return view('blocked');
    }
}
