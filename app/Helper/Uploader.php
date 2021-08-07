<?php

namespace App\Helper;

use Illuminate\Support\Facades\File;

class Uploader
{
    public static function prefix()
    {
        return 'deletable-';
    }

    public static function upload($file,  $folder, $name = '')
    {
        $filename = self::prefix() . $name . '-' . rand(0, 9999999) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path() . '/' . $folder, $filename);

        return $filename;
    }

    public static function deleteWhenExist($filename, $folder)
    {
        if (substr($filename, 0, strlen(self::prefix())) == self::prefix()) {
            $filepath = public_path() . '/' . $folder . '/' . $filename;
            if (File::exists($filepath)) {
                File::delete($filepath);
            }
        }
    }
}
