<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Outlet extends BaseModel
{
    /** @use HasFactory<\Database\Factories\OutletFactory> */
    use HasFactory;

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function cashiers()
    {
        return $this->belongsToMany(User::class, 'cashiers', 'outlet_id', 'user_id');
    }
}
