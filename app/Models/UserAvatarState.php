<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAvatarState extends Model
{
    protected $guarded = [];

    public function items()
    {
        return $this->belongsTo('App\Models\Item','item_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
