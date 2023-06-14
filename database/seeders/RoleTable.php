<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
>>>>>>> 46dd47226387b3dfc627028378a24eabd91c31b5

class RoleTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        //
=======
        DB::table('role')->insert([
        [
            'name' =>'Seller'
        ],
        [
            'name' =>'Customer'
        ],
        [
            'name' =>'Admin'
        ]
        ]);

>>>>>>> 46dd47226387b3dfc627028378a24eabd91c31b5
    }
}
