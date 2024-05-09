<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat_groups extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country',
        'image',
        'group_links',
        'is_active'
    ];
    public function members(){
        return $this->hasMany(ChatMember::class, 'group_id');
    }
}
