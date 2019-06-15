<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create(array(
            'role_id'=> 1,
            'firstname'=>'Kevin',
            'lastname'=>'Deduif',
            'rijksregisternummer'=>'85.02.01-002.01',
            'email'=>'kevin.deduif@mail.be',
            'address'=>'lauwestraat 75 8930 lauwe',
            'password'=>Hash::make('awesome')
        ));
        User::create(array(
            'role_id'=> 2,
            'firstname'=>'Lara',
            'lastname'=>'Deduif',
            'rijksregisternummer'=>'85.02.01-002.00',
            'email'=>'lara.deduif@mail.be',
            'address'=>'lauwestraat 75 8930 lauwe',
            'password'=>Hash::make('super')
        ));

    }
}
