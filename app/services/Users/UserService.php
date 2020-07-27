<?php

namespace App\services\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
     * Get all users who are not admin from database
     */
    public function getAllNotAdminUsers()
    {
        return $this->user->where('user_role', '!=', User::USER_ROLES['ADMIN'])->get();
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

    public function getUserByEmail($email)
    {
        return $this->user->where('email', $email)->first();
    }

    public function createUser($data)
    {
        $data['password'] = Hash::make($data['password']);

        return $this->create($data);
    }

    public function updateUser($data)
    {
        $user = $this->get($data['id']);

        if ($data['new_password']) {
            $data['password'] = Hash::make($data['new_password']);
        }

        return $this->update($user, $data);
    }

    public function update(User $user, array $data)
    {
        //Update object with given data
        return $user->update($this->edit($user, $data));
    }

    protected function edit(User $user, $data)
    {
        //convert object attributes to array and merge with updated array
        return array_merge($user->toArray(), $data);
    }
}
