<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDocument extends Model
{
    const TYPE = ['VERIFICATION' => 1, 'GOVT' => 2, 'OTHERS' => 3];

    protected $fillable = [
        'name',
        'type',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
