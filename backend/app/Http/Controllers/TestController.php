<?php

namespace App\Http\Controllers;
use App\Models\Test;
use App\User;
use DB;

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

        $user = User::where('email', 'admin@admin.com')
                    //->where('password', app('hash')->make('admin12345'))
                    ->first();
                    dd($user);
        return response()->json($user);

        $data = DB::collection('users')->take(10)->get();

        return response()->json($data);
    }

    //
}
