<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GlobalMessage extends Model
{
    protected $fillable = ['title', 'body', 'icon', 'type', 'groups'];

    protected $casts = [
        'unsubscribed' => 'array',
    ];

    public function getIconPathAttribute()
    {
        return Storage::url($this->icon);
    }

    public function unsubscribedUsers()
{
    return $this->belongsToMany(User::class, 'global_message_user', 'global_message_id', 'user_id');
}


}

