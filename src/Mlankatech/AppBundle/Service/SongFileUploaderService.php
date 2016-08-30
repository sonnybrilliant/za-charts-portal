<?php

namespace Mlankatech\AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class SongFileUploaderService
{
    private $targetDir;

    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.'mp3';

        $file->move($this->targetDir, $fileName);

        return $fileName;
    }
}