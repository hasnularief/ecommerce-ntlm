<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::collection('payment_methods')
            ->insert(['name' => 'Paypal', 'slug' => 'paypal']);
        DB::collection('payment_methods')
            ->insert(['name' => 'Pay on delivery', 'slug' => 'cash']);
    }
}
