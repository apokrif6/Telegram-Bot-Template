<?php

class DBConfig
{
    private $path;
    public array $config;

    public function __construct($path = __DIR__."/runtime.php")
    {
        $this->path = $path;
        $this->config = array();
        $this->read();
    }

    private function read() {
        $lines = file($this->path, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line)
        {
            $line = trim($line);
            if ($line[0] == "#")
                continue;

            $index = explode("=", $line);
            if (count($index) > 1)
                $this->config[$index[0]] = $index[1];
        }
    }
}