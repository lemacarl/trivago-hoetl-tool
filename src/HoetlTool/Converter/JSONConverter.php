<?php

namespace HoetlTool\Converter;

use HoetlTool\File\Reader;

class JSONConverter implements Converter
{

    public function convert(Reader $reader)
    {
        $keys = $reader->read();

        $output = array();
        while ($row = $reader->read()) {
            $output[] = array_combine($keys, $row);
        }

        return json_encode($output);
    }
}
