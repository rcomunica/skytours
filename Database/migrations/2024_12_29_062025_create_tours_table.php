<?php

use App\Contracts\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateToursTable
 */
class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sk_tours', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->date("start_date");
            $table->date("end_date");
            $table->string("description");
            $table->string("rules")->nullable();
            $table->string("image");
            $table->string("payment");
            $table->string("award");
            $table->integer("status");
            $table->string("created_by");
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
        Schema::dropIfExists('sk_tours');
    }
}
