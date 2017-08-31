<?php

spl_autoload_register(
    function ($class) {
        if (stripos($class, __NAMESPACE__) !== 0) {
            @include(HOME_PATH.'/src/'.str_replace(
                    '\\',
                    DIRECTORY_SEPARATOR,
                    ucfirst(substr($class, strlen(__NAMESPACE__)))
                ).'.php');
        }
    }
);