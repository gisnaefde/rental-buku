<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //menambahkan colom role_id ke dalam user sebagai foreign key dari tabel role
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //untuk menghapus  fereign key dan colum sebagai percobaan rollback
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_roles_id_foreign');
            $table->dropColumn('roles_id');
        });
    }
};
