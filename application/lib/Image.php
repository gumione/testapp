<?php

class ImageFile {

    public $image = null;
    public $extension = null;

    public function __construct($filename, $tmp_file)
    {
        $this->_getExtension($filename);
        $new_name = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . md5($filename) . time() . '.' . $this->extension;
        if(move_uploaded_file($tmp_file, $new_name)) {
            $this->image = $new_name;
        }
    }

    public function resizeImage($new_width)
    {
        if ($this->extension == "jpg" || $this->extension == "jpeg") {
            $src = imagecreatefromjpeg($this->image);
        } else if ($this->extension == "png") {
            $src = imagecreatefrompng($this->image);
        } else if ($this->extension == "gif") {
            $src = imagecreatefromgif($this->image);
        }
        
        list($width, $height) = getimagesize($this->image);
        
        if($width > 320) {
            $new_height = ($height / $width) * $new_width;
            $tmp = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            $filename = $this->image;
            imagejpeg($tmp, $filename, 100);
            imagedestroy($tmp);
            $this->image = pathinfo($filename,PATHINFO_FILENAME) . '.' . $this->extension;
        } else {
            $this->image = pathinfo($this->image,PATHINFO_FILENAME) . '.' . $this->extension;
        }
    }
    
    private function _getExtension($filename)
    {
        $this->extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    }

}
