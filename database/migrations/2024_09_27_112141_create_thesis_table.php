<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thesis', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('thesis_title'); // Column for thesis title
            $table->string('thesis_file'); // Column for storing thesis file path (e.g., file upload)
            $table->string('thesis_course'); // Column for the course related to the thesis
            $table->text('abstract'); // Column for storing the abstract of the thesis
            $table->timestamps(); // Automatically adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thesis');
    }
}
