<?php

namespace App\services\OrganizationalProfile;

use App\Models\OrganizationProfile;

class OrganizationalProfileService
{
    protected $org_profile;

    public function __construct()
    {
        $this->org_profile = new OrganizationProfile();
    }

    /**
     * Get all general_profile from database
     */
    public function getAll()
    {
        return $this->org_profile->all();
    }

    /**
     * Get a single language from database
     */
    public function get($id)
    {
        return $this->org_profile->find($id);
    }

    /**
     * Create language object and save in database
     */
    public function create($data)
    {
        return $this->org_profile->create($data);
    }

    /**
     * Delete language object from database
     */
    public function delete($id)
    {
        $org_profile = $this->get($id);

        $org_profile->delete();
    }

    public function update(OrganizationProfile $org_profile, array $data)
    {
        //Update object with given data
        return $org_profile->update($this->edit($org_profile, $data));
    }

    protected function edit(GeneralProfile $org_profile, $data)
    {
        //convert object attributes to array and merge with updated array
        return array_merge($org_profile->toArray(), $data);
    }
}
