<?php
/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 17/06/2017
 * Time: 10:36
 */

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{

    /**
     * @param UploadedFile $file
     * @param string       $targetDir
     * @return string
     */
    public function upload(UploadedFile $file,$targetDir)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($targetDir, $fileName);

        return $fileName;
    }


}