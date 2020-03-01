<?php
/**
 * Created by PhpStorm.
 * User: The Power Monkey
 * Date: 1/5/2018
 * Time: 12:12 PM
 */
namespace App\Traits;

use Exception;
use Illuminate\Support\Facades\Config;

trait General
{
    public $data = [];

    public function data($key, $value){
        if (empty($key)) throw new Exception('Key is not set.');
        return $this->data[$key]=$value;
    }
    public function title($back,$separator=' | ',$front=null){
        if (!isset($front)){
            $front= Config::get('site.name');
        }
        return $front.$separator.$back;
    }
}