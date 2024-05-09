<?php

namespace App\Http\Controllers;

use App\Models\ChatBot;
use App\Models\ChatBotInfo;
use Illuminate\Http\Request;

class ChatBotController extends Controller
{
    public function index(){
        $bot = ChatBot::where('user_id', auth('web')->user()->id)->first();
        $botInfo = ChatBotInfo::where('bot_id', $bot->id)->get();
        return view('admin.bot.index', compact('bot', 'botInfo'));
    }
    public function store(Request $request){

        // create New bot
        $bot = new ChatBot();

        if($request->hasFile('image')){
            $generateFile = time() . '.' . $request->image->extension();
            $folder = public_path('uploads/bot');
            $request->image->move($folder, $generateFile);
            $imagePath = 'uploads/bot/' . $generateFile;
            $bot->image = $imagePath;
        }

        $bot->name = $request->name;
        $bot->info = $request->info;
        $bot->user_id = auth('web')->user()->id;
        $bot->save();

        return back()->with('success', 'تم إنشاء البوت بنجاح');
    }

    public function Infostore(Request $request){
        if($request->ajax()){
            $botInfo = new ChatBotInfo();
            $botInfo->Question = $request->Question;
            $botInfo->answer = $request->answer;
            $botInfo->bot_id = $request->bot_id;
            $botInfo->save();
        }
        return response()->json('تم إضافة المعلومة إلي البوت بنجاح');
    }

    public function chatArea(){
        $bot = ChatBot::latest()->first();
        return view('bot.chatArea', compact('bot'));
    }
}
