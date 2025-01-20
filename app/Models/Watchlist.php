<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'tmdb_id',
        'type',
        'title'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
