<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function hasLiked($item_id, $type)
    {
        return $this->likes()->where('tmdb_id', $item_id)->where('type', $type)->exists();
    }

    public function watched(){
        return $this->hasMany(Watchlist::class);
    }

    public function hasWatched($item_id, $type){
        return $this->watched()->where('tmdb_id', $item_id)->where('type', $type)->exists();
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
