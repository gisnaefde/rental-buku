<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //unutk menghapus dulu isi tabel
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        //data yang akan di masukan ke database
        $data = [
            'admin','client'
        ];

        //menambahkan datake database
        foreach($data as $value){
            Role::insert([
                'name'=>$value
            ]);
        }

    }
}
