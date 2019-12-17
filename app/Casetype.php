<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Casetype extends Model
{
    

    public function casedetail(){
        return $this->hasMany(Casedetail::class);
    }
}
