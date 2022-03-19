<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    protected $fillable = [
        'reply_data', 'ticket_id', 'reply_by'
    ];
}
