<?php

namespace HoetlTool\Handler;

class UploadHandler
{
    private $fileName;

    private $format;

    public function __construct()
    {
        $this->fileName = $_POST['fileName'];
        $this->format   = $_POST['format'];
    }
    public function handle()
    {
        $reader     = $this->getReader();
        $converter  = $this->getConverter();
        $output     = $converter->convert($reader);
        $downloader = $this->getDownloader();
        $downloader->processDownload($output);

    }

    private function getReader()
    {
        global $container;
        return $container->make('HoetlTool\File\CSVReader', ['path' => $_FILES['file']['tmp_name']]);
    }

    private function getConverter()
    {
        global $container;
        return $container->get('HoetlTool\Converter\\' . $this->format . 'Converter');
    }

    private function getDownloader()
    {
        global $container;
        return $container->make('HoetlTool\Handler\DownloadHandler', ['fileName' => $this->fileName, 'extension' => $this->format]);
    }
}
