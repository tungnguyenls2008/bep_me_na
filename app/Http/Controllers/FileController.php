<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller{
    public function getFile($filename){
        $file=Storage::disk('public')->get($filename);

        return response()->download($file);
    }
}
