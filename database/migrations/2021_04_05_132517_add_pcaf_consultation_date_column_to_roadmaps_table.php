<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPcafConsultationDateColumnToRoadmapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roadmaps', function (Blueprint $table) {
            $table->string('pcaf_consultation_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roadmaps', function (Blueprint $table) {
            $table->dropColumn('pcaf_consultation_date');
        });
    }
}
