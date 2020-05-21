<?php

namespace Arden;

abstract class BaseController
{
    protected $modelData;

    abstract public function getModelData();
}