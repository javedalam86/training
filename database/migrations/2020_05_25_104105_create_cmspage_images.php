<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmspageImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmspage_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("cmspage_id");
            $table->string("url");
            $table->string("title")->nullable();
            $table->string("type")->default('image');
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
      Schema::dropIfExists('cmspage_images');
    }
}
