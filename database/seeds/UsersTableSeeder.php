<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert(
            [
                
                'email' => 'aa@aa.aa',
                'password' => Hash::make('123456')
            ]
        );
        DB::table('recipes')->insert([
            [
                'recipe_code' => 1, 
                'recipe_name' => 'Ginger Bread',
                'recipe_description' => 'Some products more effort and ready'
            ], [
                'recipe_code' => 2, 
                'recipe_name' => 'Cake',
                'recipe_description' => 'Some products more effort and ready'
            ], [
                'recipe_code' => 3, 
                'recipe_name' => 'Soup',
                'recipe_description' => 'Some products more effort and ready'
            ]
        ]);
    }

}