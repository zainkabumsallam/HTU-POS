<?php

namespace Core\Base;

abstract class Controller
{

    public $view;
    public $data = [];

    abstract public function render(): View;

    protected function view($view, $data = [])
    {
        return new View($view, $data);
    }
}
