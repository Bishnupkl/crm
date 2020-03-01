<?php

namespace App\Http\Services;

use App\Http\Interfaces\UserRepositoryInterface;

class UserService extends Service
{

    public function interface()
    {
        return UserRepositoryInterface::class;
    }

    public function users($type = null)
    {
        if (! empty($type)) {
            return $this->interface->users($type);
        }
        return $this->interface->users();
    }

    public function userStore($data)
    {
        $userName = explode('@',$data['email']);
        $data['username'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/','.',$userName[0]));

        return $this->interface->userStore($data);
    }

    public function userShow($userName)
    {
        return $this->interface->userShow($userName);
    }
}