<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caseschedule extends Model
{
    

    public function casedetail(){
        return $this->belongsTo(Casedetail::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
