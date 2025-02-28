<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buses extends Model
{
    protected $table = 'buses';
    protected $fillable = ['bus_name,bus_code,operator_id,
                             total_seats,status','bus_departuretime
','bus_departuredate','bus_origin','bus_price','bus_origin_lat','bus_origin_lang','bus_destination_lat','bus_destination_long'];
    protected $primarykey = 'bus_id';
}
