<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CodeController extends Controller
{
    public function show()
    {
        return view('code');
    }

    public function code(Request $request)
    {
//        dd($request->all());
//        dd(\DNS1D::getBarcodePNG($request->all()['code'], "EAN13",1));
        return view('code')->with([
            'code' => \DNS1D::getBarcodePNG($request->all()['code'], "EAN13",1),
//            'code' => $request->all()['code'],
        ]);
//        return \DNS1D::getBarcodeHTML($request->all()['code'], "EAN13");
    }
}
