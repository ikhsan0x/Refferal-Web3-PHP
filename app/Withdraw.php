<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = [
                'name', 'userid','action1',
    ];
    
     public function user()
    {
        return $this->belongsTo(User::class, 'userid','id');
    }
    
}
