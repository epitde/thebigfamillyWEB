<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationProfile extends Model
{
    protected $table = "organization_profile";
    /**
     * @var string[]
     */
    protected $fillable = [
        'category_user_id',
        'subcategory_user_id',
        'name',
        'responsible',
        'main_phone',
        'main_address',
        'latitude',
        'longitude',
        'digitally_identified_user',
        'alternative_identified_user',
        'user_id',
        'birth_year', 'birth_month', 'birth_day', 'profession', 'mobile_phone', 'govt_identification', 'status', 'city', 'country'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function getUser()
    {
        return $this->belongsTo(User::class);
    }
}
