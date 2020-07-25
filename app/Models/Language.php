<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'name',
        'flag',
        'short_code',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
