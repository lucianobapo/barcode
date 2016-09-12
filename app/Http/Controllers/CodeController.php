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
        $requestData = $request->all();
        return view('code')->with([
            'code' => $requestData['code'],
            'codeImage' => \DNS1D::getBarcodePNG($requestData['code'], "EAN13",1),
        ]);
    }
}
