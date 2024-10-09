<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video_User extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'videos_id', 'watched','progress'];
}
