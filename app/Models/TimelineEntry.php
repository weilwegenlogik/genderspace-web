<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class TimelineEntry extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'icon',
        'description',
        'link',
        'type',
        'user_id',
        'visibility',
        'shared_with'
    ];

    /**
     * Get the user that owns the timeline entry.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user with whom the entry is shared.
     */
    public function sharedWith()
    {
        return $this->belongsTo(User::class, 'shared_with');
    }
}
