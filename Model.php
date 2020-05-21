<?php

namespace Arden;
include_once("dbconfig.php");
abstract class Model
{
    protected $data;

    /**
     * @return array
     */
    abstract public function getData();
}