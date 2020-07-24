<?php

namespace services\Images;

use services\facade\FileFacade;
use Illuminate\Support\Facades\Config;
use Intervention\Image\ImageManager;

class ImageService
{
    protected $upload_path;

    public function __construct()
    {
        $this->upload_path = Config::get('images.upload_path');
    }

    public function up($image)
    {

        if ($image) {
            //get filename with extension
            $filename_with_extension = $image->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filename_with_extension, PATHINFO_FILENAME);

            //get file extension
            $extension = $image->getClientOriginalExtension();

            //filename to store
            $filename_to_store = FileFacade::makeName($image);

            // dd(public_path($this->upload_path) . '/');
            //Upload File
            $image->move(public_path($this->upload_path) . '/', $filename_to_store);

            $manager = new ImageManager(array('driver' => Config::get('images.driver')));

            $img = $manager->make(public_path($this->upload_path . '/' . $filename_to_store));

            return ['status' => 1, 'data' => $filename_to_store];
        }
        return ['status' => 0, 'data' => ''];
    }
}
