<?php

use App\Models\Employe;
use App\Models\Service;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employe_service', function (Blueprint $table) {
            $table->foreignIdFor(Employe::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Service::class)->constrained()->onDelete('cascade');
            $table->primary(['employe_id', 'service_id']);

            $table->index('employe_id');
            $table->index('service_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employe_service');
    }
};
