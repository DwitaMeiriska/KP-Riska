<?php

namespace App\Http\Controllers;

use App\Models\Tes;
use Illuminate\Http\Request;

class TesController extends Controller
{
    //

    public function index(){
        return view('tes');
    }

    public function upload(Request $request){
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        // $file = $request->file('file');
        // $fileName = $file->getClientOriginalName();
        // $file->move(public_path('file'), $fileName);
        // // $file->move(public_path('file'), $fileName);

        $file = $request->file('file');
        $filename = "file_" . Time() . "_" . $file->getClientOriginalName();
        $file->move(public_path('file'), $filename);
        Tes::create([
            'file_name' => $filename
        ]);

        return redirect()->back();
    }
}
