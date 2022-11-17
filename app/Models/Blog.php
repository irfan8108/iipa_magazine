<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function articles() {
        return $this->hasMany(Article::class, 'blog_id', 'id');
    }

    public function writer() {
        return $this->hasOne(User::class, 'id', 'role_id');
    }

}
