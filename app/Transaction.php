<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'item_id', 'buyer_id', 'status','qty','price',
    ];
}
