<?php

namespace HoetlTool\Controller;

class UploadController
{
    // @TODO Do validation
    public function upload()
    {
        global $container;
        $uploadHandler = $container->get('HoetlTool\Handler\UploadHandler');
        $uploadHandler->handle();
    }

}
