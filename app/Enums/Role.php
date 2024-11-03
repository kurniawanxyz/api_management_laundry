<?php

namespace App\Enums;

enum Role: string
{
    case admin = 'admin';
    case owner = 'owner';
    case cashier = 'cashier';
}
