<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\File as FileHistory;

class AssetController extends Controller
{

    public function form(){
        return view('upload');
    }


    public function upload(Request $request){
        
        $request->validate([
            'filename' => 'file|nullable|max:2048|mimes:jpeg,bmp,png,gif,doc,txt,pdf,doc,docx',
        ]);

        if($request->hasFile('filename')) {
            // Get filename with extension            
            $filenameWithExt = $request->file('filename')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
           // Get just ext
            $extension = $request->file('filename')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
          // Upload Image
            $path = $request->file('filename')->storeAs('public/files', $fileNameToStore);

            FileHistory::create([
                'filename' => $fileNameToStore, 
                'type' => "created"
            ]);

            return redirect()->back()->with('success', 'file uploaded');   

        }

        return redirect()->back();
    }


    public function destroy() {

        $path =  storage_path('app/public/files');         
        $filename = $path .'/'. request('filename');
        
        if (File::exists($filename)) {
            //File::delete($image_path);
            unlink($filename);
            FileHistory::create([
                'filename' => request('filename'), 
                'type' => "deleted"
            ]);

            return response()->json([
                'message' => 'file delete'
            ]);
    
        }
        
    }

    public function listing(){
        $histories = FileHistory::orderBy('id', 'DESC')->paginate(2);
        return view('history', compact('histories'));
    }

}
