<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = "income"; // ชื่อ table
    protected $fillable = [
        'note', 'amount', 'type', 'userid'
    ];
}
