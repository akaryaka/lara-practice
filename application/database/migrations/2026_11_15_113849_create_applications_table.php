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
    Schema::create('applications', function (Blueprint $table) {
        $table->id();
        // Правильный способ связи с таблицей users
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
        $table->string('title');
        $table->text('description'); // Изменили со string на text!
        $table->string('status')->default('new');
        $table->string('category')->default('other');
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
        Schema::dropIfExists('applications');
    }
};
