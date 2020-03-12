<?php

namespace App;

use Intervention\Image\ImageManagerStatic as Image;


class Thumbnailer
{

    public function __construct() {

    }


    public function generateThumbnail() {

        $publicDir = getcwd();
        $imageDir =  '/img/orgs';
        $thumbDir = '/img/thumbs';


        foreach (new \DirectoryIterator($publicDir . $imageDir) as $fileInfo) {
            if($fileInfo->isDot()) continue;
            $filename = $fileInfo->getFilename();

            if(file_exists($publicDir . $imageDir . '/' . $filename)) {
                echo $filename;
                Image::configure(array('driver' => 'imagick'));
                $img = Image::make($publicDir . $imageDir . '/' . $filename)->resize(300, 300);
                $img->save($publicDir . $thumbDir . '/' . $filename);
            }
        }






    }
}