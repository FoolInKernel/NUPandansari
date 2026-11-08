<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ImageHelper
{
    /**
     * Convert uploaded image to WEBP and store in public disk.
     */
    public static function convertToWebp(UploadedFile $file, string $folder, int $quality = 80): string
    {
        $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '_' . time() . '.webp';
        $targetDir = storage_path('app/public/' . $folder);

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $targetPath = $targetDir . '/' . $filename;
        $image = @imagecreatefromstring(file_get_contents($file->getRealPath()));

        if ($image !== false) {
            if (function_exists('imagepalettetotruecolor')) {
                imagepalettetotruecolor($image);
            }
            imagealphablending($image, true);
            imagesavealpha($image, true);
            imagewebp($image, $targetPath, $quality);
            return $folder . '/' . $filename;
        }

        return $file->store($folder, 'public');
    }
}
