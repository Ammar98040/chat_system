<?php

namespace App\Livewire;

use App\Models\ChatGuest;
use App\Models\ChatGuestMessages;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChatMessageGuest extends Component
{
    use WithFileUploads;
    public $activeChat = false;
    public $message;
    public $msgBlock;
    public $attachFile;

    public function chatActive(){
        $ip = Request::ip();
        // check guest found or no
        $checkGuest = ChatGuest::where('sender_IP', $ip)->exists();
        if($checkGuest == 0){
            // create New guest 
            $ChatGuest = new ChatGuest();
            $ChatGuest->sender_IP = $ip;
            $ChatGuest->save();
        }
        else {
            // check is_active
            $checkGuestActive = ChatGuest::where('sender_IP', $ip)->where('is_active', 1)->exists();
            if($checkGuestActive == 1){
                $this->msgBlock = '';
            }
            else {
                $this->msgBlock = 'تم حظرك من الشات برجاء الإتصال بالدعم للمساعدة ...';
            }
        }
        $this->activeChat = true;
    }

    public function sendMessage(){
        $ip = Request::ip();
        $checkGuest = ChatGuest::where('sender_IP', $ip)->exists();
        if($checkGuest == 0){
            $ChatGuest = new ChatGuest();
            $ChatGuest->sender_IP = $ip;
            $ChatGuest->save();
        }
        // send message
        $ChatGuestMessages = new ChatGuestMessages();
        if($this->message !== ''){
            if($this->attachFile != null){
                // check extension
                if($this->attachFile->extension() == 'pdf'){
                    // upload file pdf
                    $generateFile = time() . '.' . $this->attachFile->getClientOriginalName();
                    $this->attachFile->storeAs('uploads/files/pdf', $generateFile, 'public_uploads');
                    $filePath = 'files/pdf/' . $generateFile;
                    $ChatGuestMessages->messages = $filePath;
                    $this->attachFile = null;
                }
                else {
                    // upload file image
                    $generateFile = time() . '.' . $this->attachFile->getClientOriginalName();
                    $this->attachFile->storeAs('uploads/files/images', $generateFile, 'public_uploads');
                    $filePath = 'files/images/' . $generateFile;
                    $ChatGuestMessages->messages = $filePath;
                    $this->attachFile = null;
                }
            }
            else {
                $ChatGuestMessages->messages = $this->message;
            }
            $ChatGuestMessages->sender_IP = $ip;
            $ChatGuestMessages->save();
            $this->message = '';
        }
        $this->dispatch('scrollAuto');
    }

    public function render()
    {
        $this->dispatch('jquery');
        $messagesGroups = ChatGuestMessages::where('is_active', 1)->get();
        return view('livewire.chat-message-guest', compact('messagesGroups'));
    }
}
