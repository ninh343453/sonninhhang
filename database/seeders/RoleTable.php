<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
>>>>>>> 2b5498f9c38800ae0665970d5a32de96b74487e5

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

>>>>>>> 2b5498f9c38800ae0665970d5a32de96b74487e5
    }
}
