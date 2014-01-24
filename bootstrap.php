<?php

spl_autoload_register(
    function ($class) {
        $require = __DIR__ . '/' . str_replace("\\", '/', $class) . '.php';
        if (file_exists($require)) {
            require_once($require);
        }
    }
);
