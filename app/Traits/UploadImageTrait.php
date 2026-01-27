<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image;
use Spatie\Image\Enums\Unit; // ✅ needed for padding units
use Spatie\Image\Enums\AlignPosition; // ✅ import AlignPosition enum

trait UploadImageTrait
{
    public function uploadImage($image, $path)
    {
        // Generate unique filename
        $name = time() . rand(99, 1000) . '.' . $image->getClientOriginalExtension();
        $fullPath = storage_path('app/public/' . $path . '/' . $name);

        // Ensure directory exists
        $dir = dirname($fullPath);
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        // Temporary source path
        $tmpPath = $image->getRealPath();

        // ✅ Path to your logo watermark
        $logoPath = public_path('assets/img/watermark.png');

        // ✅ Apply watermark (bottom-right, with padding & opacity)
        Image::load($tmpPath)->
            watermark($logoPath,
	width:100,widthUnit:Unit::Percent,
	height:100,heightUnit:Unit::Percent,
    alpha:95,
	)
            ->save($fullPath);

        // Return relative path for database use
        return $path . '/' . $name;
    }

    public function deleteImage($image)
    {
        Storage::disk('public')->delete($image);
    }
}
