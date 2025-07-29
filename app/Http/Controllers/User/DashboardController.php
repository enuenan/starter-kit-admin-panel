<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $svgPath = public_path('icons/svgs');
        $svgFiles = File::files($svgPath);

        // Filter and get only .svg files
        $svgs = collect($svgFiles)->filter(function ($file) {
            return $file->getExtension() === 'svg';
        })->map(function ($file) use ($svgPath) {
            return [
                'name' => $file->getFilenameWithoutExtension(),
                'content' => File::get($file->getRealPath()),
            ];
        })->filter();

        return view('dashboard.view', compact('svgs'));
    }
}
