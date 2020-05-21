<?php

namespace Arden;

abstract class View
{
    protected $data;

    abstract public function setData($data);

    abstract public function getData();

    abstract public function render();

}