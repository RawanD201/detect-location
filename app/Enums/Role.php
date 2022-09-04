<?php

namespace App\Enums;


enum Role: string
{
    case User = 'user';
    case Admin = 'admin';

    public static function set(string $value): Self
    {
        return  match (strtolower($value)) {
            'admin' => Self::Admin,
            'user' => Self::User,
        };
    }
}
