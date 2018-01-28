<?php

namespace App\Report;

class Instance
{
    /**
     * Create instance of class or return null in error case
     *
     * @param string $className
     * @param string $interface
     * @return mixed
     */
    public static function create($className, $interface = null)
    {
        if (!class_exists($className)) {
            return null;
        }

        $instance = app($className);

        if ($interface && !($instance instanceof $interface)) {
            return null;
        }

        return $instance;
    }
}