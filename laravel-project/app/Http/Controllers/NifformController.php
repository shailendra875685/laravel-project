<?php

namespace App\Http\Controllers;

use App\Models\Nif;
use Illuminate\Http\Request;

class NifformController extends Controller
{
    public function home(){
        return view('form');
    }

    public function store(Request $request){

        $request->validate([
            'first_name'           =>'required',
            'last_name'            =>'required',
            'email'                =>'required|email',
            'whatsapp_number'      =>'required|integer',
            'country'              =>'required',
            'certification_type'   =>'required',
            'document_type'        =>'required',
            'destination_country'  =>'required',
            'file'                 =>'required',
            'subscribe'            =>'required'
        ]);
        $filename = $request->file; 

        $NewFileName  = $filename->getClientOriginalName();

        $filename->move(public_path('images'),$NewFileName);
        
        $val = Nif::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'whatsapp_number' => $request->whatsapp_number,
            'country' => $request->country,
            'certification_type' => $request->certification_type,
            'document_type' => $request->document_type,
            'destination_country' => $request->destination_country,
            'file_name' => $NewFileName,
            'check_box' => $request->subscribe
        ]);

        return back()->with('msg','Form Uploaded Successfully.');
    }

}
