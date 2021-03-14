<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplianceReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compliance_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roadmap_version_id')->constrained()->cascadeOnDelete(); // delete if the roadmap is deleted
            $table->foreignId('section_id')->constrained()->cascadeOnDelete();
            $table->text('findings')->nullable();
            $table->text('recommendations')->nullable();
            $table->text('remarks')->nullable();
            $table->foreignId('compliance_status_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('compliance_reviews');
    }
}
