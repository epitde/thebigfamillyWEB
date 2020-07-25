<?php

namespace services\Users;

use App\Models\User;

class UserService
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * Get all users from database
     */
    public function getAllUsers()
    {
        return $this->user->all();
    }

    /**
     * Get a single user from database
     */
    public function get($id)
    {
        return $this->user->find($id);
    }

    /**
     * Create user object and save in database
     */
    public function create($data)
    {
        return $this->user->create($data);
    }

    /**
     * Delete user object from database
     */
    public function delete($id)
    {
        $user = $this->get($id);

        $user->delete();
    }

    public function getUsersByType($type)
    {
        return $this->user->where('user_role', $type)->get();
    }
    public function getTranslatorWithPermission()
    {
        # code...
    }
}
