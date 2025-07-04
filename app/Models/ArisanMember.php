<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArisanMember extends Model
{

    protected $fillable = [
    'user_id',
    'arisan_group_id',
    'join_date',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function group()
    {
        return $this->belongsTo(\App\Models\ArisanGroup::class, 'arisan_group_id');
    }


}
