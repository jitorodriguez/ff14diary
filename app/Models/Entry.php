<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DateTime;
use Carbon\Carbon;
use App\Models\Job;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = ['character_id', 'title', 'body', 'start', 'end'];

    public function character(){
        return $this->hasOne(Character::class, 'id', 'character_id');
    }

    public function jobs(){
        return $this->morphToMany(Job::class, 'taggable');
    }

    public function getSessionLength()
    {
        $startDateTime = new DateTime($this->start);
        $endDateTime = new DateTime($this->end);
        
        $dateDiff = $endDateTime->diff($startDateTime);
        
        //return $dateDiff->format('%H:%I');
        return $dateDiff->format('%h hour - %i minute(s)');
    }
}
