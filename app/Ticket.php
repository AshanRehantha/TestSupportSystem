<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
    'ticket_id', 'name', 'email', 'contact_number', 'pro_discription', 'status'
];
}
