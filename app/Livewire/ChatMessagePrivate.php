<?php

namespace App\Livewire;

use App\Models\chat_groups;
use App\Models\ChatMember;
use App\Models\ChatPrivateMessage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChatMessagePrivate extends Component
{
    use WithFileUploads;

    public $groups;
    public $group_id;
    public $check_member, $check_memeber_active;
    public $active_chat_messages;
    public $member;
    public $message;
    public $groupInfo;
    public $activeSidebarMobile = false;
    public $attachFile;
    public $group_setting, $group_Links_active;

    public function group_target($group_id){
        $this->active_chat_messages = false;
        $this->activeSidebarMobile = false;
        $this->group_id = $group_id;
        $this->groupInfo = chat_groups::where('id', $group_id)->first();
        $check_member = ChatMember::where('member_id', auth('member')->user()->id)->where('group_id', $this->group_id)->exists();
        // check member found or no when select group
        if($check_member == 0){
            $this->check_member = 0;
        }
        else {
            $this->check_member = 1;
            $this->member = ChatMember::where('member_id', auth('member')->user()->id)->where('group_id', $this->group_id)->first();
        }
    }
 
    public function send_join_group($group_id){
        $check_member = ChatMember::where('member_id', auth('member')->user()->id)->where('group_id', $group_id)->exists();

        // send request join only first 
        if($check_member == 0){
            ChatMember::create([
                'member_id' => auth('member')->user()->id,
                'group_id' => $group_id
            ]);
        }
        $this->check_member = 1;
        $member = ChatMember::where('member_id', auth('member')->user()->id)->where('group_id', $this->group_id)->first();
        $this->member = $member;
    }

    public function chat_active($group_id){
        $check_memeber_active = ChatMember::where('member_id', auth('member')->user()->id)->where('group_id', $group_id)->where('is_active', 1)->exists();
        if($check_memeber_active == 1){
            $this->active_chat_messages = true;
            $this->groupInfo = chat_groups::where('id', $group_id)->first();
        }
        else {
            $this->active_chat_messages = false;
        }
    }

    public function sendMessage(){
        $chatMsg = new ChatPrivateMessage();
        if($this->attachFile != null){
            // check extension
            if($this->attachFile->extension() == 'pdf'){
                // upload file pdf
                $generateFile = time() . '.' . $this->attachFile->getClientOriginalName();
                $this->attachFile->storeAs('uploads/files/pdf', $generateFile, 'public_uploads');
                $filePath = 'files/pdf/' . $generateFile;
                $chatMsg->message = $filePath;
            }
            else {
                // upload file image
                $generateFile = time() . '.' . $this->attachFile->getClientOriginalName();
                $this->attachFile->storeAs('uploads/files/images', $generateFile, 'public_uploads');
                $filePath = 'files/images/' . $generateFile;
                $chatMsg->message = $filePath;
            }
            $chatMsg->sender_id = auth('member')->user()->id;
            $chatMsg->group_id = $this->group_id;
            $chatMsg->save();
        }
        else {
            if($this->message != ''){
                $chatMsg->sender_id = auth('member')->user()->id;
                $chatMsg->group_id = $this->group_id;
                $chatMsg->message = $this->message;
                $chatMsg->save();
            }
        }
        $this->message = '';
        $this->attachFile = '';
        $this->dispatch('scrollAuto');
    }

    public function group_links_info_active(){
        $this->group_Links_active = true;
    }

    public function group_links_info_disabled(){
        $this->group_Links_active = false;
    }

    public function sidebarContentMobileActive(){
        $this->activeSidebarMobile = true;
    }
    public function sidebarContentMobileclose(){
        $this->activeSidebarMobile = false;
    }


    public function render()
    {
        $this->dispatch('jquery');
        $messagesGroups = ChatPrivateMessage::where('group_id', $this->group_id)->get();
        $last_messages = ChatPrivateMessage::where('group_id', $this->group_id)->orderBy('id', 'desc')->take(5)->get();
        return view('livewire.chat-message-private', compact('messagesGroups', 'last_messages'));
    }
}
