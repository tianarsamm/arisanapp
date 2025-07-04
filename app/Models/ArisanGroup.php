<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArisanGroup extends Model
{
    protected $fillable = [
        'name',
        'total_rounds',
        'monthly_fee',
        'status',
    ];

    public function members()
    {
        return $this->hasMany(\App\Models\ArisanMember::class);
    }

    public function winners()
    {
        return $this->hasMany(\App\Models\Winner::class);
    }
}
