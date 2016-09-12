<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

use App\Http\Requests;

class CodeController extends Controller
{
    use ValidatesRequests;

    public function show()
    {
        return view('code');
    }

    public function code(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|numeric',
        ]);

        $requestData = $request->all();

        $ean13Digit = $this->ean13Digit($requestData['code']);

        return view('code')->with([
            'code' => $ean13Digit,
            'codeImage' => \DNS1D::getBarcodePNG($ean13Digit, "EAN13", 1),
        ]);
    }

    /**
     * @param $code
     * @return string
     */
    private function ean13Digit($code)
    {
        $somaImpar = 0;
        $somaPar = 0;

        for ($i = 0; $i < strlen($code); $i++) {

            if (($i % 2) == 1) //é ímpar
                $somaImpar = $somaImpar + $code[$i];
            if (($i % 2) == 0) //é par
                $somaPar = $somaPar + $code[$i];
        }
        $somaResultados = $somaPar + ($somaImpar * 3);

        if (($somaResultados % 10)==0)
            return $code.'0';
        else
            return $code.(10-($somaResultados % 10));
    }
}
