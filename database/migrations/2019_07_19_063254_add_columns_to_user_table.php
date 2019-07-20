<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('dob')->nullable()->after('password');
            $table->date('anniversary')->nullable()->after('password');
            $table->integer('age')->nullable()->after('password');
            $table->string('display_name')->nullable()->after('password');
            $table->string('mobile_number')->nullable()->after('password');
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
            $table->dropColumn('dob');
            $table->dropColumn('anniversary');
            $table->dropColumn('age');
            $table->dropColumn('display_name');
            $table->dropColumn('mobile_number');
        });
    }
}
