<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadImageTrait
{
    /**
     * Upload a single image file.
     * Returns stored relative path like: "products/abc123.jpg"
     */
    public function uploadImage(UploadedFile $image, string $folder): string
    {
        $folder = trim($folder, '/');

        // Safer + unique name (keeps extension)
        $filename = Str::uuid()->toString() . '.' . $image->getClientOriginalExtension();

        // Stores into storage/app/public/{folder}/{filename}
        $path = $image->storeAs($folder, $filename, 'public');

        return $path; // relative path for DB
    }

    /**
     * Upload multiple images.
     * Returns array of stored relative paths.
     */
    public function uploadImages(array $images, string $folder): array
    {
        $paths = [];

        foreach ($images as $image) {
            if ($image instanceof UploadedFile) {
                $paths[] = $this->uploadImage($image, $folder);
            }
        }

        return $paths;
    }

    /**
     * Delete a single stored image path (relative path on public disk).
    */
    public function deleteImage(?string $path): void
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }

    /**
     * Delete multiple stored images.
     */
    public function deleteImages(array $paths): void
    {
        Storage::disk('public')->delete(array_filter($paths));
    }
}
