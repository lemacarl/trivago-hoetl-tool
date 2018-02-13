<?php

namespace HoetlTool\Converter;

use HoetlTool\File\Reader;

interface Converter
{
    public function convert(Reader $reader);
}
