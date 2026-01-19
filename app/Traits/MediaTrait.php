<?php

namespace App\Traits;

use App\Models\Media;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\ImageManager;

trait MediaTrait
{
    public function uploadMedia($image, $folderName, $quality = 80)
    {
        $manager = new ImageManager(Driver::class);

        // Get the original filename without extension
        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

        // Convert the original filename to a slug
        $sluggedName = Str::slug($originalName);

        // Generate a unique identifier (timestamp + random number)
        $uniqueIdentifier = time() . '-' . rand(1000, 9999);

        // Append the unique identifier to the slugged filename
        $imageName = $sluggedName . '-' . $uniqueIdentifier . '.webp';

        // Define the folder path for the user-specified folder within public (e.g., public/{folderName})
        $folderPath = public_path($folderName);

        // Ensure the folder is created if it doesn't exist
        if (!is_dir($folderPath)) {
            mkdir($folderPath, 0755, true); // Create the directory with proper permissions
        }

        // Process the image and convert it to webp
        $img = $manager->read($image->getRealPath());
        $encodedImage = $img->encode(new WebpEncoder(quality: $quality)); // Encode as webp with adjustable quality

        // Store the image directly in the public folder
        $filePath = $folderPath . '/' . $imageName;
        file_put_contents($filePath, (string) $encodedImage); // Save the encoded image as a string

        // Save the image details in the database (optional)
        $uploadedImage = Media::create([
            'name' => $imageName,
            'path' => $folderName . '/' . $imageName,
        ]);

        return $uploadedImage;
    }

    public function uploadMultipleMedia(array $images, string $folderName, int $quality = 80)
    {
        $uploadedMedia = [];

        foreach ($images as $image) {

            // Reuse single upload logic for consistency
            $uploadedMedia[] = $this->uploadMedia(
                image: $image,
                folderName: $folderName,
                quality: $quality
            );
        }

        return $uploadedMedia;
    }

    // public function uploadMultipleMedia(array $images, string $folderName, int $quality = 80)
    // {
    //     if (count($images) !== 2) {
    //         throw new \Exception('Exactly 2 NID images are required.');
    //     }

    //     return collect($images)->map(
    //         fn ($image) => $this->uploadMedia($image, $folderName, $quality)
    //     )->toArray();
    // }


    // public function deleteMedia($media)
    // {
    //     $filePath = public_path($media->path);

    //     // Delete the file from the file system
    //     if (File::exists($filePath)) {
    //         File::delete($filePath);
    //     }

    //     // Delete the database record
    //     $media->delete();
    // }
    public function deleteMedia($media)
    {
        // If only ID is passed, fetch the Media model
        if (is_numeric($media)) {
            $media = Media::find($media);
        }

        if (! $media) {
            return false;
        }

        $filePath = public_path($media->path);

        // Delete the file from the file system
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        // Delete the database record
        $media->delete();

        return true;
    }
}
