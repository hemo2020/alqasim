<?php
// Temporary shim to satisfy static analysis for PHP_CompatInfo_Parser
// This file is intentionally minimal. It's a fallback until the
// real "bartlett/php-compatinfo" package is installed.

if (!class_exists('PHP_CompatInfo_Parser')) {
    class PHP_CompatInfo_Parser
    {
        protected $delegate = null;

        public function __construct(...$args)
        {
            // Try to use a namespaced class if the real package is installed
            if (class_exists('\\Bartlett\\CompatInfo\\Parser')) {
                $this->delegate = new \Bartlett\CompatInfo\Parser(...$args);
                return;
            }
            // Minimal stub — methods may be added as needed by the project.
        }

        // Provide a generic method caller to forward to delegate if available
        public function __call($name, $arguments)
        {
            if ($this->delegate && method_exists($this->delegate, $name)) {
                return $this->delegate->{$name}(...$arguments);
            }
            // No-op for unknown methods to avoid fatal errors; return null
            return null;
        }

        public static function __callStatic($name, $arguments)
        {
            $fqn = '\\Bartlett\\CompatInfo\\Parser';
            if (class_exists($fqn) && method_exists($fqn, $name)) {
                return $fqn::{$name}(...$arguments);
            }
            return null;
        }
    }
}
