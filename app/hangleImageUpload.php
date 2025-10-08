<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait hangleImageUpload
{
    public function handleImageUpload($image, $name, $folder = 'images', $oldImagePath = null)
    {
        // if no image is provided, return old image path
        if (!$image) {
            return $oldImagePath;
        }

        // Delete old image if exists
        if ($oldImagePath && Storage::disk('public')->exists(str_replace('/storage/', '', $oldImagePath))) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $oldImagePath));
        }

        // Store new image
        $imageName = $name ? Str::slug($name) : Str::uuid() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs($folder, $imageName, 'public');
        // $imagePath = $image->store($folder, 'public');

        return $imagePath;
    }
}
