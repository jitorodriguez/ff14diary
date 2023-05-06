<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = ['character_id', 'title', 'body', 'start', 'end'];

    public function character(){
        return $this->hasOne(Character::class, 'id', 'character_id');
    }
}
