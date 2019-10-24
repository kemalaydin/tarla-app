<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->enum('work_type',['tohum_alma','gubre_alma','planlama','ekme','sulama','toplama','tasima'])->comment('[0] : Tohum Alma, [1] : Gübre Alma, [2] : Planlama, [3] : Ekme, [4] : Sulama, [5] : Toplama, [6] : Taşıma');
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
        Schema::dropIfExists('works');
    }
}
