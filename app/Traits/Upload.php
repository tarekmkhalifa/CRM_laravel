<?php

namespace App\Traits;

trait Upload
{
    public function uploadPhoto($image, $folder)
    {
        // photo name with extension
        $imgName = uniqid() . time() . "." . $image->extension();
        // move photo
        $image->move(public_path("uploads/images/$folder"), $imgName);
        return $imgName;
    }

}
