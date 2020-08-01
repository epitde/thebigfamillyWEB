<?php

return [

    'driver' => env('IMAGE_DRIVER', 'imagick'),
    'upload_path' => env('IMAGE_UPLOAD_PATH', '/uploads'),
    'upload_path2' => env('IMAGE_UPLOAD_PATH_2', '/uploads/files'),
];
