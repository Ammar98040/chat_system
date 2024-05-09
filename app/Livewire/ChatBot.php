<?php

namespace App\Livewire;

use App\Models\ChatBotInfo;
use App\Models\ChatBotMessages;
use Livewire\Component;

class ChatBot extends Component
{
    public $bot;
    public $message;

    public function ActiveSend($botQuetion){
        $this->message = $botQuetion;
    }

    public function sendMessage(){
        $botMsg = new ChatBotMessages();
        $botMsg->sender_id = auth('member')->user()->id;
        $botMsg->receiver_id = 0;
        $botMsg->messages = $this->message;
        $botMsg->save();

        // replay auto bot event
        $this->dispatch('replayAuto');

        // scrollAuto event
        $this->dispatch('scrollAuto');
    }

    public function botSendMsg(){
       // get answer 
       $botAnswer = ChatBotInfo::where('Question', $this->message)->pluck('answer')->first(); 

       // send Answer to user
       $botAutoMsg = new ChatBotMessages();
       $botAutoMsg->sender_id = 0;
       $botAutoMsg->receiver_id = auth('member')->user()->id;
       $botAutoMsg->messages = $botAnswer;
       $botAutoMsg->save();

       // empty message
       $this->message = '';
    }

    public function render()
    {
        $this->dispatch('jquery');
        return view('livewire.chat-bot', [
            'botInfo' => ChatBotInfo::where('bot_id', $this->bot->id)->get(),
            'botMessage' => ChatBotMessages::where('sender_id' , auth('member')->user()->id)->orWhere('receiver_id' , auth('member')->user()->id)->get(),
        ]);
    }
}
