<?php

namespace App\Helper;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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
        if (Str::startsWith($filename, self::prefix())) {
            $filepath = public_path() . '/' . $folder . '/' . $filename;
            if (File::exists($filepath)) {
                File::delete($filepath);
            }
        }
    }
}
