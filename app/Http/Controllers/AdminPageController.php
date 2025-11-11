<?php

namespace App\Http\Controllers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class AdminPageController extends Controller
{
    public function index(Filesystem $filesystem)
    {
        $pagesPath = resource_path('views');
        $availablePages = collect($filesystem->allFiles($pagesPath))
            ->filter(function ($file) {
                return Str::endsWith($file->getFilename(), '.blade.php');
            })
            ->map(function ($file) use ($pagesPath) {
                return [
                    'name' => $file->getFilename(),
                    'path' => str_replace($pagesPath . DIRECTORY_SEPARATOR, '', $file->getPathname()),
                ];
            })
            ->sortBy('name')
            ->values();

        return view('admin.pages', [
            'availablePages' => $availablePages,
        ]);
    }
}
