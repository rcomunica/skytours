<?php

use App\Contracts\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateTrReportsTable
 */
class CreateTrReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sk_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('leg_id');
            $table->integer('user_id');
            $table->text('pirep_id');
            $table->integer('tour_id');
            $table->enum('status', [0, 1, 2])->default(0);
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
        Schema::dropIfExists('sk_reports');
    }
}
