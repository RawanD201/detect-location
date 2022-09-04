<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Log extends Model
{
    use HasFactory;
    protected $table = 'user_logs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ip',
        'country',
        'city',
        'county',
        'name',
        'image',
        'latitude',
        'longitude',
        'login_at',
        'logout_at',
    ];

    protected $casts = [
        'login_at' => 'datetime:Y-m-d H:i:s',
        'logout_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected function loginAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::parse($value),
        );
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
