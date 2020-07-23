<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public function getCategoryName(){
        return $this->hasMany('App\Models\Categories', 'id', 'mail_table');
    }
}
