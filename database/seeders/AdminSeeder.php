<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder {

    public function run() {
        User::create([
            'fname' => 'AskInsurpedia',
            'lname' => 'Administrator',
            'email' => 'admin@askinsurpedia.ng',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);
    }
}
