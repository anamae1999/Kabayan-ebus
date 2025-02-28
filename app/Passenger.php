<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $table = 'passenger';
    protected $fillable = ['passenger_id,passenger_lname,passenger_fname,
                             passenger_address,passenger_contact,passenger_bus_id','passenger_ticket'];
}
