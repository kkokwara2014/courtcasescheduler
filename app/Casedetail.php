<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Casedetail extends Model
{
    

    public function casetype(){
        return $this->hasMany(Casetype::class);
    }
    public function caseschedule(){
        return $this->hasMany(Caseschedule::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
