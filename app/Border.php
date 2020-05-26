<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Border extends Model
{
    protected $fillable = ['fname', 'lname', 'age', 'id_number', 'id_type', 'mode_of_transpo', 'vplatenum', 'purpose', 'destination', 'border_name', 'path'];
}
