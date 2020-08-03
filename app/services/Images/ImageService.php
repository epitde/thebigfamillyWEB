<?php

namespace App\services\Images;

use Illuminate\Support\Facades\Config;

class ImageService
{
    protected $upload_path;

    public function __construct()
    {
        $this->upload_path = Config::get('images.upload_path');
        $this->upload_path2 = Config::get('images.upload_path2');
    }

    public function up($image)
    {

        if ($image) {
            //Generate image name to store
            $image_name = md5(date('yyyymmddhhss') . rand()) . '.' . $image->getClientOriginalExtension();

            //Upload File
            $image->move(public_path($this->upload_path) . '/', $image_name);

            return ['status' => 1, 'data' => $image_name];
        }
        return ['status' => 0, 'data' => ''];
    }

    public function upFile($file)
    {

        if ($file) {
            //Generate image name to store
            $file_name = md5(date('yyyymmddhhss') . rand()) . '.' . $file->getClientOriginalExtension();

            //Upload File
            $file->move(public_path($this->upload_path2) . '/', $file_name);

            return ['status' => 1, 'data' => $file_name];
        }
        return ['status' => 0, 'data' => ''];
    }
}
