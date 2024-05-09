<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatMember extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function group(){
        return $this->belongsTo(chat_groups::class, 'group_id');
    }
    public function member(){
        return $this->belongsTo(Member::class, 'member_id');
    }


}
