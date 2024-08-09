<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'message',
        'sender_id',
        'receiver_id',
        'group_id',
        'conversation_id',
    ];

    /**
     * Get the user that sent the message.
     */
    public function sender() {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Get the user that received the message.
     */
    public function receiver() {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    /**
     * get the groups.
     */
    public function group() {
        return $this->belongsTo(Group::class);
    }

    public function attachments() {
        return $this->hasMany(MessageAttachment::class);
    }
}
