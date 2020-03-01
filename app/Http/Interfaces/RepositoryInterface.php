<?php
/**
 * Created by PhpStorm.
 * User: The Power Monkey
 * Date: 9/7/2018
 * Time: 11:12 AM
 */

namespace App\Http\Interfaces;

interface RepositoryInterface
{
    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);
}