<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, count(id) likes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    // we use scope (above) instead
    //    public function likeCount()
    //    {
    //        return $this->likes()->count();
    //    }

    public function likes()
    {
        return $this->hasMany(Like::class);
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
