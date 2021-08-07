<?php

namespace App\Helper;

use Illuminate\Support\Facades\File;

class Uploader
{
    public static function upload($file,  $folder, $name = '')
    {
        $filename = 'dlt-' . $name . '-' . rand(0, 9999999) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path() . '/' . $folder, $filename);

        return $filename;
    }

    public static function deleteWhenExist($filename, $folder)
    {
        if (substr($filename, 0, 4) == 'dlt-') {
            $filepath = public_path() . '/' . $folder . '/' . $filename;
            if (File::exists($filepath)) {
                File::delete($filepath);
            }
        }
    }
}
