<?php

namespace Core;

use Exception;

abstract class Controller
{
    protected array $routeParams = [];

    public function __construct($routeParams)
    {
        $this->routeParams = $routeParams;
    }

    /**
     * @throws Exception
     */
    public function __call($name, $args)
    {
        $method = $name;

        if (method_exists($this, $method)) {
            if ($this->before() != false) {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else {
            throw new Exception("Method $method not found in controller " . get_class($this));
        }
    }

    protected function before()
    {
    }

    protected function after()
    {
    }
}
