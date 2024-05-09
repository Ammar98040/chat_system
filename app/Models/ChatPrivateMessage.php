<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatPrivateMessage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sender(){
        return $this->belongsTo(Member::class, 'sender_id');
    }

}
