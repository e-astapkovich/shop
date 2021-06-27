<?php

namespace app\traits;

trait TSingleton {
    /**
     * Реализация паттерна Singleton
     */
    static private $instance = null;

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    static public function getinstance() {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }
    /* Реализация паттерна Singleton */
}