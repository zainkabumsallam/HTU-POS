<?php

namespace Core\Base;

final class View
{

    private static $views_path;

    function __construct($view, $data = [])
    {
        $data = (object) $data;
        self::$views_path = dirname(__DIR__, 2) . "/resources/views";
        $paths_arr = explode('.', $view);

        self::get_layout('header');

        if (count($paths_arr) == 1) {
            require_once self::$views_path . "/" . $view . ".php";
        } else {
            $multi_level_path = self::$views_path;
            foreach ($paths_arr as $key => $value) {
                $paths_arr[$key] = strtolower($value);
                $multi_level_path .= '/' . strtolower($value);
            }

            $multi_level_path .= '.php';

            require_once $multi_level_path;
        }

        self::get_layout('footer');
    }

    static function get_layout($layout_name)
    {
        require_once self::$views_path . "/partials/$layout_name.php";
    }
}
