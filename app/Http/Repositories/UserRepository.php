<?php
/**
 * Created by PhpStorm.
 * User: The Power Monkey
 * Date: 9/19/2018
 * Time: 10:20 AM
 */

namespace App\Http\Repositories;

use App\Models\Counselor;
use App\Models\Reception;
use App\Models\User;

class UserRepository extends Repository
{
    public function model()
    {
        return User::class;
    }

    public function users($type = null)
    {
        if (empty($type)) {
            return $this->model->get();
        }
        return $this->model->whereHas(
            'morph.role',
            function ($query) use($type){
                $query->where('slug',$type);
            }
        )->orderBy('name')->get();
    }

    public function userStore($data)
    {
        if($data['role']==='3'){
            $user = Counselor::create(
                [
                    'role_id' => array_get($data, 'role', null)
                ]
            );
        }elseif ($data['role']==='4') {
            $user = Reception::create(
                [
                    'role_id' => array_get($data, 'role', null)
                ]
            );
        }
        if ($user){
            return $user->user()->create($data);
        }
    }

    public function userShow($userName)
    {
        return $this->model->where(
            function ($query) use($userName){
                $query->where('username',$userName);
            }
        )->first();
    }
}