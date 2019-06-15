<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(array(
            'role' =>'bib admin'
        ));
        Role::create(array(
            'role' =>'ontlener'
        ));
    }
}
