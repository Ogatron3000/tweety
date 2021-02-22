<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{

    use HasFactory;

    protected $fillable
        = [
            'body',
            'user_id',
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likeCount()
    {
        return $this->likes()->count();
    }

    public function getLikeID()
    {
        return $this->likes()->where('user_id', auth()->id())->first()->id;
    }

    public function isLikedBy(User $user)
    {
        return (bool)$user->likes()->where('tweet_id', $this->id)->count();
    }

}
