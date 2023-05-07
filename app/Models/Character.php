<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Job;

class Character extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'server'];

    public function jobs(){
        return $this->belongsToMany(Job::class);
    }
}
