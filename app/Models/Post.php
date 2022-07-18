<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';
    protected $primaryKey = 'postId';

    const CREATED_AT = 'postTijd';
    const UPDATED_AT = 'postUpdateTijd';

    protected $attributes = [
        'postStatus' => 1
    ];
}
