<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;


class AdminController extends Controller
{
    protected $directories = [
        'images' => 'public/images/',
        'videos' => 'public/videos/',
        'others' => 'public/others/'
    ];

    /**
     * @param $file
     * $file get the file Request of form
     */
    protected function uploadImage($file)
    {
        /** @var string $filename */
        $filename = time() . '_' . $file->getClientOriginalName();

        /** @var string $directory make directory with format public/{something}/year/mounth/day/ */
        $directory = $this->directories['images'] . Carbon::now()->format('Y/m/d/');

        $file = $file->move(public_path($directory) , $filename);

        /** @var integer array $sizes get sizes of images that will be create */
        $sizes = [200];

        /** @var array $url has uploaded images url*/
        $url['images'] = $this->resize( $file->getRealPath() , $sizes , $directory , $filename);

        $url['thumb'] = $url['images'][$sizes[0]];

        /** @var array $url : include 2 main indexes : 'images' & 'thumb' and 'images' include 'key' => 'value' == 'size' => 'imageResizedAddress' */
        return $url;
    }

    /**
     * @param $realImagePath : is the original image real path
     * @param $sizes : is an array that include sizes will be created
     * @param $directory : has main upload directory
     * @param $filename : name of original uploaded image
     * @return array : an array has address of uploaded images with size index
     */
    protected function resize($realImagePath , $sizes , $directory , $filename)
    {
        /** @var string array $images has uploaded images directory*/
        $images['original'] = $directory . $filename;

        foreach ($sizes as $size) {

            $images[$size] = $directory . $size . '_' . $filename;

            Image::make($realImagePath)->resize($size , null , function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($images[$size]));

        }

        return $images;
    }
}
