<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('todo_tasks', function (Blueprint $table) {
            $table->foreign('todo_list_id')
                ->references('id')
                ->on('todo_lists')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('todo_tasks', function (Blueprint $table) {
            $table->dropForeign(['todo_list_id']);
        });
    }
};
