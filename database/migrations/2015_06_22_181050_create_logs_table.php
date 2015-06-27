<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');

            $table->date('log_date');

            $table->decimal('fueled_units', 10, 3);
            $table->decimal('driven_units', 10, 3);
            $table->decimal('cost_per_unit', 10, 3);
            $table->decimal('cost_total', 10, 2);
            $table->text('longitude');
            $table->text('latitude');

            $table->decimal('average_usage', 10, 3);

            $table->boolean('metric_system')->default(1);

            $table->integer('vehicle_id')->unsigned();
            $table->foreign('vehicle_id')->references('id')->on('vehicles');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('logs');
    }
}
