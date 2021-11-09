<?php

namespace App\Http\Controllers;
use App\Models\Test;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function test()
    {
        // dd(base_path('vendor/mongodb/mongodb/.evergreen/ocsp/ecdsa') . '/ca.crt');

        $data = Test::take(10)->get();

        return response()->json($data);
    }

    //
}
