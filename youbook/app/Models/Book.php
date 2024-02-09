<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class)->using(Reservation::class)->withTimestamps();
    }
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'book_cover'
    ];
}
