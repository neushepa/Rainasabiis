<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditToConsultSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consult_sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
            $table->unsignedBigInteger('mentor_id')->change();
            $table->string('link')->nullable()->change();
            $table->dropColumn(['start_at','end_at']);
            $table->tinyInteger('sesi_ke')->after('topic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consult_sessions', function (Blueprint $table) {
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->dropColumn('sesi_ke');
        });
    }
}
