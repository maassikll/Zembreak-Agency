<?php

use App\Models\Employe;
use App\Models\Project;
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
        Schema::create('employe_project', function (Blueprint $table) {
            $table->foreignIdFor(Employe::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Project::class)->unique()->constrained()->onDelete('cascade');
            $table->primary(['employe_id', 'project_id']);

            $table->index('employe_id');
            $table->index('project_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employe_project');
    }
};
