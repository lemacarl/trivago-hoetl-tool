<?php

namespace HoetlTool\Handler;

class DownloadHandler
{
    private $fileName;

    private $fileHandle;

    public function __construct($fileName, $extension)
    {
        $pathInfo         = pathinfo($fileName);
        $this->fileName   = $pathInfo['filename'] . '.' . strtolower($extension);
        $this->fileHandle = fopen($this->fileName, 'w');
    }

    public function __destruct()
    {
        $this->close();
    }

    public function close()
    {
        if (is_resource($this->fileHandle)) {
            fclose($this->fileHandle);
            unlink($this->fileName);
        }
    }

    public function processDownload($content)
    {
        $this->writeContent($content);

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($this->fileName) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($this->fileName));
        readfile($this->fileName);
        exit;
    }

    public function writeContent($content)
    {
        fwrite($this->fileHandle, $content);
    }

}
