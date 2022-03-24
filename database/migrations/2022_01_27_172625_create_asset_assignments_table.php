<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id');
            $table->unsignedBigInteger('assigned_by');
            $table->string('assignment_date')->default(now());
            $table->string('status')->default('assigned');
            $table->unsignedBigInteger('assigned_user_id');
            $table->string('due_date');
            $table->boolean('is_due')->default(false);
            $table->timestamps();

            $table->foreign('assigned_user_id')->references('id')->on('users');
            $table->foreign('assigned_by')->references('id')->on('users')->cascadeOnDelete();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asset_assignments');
    }
}
