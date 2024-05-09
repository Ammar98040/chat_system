<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class ChatMemberController extends Controller
{
    public function chatarea(){
        $members = Member::where('id', '!=' ,auth('member')->user()->id)->get();
        return view('chatMember', compact('members'));
    }
}
