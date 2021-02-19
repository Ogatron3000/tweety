<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::needsRehash($value) ? bcrypt($value) : $value;
    }

    public function timeline()
    {
        $friends = $this->follows()->pluck('id');

        return Tweet::where('user_id', $this->id)
            ->orWhereIn('user_id', $friends)
            ->latest()
            ->get();
    }

    public function profile_timeline()
    {
        return Tweet::where('user_id', $this->id)
            ->latest()
            ->get();
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function following(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

    public function toggleFollow(User $user)
    {
        return $this->follows()->toggle($user);
    }

    public function notFollowing()
    {
        return User::where('id', '!=', $this->id)->whereNotIn('id', $this->follows()->pluck('id'))->get();
    }

    public function path()
    {
        return route('profiles.show', $this->username);
    }
}
