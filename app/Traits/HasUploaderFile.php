<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasUploaderFile
{
    public function uploadFile($folder, $file, $oldFile = null)
    {
        // Delete old file if it exists
        if ($oldFile && Storage::exists($oldFile)) {
            Storage::delete($oldFile);
        }

        // Generate a random name for the new file
        $newFileName = $folder . '/' . uniqid(microtime(true)) . '.' . $file->getClientOriginalExtension();

        // Store the new file
        Storage::put($newFileName, file_get_contents($file));

        // Return the new file name
        return $newFileName;
    }
}
