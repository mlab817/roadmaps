<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadmapUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roadmap_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roadmap_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('progress_report_id')->nullable()->constrained('progress_reports')->nullOnDelete();
            $table->text('participants_involved')->nullable();
            $table->text('activities_done')->nullable();
            $table->text('activities_ongoing')->nullable();
            $table->text('overall_status')->nullable();
            $table->date('report_date')->nullable();
            $table->text('remarks')->nullable();
            $table->text('attachment_path')->nullable();
            $table->text('attachment_url')->nullable();
//            $table->foreignId('roadmap_version_id')->nullable()->constrained('roadmap_versions')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roadmap_updates');
    }
}
