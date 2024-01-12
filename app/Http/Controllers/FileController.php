<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\person;
use Illuminate\Support\Facades\DB;


class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);

        $file = $request->file('file');

        $path = $file->store('laravel', 'spaces'); // 'uploads' is the folder in your Space
        DB::table('person')->insert([
            'firstname'=>$request->input('firstname'),
            'lastname'=>$request->input('lastname'),
            'type'=>$request->input('type'),
            'picture'=>$path
        ]);
        return response()->json(['path' => $path]);
    }

    public function getvalue(){
        $posts = DB::table('person')->get();
        return view('view', ['person' => $posts]);
    }
    
    // public function getImage(Request $request){
    //   $path = DB::table("person")->find($request->id);
    //   $photoPath = $path->picture;
    //   if(Storage::disk('block')->exists($photoPath)){
    //     $fileContent = Storage::disk('block')->get($photoPath);
    //     $contentType = pathinfo($photoPath, PATHINFO_EXTENSION);
    //     return response($fileContent)->header('Content-Type', $contentType);
    //   }
    // }

    
        // if($request->input('type') == '1'){
        //   $path = $file->store('laravel', 'block');
        //   DB::table('person')->insert([
        //       'firstname'=>$request->input('firstname'),
        //       'lastname'=>$request->input('lastname'),
        //       'type'=>$request->input('type'),
        //       'picture'=>$path
        //   ]);
          
        //   return response()->json(['path' => $path]);
        // } else if($request->input('type') == '0') {
        //   $path = $file->store('laravel', 'spaces'); // 'uploads' is the folder in your Space
        //   DB::table('person')->insert([
        //       'firstname'=>$request->input('firstname'),
        //       'lastname'=>$request->input('lastname'),
        //       'type'=>$request->input('type'),
        //       'picture'=>$path
        //   ]);
        //   return response()->json(['path' => $path]);
        // }
}