<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobno');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('empid')->unique();
            $table->string('username')->unique();
            $table->string('department')->nullable();
            $table->boolean('is_delete')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('mobno');
            $table->dropColumn('gender');
            $table->dropColumn('empi');
            $table->dropColumn('username');
            $table->dropColumn('department');
        });
    }
}
