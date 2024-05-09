<?php

namespace App\Http\Controllers;

use App\Models\chat_groups;
use App\Models\ChatMember;
use App\Models\ChatGuest;
use App\Models\room_members;
use Illuminate\Http\Request;

class ChatGroupsController extends Controller
{
    public function Room_all(){
        $rooms = chat_groups::with('members')->get();
        return view('admin.rooms.index', compact('rooms'));
    }
    public function Room_add(Request $request){
        $image = '';
        if($request->hasFile('image')){
            $generateFile = time() . '.' . $request->image->extension();
            $folder = public_path('images/groups');
            $request->image->move($folder, $generateFile);
            $image = 'images/groups/' . $generateFile;
        }
        chat_groups::create([
            'name' => $request->name,
            'country' => $request->country,
            'image'   => $image,
            'group_links'   => $request->group_links
        ]);
        return back()->with('success', 'تم إضافة المجموعة بنجاح');
    }
    public function Room_Active($id, $action){
        $group = chat_groups::where('id', $id);
        if($action == 'enabled'){
            $group->update([
                'is_active' => 0
            ]);
            return back()->with('success', 'تم حظر المجموعة');
        }
        else {
            $group->update([
                'is_active' => 1
            ]);
            return back()->with('success', 'تم إلغاء حظر المجموعة');
        }
    }
    public function Room_update(Request $request){
        $group = chat_groups::findOrfail($request->id);
        // update image group 
        if($request->hasFile('image')){
            $group_image_current = $group->image;
            $filePath = public_path('/' . $group_image_current);
            if(file_exists($filePath)){
                unlink($filePath);
            }
            $generateFile = time() . '.' . $request->image->extension();
            $folder = public_path('images/groups');
            $request->image->move($folder, $generateFile);
            $image = 'images/groups/' . $generateFile;
            $group->image = $image;
        }
        $group->name = $request->name;
        $group->country = $request->country;
        $group->group_links = $request->group_links;
        $group->save();
        return back()->with('success', 'تم تعديل بيانات المجموعة بنجاح');
    }
    public function Room_Requests_all(){
        $members_requests = ChatMember::where('is_active', 0)->get();
        return view('admin.rooms.show', compact('members_requests'));
    }

    public function Room_Request_approved($id){
        $memeber = ChatMember::where('id', $id)->first();
        $memeber->is_active = 1;
        $memeber->save();
        return back()->with('success', 'تم قبول العضو وإضافته في الجروب بنجاح');
    }

    public function Room_Request_rejected($id){
        $memeber = ChatMember::where('id', $id);
        $memeber->delete();
        return back()->with('success', 'تم رفض طلب انضمام العضو');
    }

    public function chatPrivate(){
        $groups = chat_groups::where('is_active', 1)->get();
        return view('chat', compact('groups'));
    }

    public function chatPublic(){
        return view('chatpublic');
    }

    public function chatGuest(){
        return view('chatGuest');
    }

    public function guests_all(){
        $users = ChatGuest::all();
        return view('admin.guest.index', compact('users'));
    }

    public function toggleActiveGuest($id, $action){
        $guest = ChatGuest::findOrfail($id);
        if($action == 'disabled'){
            $guest->update([
                'is_active' => 0
            ]);
            return back();
        }
        else {
            $guest->update([
                'is_active' => 1
            ]);
            return back();
        }
    }
}
