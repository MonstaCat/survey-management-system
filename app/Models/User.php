<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Jenssegers\Mongodb\Eloquent\Model;

class User extends Authenticatable
{
    protected $connection = 'mongodb';
    protected $collection = 'users';
    protected $fillable = ['name', 'email', 'password', 'google_id'];
}
