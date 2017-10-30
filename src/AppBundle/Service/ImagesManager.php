<?php
/**
 * Created by Sow Mouctar:  http://moccine-design.com/.
 * User: GLOBAL SERVICE PLUS
 * Date: 18/07/2017
 * Time: 21:16
 */

namespace AppBundle\Service;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImagesManager
{
    private $targetDir;

    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function upload(UploadedFile $file)
    {
        //creation  de nom
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->getTargetDir(), $fileName);

        return $fileName;
    }

    /**
     * @param $filename
     * @return bool
     */
    public  function removeFile($filename){
        $target=$this->targetDir.'/'.$filename;
        if(file_exists($target)){
            unlink($target);
            return true;
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getTargetDir()
    {
        return $this->targetDir;
    }

}