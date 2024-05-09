<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatMemberMessage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'sender_id',
        'conversion_id',
        'message',
    ];

    public function conversion(){
        return $this->belongsTo(ChatMemberConversion::class, 'conversion_id');
    }
}
