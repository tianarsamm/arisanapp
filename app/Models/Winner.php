<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{

    protected $fillable = [
        'arisan_member_id',
        'arisan_group_id',
        'round_number',
    ];
    public function member()
    {
        return $this->belongsTo(\App\Models\ArisanMember::class, 'arisan_member_id');
    }

    public function group()
    {
        return $this->belongsTo(\App\Models\ArisanGroup::class, 'arisan_group_id');
    }

}
