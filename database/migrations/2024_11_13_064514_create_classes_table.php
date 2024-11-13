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
        Schema::create('classes', function (Blueprint $table) {
            $table->id('class_id');
            $table->string('class_name', 100);
            $table->unsignedBigInteger('uploaded_by')->nullable();
            $table->string('schedule', 255);
            $table->timestamps();

            $table->foreign('uploaded_by')->references('teacher_id')->on('teachers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign(['uploaded_by']); // Удалите внешний ключ
        });

        Schema::dropIfExists('classes');
    }
};
