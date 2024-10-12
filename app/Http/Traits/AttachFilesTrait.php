<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFilesTrait
{

    public function newUploade($request, $name, $path, $nameToStore)
    {
        $filenamewithextension = $request->file($name)->getClientOriginalName();
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $extension = $request->file($name)->getClientOriginalExtension();
        $filenametostore = $nameToStore.'_'.time().'.'.$extension;
        $request->file($name)->storeAs('public/attachments/' . $path, $filenametostore);
        return $filenametostore;
    }

    public function uploadFile($request, $name, $folder)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs('attachments/' . $folder . '/', $file_name, 'upload_attachments');
    }
    public function deleteFile($name, $path)
    {
        $exists = Storage::disk('public/attachments/')->exists($path . $name);
        if ($exists) {
            Storage::disk('public/attachments/')->delete($path . $name);
        }
    }
}
