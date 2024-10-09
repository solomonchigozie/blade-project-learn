<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File as HandleFile;

class FileUploadController extends Controller
{
    public function index() {
        /**
         * deleting images/files
         * 
         */
        // $file= File::find(4);
        // HandleFile::delete(public_path($file->file_path)); //use handlefile to delete file from folder
        // $file->delete(); //delete from database


        $files = File::all();
        return view('file-upload', ['files'=>$files]);
    }
    
    function store(Request $request){
        $request->validate([
            'file'=>['required','image','mimes:jpg,png,gif','max:3000']
        ]);

        //store to local disk
        // $file = Storage::disk('local')->put('/', $request->file('file'));
        // $file = $request->file('file')->store('/','local'); //store files privately
        // $file = $request->file('file')->store('/','public'); //store files and access them publicly
        // dd($file);

        //store in custom storage
        /**
         * dir_public has been create in config/filesystems.php
         */
        // $file = $request->file('file')->store('/','dir_public'); 

        /**
         * custom file name
         */
        $file = $request->file('file');
        $customName = 'laravel_'. Str::uuid();
        $ext = $file->getClientOriginalExtension();
        $fileName = $customName.'.'.$ext;
        $path = $file->storeAs('/',$fileName, 'dir_public');

        //store file in database
        $filestore = new File();
        $filestore->file_path = '/uploads/'.$path;
        $filestore->save();

        // dd('stored');
        return redirect()->back();
    }

    function download() {
        return Storage::disk('local')->download('AFm9mR8nzSgWQl1A9bVap23a3PE3O6SFYAMtNcne.jpg');
    }

    function delete(){
        $file= File::find(4);
        HandleFile::delete(public_path($file->file_path)); //use handlefile to delete file from folder
        $file->delete(); //delete from database
    }
    
}
