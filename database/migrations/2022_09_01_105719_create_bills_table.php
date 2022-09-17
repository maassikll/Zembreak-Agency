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
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employe_id')->nullable();
            $table->unsignedBigInteger('project_id')->unique()->nullable();
            $table->string('payment');
            $table->float('amount')->default(0);
            $table->float('amount_spend')->default(0);
            $table->string('file_path')->nullable();
            $table->timestamps();

            $table->foreign('employe_id')->references('id')->on('employes')
            ->onDelete('cascade');

            $table->foreign('project_id')->references('id')->on('projects')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
};
