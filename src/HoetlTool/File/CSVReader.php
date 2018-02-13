<?php

namespace HoetlTool\File;

use HoetlTool\File\Reader;

class CSVReader implements Reader
{
    private $handle;

    public function __construct($path)
    {
        $this->handle = fopen($path, 'r');
    }

    public function __destruct()
    {
        $this->close();
    }

    public function read()
    {
        return fgetcsv($this->handle, 1024, ',');
    }

    public function close()
    {
        if (is_resource($this->handle)) {
            fclose($this->handle);
        }
    }

}
