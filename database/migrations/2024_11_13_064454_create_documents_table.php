<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id('document_id');
            $table->string('title', 200);
            $table->dateTime('upload_date')->default(now());
            $table->string('file_path', 255);
            $table->unsignedBigInteger('uploaded_by')->nullable();
            $table->timestamps();

            $table->foreign('uploaded_by')->references('teacher_id')->on('teachers')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign(['uploaded_by']); // Удалите внешний ключ
        });
        
        Schema::dropIfExists('documents');
    }
};
