<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController
{
    public function download(string $fileName)
    {
        // [TODO]: Make a better logic about the filepath
        $filePath = storage_path('app/private/exports/credential/' . $fileName);

        if (!file_exists($filePath)) {
            abort(404);
        }

        return response()->download($filePath);
    }
}
