<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    const STATUS = ['ACTIVE' => 1, 'INACTIVE' => 0];

    protected $fillable = [
        'name',
        'flag',
        'short_code',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
