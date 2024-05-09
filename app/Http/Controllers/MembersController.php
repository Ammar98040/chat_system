<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index(){
        $users = Member::all();
        return view('admin.members.index', compact('users'));
    }
    public function toggleActive($id, $action){
        $member = Member::findOrfail($id);
        if($action == 'disabled'){
            $member->update([
                'is_active' => 0
            ]);
            return back();
        }
        else {
            $member->update([
                'is_active' => 1
            ]);
            return back();
        }
    }
}
