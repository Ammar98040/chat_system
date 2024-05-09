<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatMemberConversion extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'is_active',
    ];

    public function sender(){
        return $this->belongsTo(Member::class, 'sender_id');
    }
}
