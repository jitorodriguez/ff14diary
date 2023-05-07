<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Character;

class Job extends Model
{
    use HasFactory;

    public function characters()
    {
        return $this->belongsToMany(Character::class);
    }
}
