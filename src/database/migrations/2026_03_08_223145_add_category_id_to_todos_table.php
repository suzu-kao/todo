<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('todos', function (Blueprint $table) {
            //
            $table->foreignId('category_id')
                ->after('id')
                ->constrained()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
    // {
    //     Schema::table('todos', function (Blueprint $table) {
    //         //
    //         $table->dropForeign(['category_id']);
    //         $table->dropColumn('category_id');
    //     });
    // }
}
