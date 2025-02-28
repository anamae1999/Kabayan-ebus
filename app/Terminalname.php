<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    protected $fillable = ['terminal_id,terminal_name,terminal_address,
                             terminal_contact,terminal_created_date'];  
	
}