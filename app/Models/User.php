<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Contracts\Auth\MustVerifyEmail;
=======
// use Illuminate\Contracts\Auth\MustVerifyEmail;
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
<<<<<<< HEAD
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
=======

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'birth',
        'prefecture_id',
        'city_id',
        'qualification_id',
<<<<<<< HEAD
        'is_email_verified',
        'role_id',
        'status',
=======
        'is_email_verified'
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
