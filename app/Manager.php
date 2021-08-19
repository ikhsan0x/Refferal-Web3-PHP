<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = [
                'website_title', 'minimum_withdraw','referral_bonus','currency_name','logo',
    ];
}
