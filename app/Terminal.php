<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    protected $table = 'terminal';
    protected $fillable = ['terminal_id,terminal_name,terminal_address,
                             terminal_contact,terminal_created_date'];
    protected $primarykey = 'terminal_id';

    function buses() {
        return $this->belongsTo('App\Buses');
    }
}

