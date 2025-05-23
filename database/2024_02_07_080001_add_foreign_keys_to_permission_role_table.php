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
        Schema::table('permission_role', function (Blueprint $table) {
            $table->foreign(['permission_id'], 'fk_permission_id_permissionrole')->references(['id'])->on('permissions')->onDelete('CASCADE');
            $table->foreign(['role_id'], 'fk_role_id_permissionsrole')->references(['id'])->on('roles')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropForeign('fk_permission_id_permissionrole');
            $table->dropForeign('fk_role_id_permissionsrole');
        });
    }
};
