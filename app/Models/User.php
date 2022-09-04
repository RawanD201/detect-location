<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'username',
        'password',
        'phone',
        'status',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'username_verified_at' => 'datetime',
        'role' => \App\Enums\Role::class,

    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if ($model->password === null) {
                $model->setAttribute('password', Hash::make('123'));
            }
        });
    }

    public function logs()
    {

        return $this->hasMany(Log::class, 'user_id', 'id');
    }

    public function isAdmin(): bool
    {
        return  $this->role->value === \App\Enums\Role::Admin->value;
    }
}
