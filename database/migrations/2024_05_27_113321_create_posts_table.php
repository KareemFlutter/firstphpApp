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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //! VARCHAR Title
            $table->text('description'); //! Text  
            $table->timestamps(); //! Created_at , Updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //! to delete or remove table 
        //! this function is optional not required
        //! becuse there is rolback commnd
        Schema::dropIfExists('posts');

    }
};
