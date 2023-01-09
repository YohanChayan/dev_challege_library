<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function user() {
        return $this->hasOne(User::class);
    }

    protected $fillable = ['name', 'author', 'category', 'published_date'];
}
