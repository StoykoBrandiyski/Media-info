<?php

namespace App\Services;

use Illuminate\Http\Request;


class FileService {

    public function storeFile(Request $request,$inputName,$folder)
    {
        $imageName = null;

        if($request->hasFile($inputName))
        {
            $imageName = $request->file($inputName)->store($folder,'public');
            
        }

        return $imageName;
    }

}