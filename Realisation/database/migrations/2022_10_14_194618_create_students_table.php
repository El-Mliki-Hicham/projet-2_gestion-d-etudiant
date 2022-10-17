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
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments("Id_promotion");
            $table->string('Name_Promotion')->nullable();
            $table->timestamps();
            });
        Schema::create('students', function (Blueprint $table) {
        $table->increments("Id_student");
        $table->string('Name_student')->nullable();
        $table->string('Age')->nullable();
        $table->unsignedInteger('Promotion')->nullable();
        $table->foreign('Promotion')
        ->references('Id_promotion')
        ->on('promotions')
        ->onDelete('cascade');
        $table->timestamps();
        });
    
    
        // Schema::create('Promotions', function (Blueprint $table) {
        //     $table->increments("id_promotion");
        //     $table->string('Name_promotion')->nullable();
        //     $table->string('')->nullable();
        //     $table->timestamps();

        // });
        // Schema::create('exercices', function (Blueprint $table) {
        //     $table->increments("id_exercice")->nullable();
        //     $table->string('nom_exercice')->nullable();
        //     $table->unsignedInteger('categorie_exercice')->nullable();
        //     $table->string('description_exercice')->nullable();
        //     $table->string('repetition_exercice')->nullable();
        //     $table->string('photo_exercice')->nullable();
        //     $table->foreign('categorie_exercice')
        //     ->references('id_categorie_exercice')
        //     ->on('categories_exerices')
        //     ->onDelete('cascade');
        //     $table->timestamps();

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
