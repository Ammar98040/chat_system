<?php

namespace App\Livewire;

use App\Models\ChatMemberConversion;
use App\Models\ChatMemberMessage;
use App\Models\Member;
use Livewire\Component;

class ChatMessageMember extends Component
{
    public $members;
    public $active_chat = false;
    public $userInfo;
    public $activeSidebarMobile;
    public $Conversion_id;
    public $message;
    public $AllMessages;
    public $showModel;
    public function userTarget($user_id){
        // check user block or No 
        // $check_conversion= ChatMemberConversion::where(['sender_id' => auth('member')->user()->id, 'receiver_id' => $user_id])->orWhere(['sender_id' => $user_id, 'receiver_id' => auth('member')->user()->id])->exists();
        $check_conversion = ChatMemberConversion::where('sender_id', $user_id)->orWhere('receiver_id', $user_id)->exists();
        if($check_conversion == 0){
            // create New conversion (one to one)
            $Conversion = new ChatMemberConversion();
            $Conversion->sender_id = auth('member')->user()->id;
            $Conversion->receiver_id = $user_id;
            $Conversion->save();
            $this->Conversion_id = ChatMemberConversion::where('receiver_id', $user_id)->orWhere('sender_id', $user_id)->pluck('id')->first();
        }
        else {
            $this->Conversion_id = ChatMemberConversion::where('receiver_id', $user_id)->orWhere('sender_id', $user_id)->pluck('id')->first();
        }
        // get user target 
        $this->userInfo = Member::where('id', $user_id)->first();
        $this->active_chat = true;
    }

    public function sendMessage(){
        if($this->message != ''){
            $chatmsg = new ChatMemberMessage();
            $chatmsg->conversion_id = $this->Conversion_id;
            $chatmsg->sender_id = auth('member')->user()->id;
            $chatmsg->message = $this->message;
            $chatmsg->save();
            $this->message = '';
        }
    }

    public function blockMember(){
        ChatMemberConversion::where('id', $this->Conversion_id)->update([
            'is_active' => 0
        ]);
        $this->dispatch('jquery');
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
        $this->AllMessages = ChatMemberMessage::where('conversion_id', $this->Conversion_id)->with('conversion')->get();
        $conversion = ChatMemberConversion::where('id', $this->Conversion_id)->first();
        return view('livewire.chat-message-member', [
            'AllMessages' => $this->AllMessages,
            'conversion'  => $conversion
        ]);
    }
}
