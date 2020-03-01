<?php
/**
 * Created by PhpStorm.
 * User: The Power Monkey
 * Date: 9/19/2018
 * Time: 10:17 AM
 */

namespace App\Http\Interfaces;

interface UserRepositoryInterface extends RepositoryInterface
{

    public function users($type = null);

    public function userStore($data);

    public function userShow($userName);
}