<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = [
            [
                'username'=>'admin1',
                'password'=>Hash::make('admin123'),
                'id_jenis_user'=>'101',
            ],
            [
                'username'=>'vendor1',
                'password'=>Hash::make('vendor123'),
                'id_jenis_user'=>'102'
            ],
            [
                'username'=>'gudangbawah',
                'password'=>Hash::make('gudangbawah'),
                'id_jenis_user'=>'103'
            ],            
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
