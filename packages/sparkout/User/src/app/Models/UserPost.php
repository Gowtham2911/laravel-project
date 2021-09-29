<?php

namespace Sparkout\User\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{
    use HasFactory;
    protected $table = 'user_posts';
    protected $fillable = [
        'name','email'
    ];
}
