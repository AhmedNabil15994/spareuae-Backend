<?php

use Modules\User\Entities\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->longText('question')->nullable()->change();
            $table->longText('answer')->nullable()->change();
            $table->longText('desc')->nullable()->after('answer');
            $table->foreignIdFor(User::class)->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->json('answer')->change();
            $table->json('question')->change();
            $table->dropColumn('desc');
            $table->dropConstrainedForeignId('user_id');
        });
    }
};
