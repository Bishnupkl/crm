<?php
/**
 * Created by PhpStorm.
 * User: The Power Monkey
 * Date: 9/7/2018
 * Time: 11:04 AM
 */

namespace App\Http\Services;


use Illuminate\Contracts\Container\Container;

abstract class Service
{
    protected $interface;

    /**
     * Service constructor.
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        $this->interface = $app->make($this->interface());
    }

    /**
     * @return mixed
     */
    abstract public function interface();

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->interface->create($attributes);
    }
}