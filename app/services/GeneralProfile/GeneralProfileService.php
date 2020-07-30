<?php

namespace App\services\GeneralProfile;

use App\Models\GeneralProfile;

class GeneralProfileService
{
    protected $general_profile;

    public function __construct()
    {
        $this->general_profile = new GeneralProfile();
    }

    /**
     * Get all general_profile from database
     */
    public function getAll()
    {
        return $this->general_profile->all();
    }

    /**
     * Get a single language from database
     */
    public function get($id)
    {
        return $this->general_profile->find($id);
    }

    /**
     * Create language object and save in database
     */
    public function create($data)
    {
        return $this->general_profile->create($data);
    }

    /**
     * Delete language object from database
     */
    public function delete($id)
    {
        $general_profile = $this->get($id);

        $general_profile->delete();
    }

    public function update(GeneralProfile $general_profile, array $data)
    {
        //Update object with given data
        return $general_profile->update($this->edit($general_profile, $data));
    }

    protected function edit(GeneralProfile $general_profile, $data)
    {
        //convert object attributes to array and merge with updated array
        return array_merge($general_profile->toArray(), $data);
    }
}
