<?php

use Modules\QSale\Entities\Ads;
use Modules\User\Entities\User;
use Modules\Course\Entities\Course;
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
        Schema::create('garages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('desc')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile');
            $table->boolean('is_certified')->default(0);
            $table->boolean('status')->default(0);
            $table->boolean('from_admin')->default(0);
            $table->foreignIdFor(User::class)->nullable()->constrained()->cascadeOnDelete();
            $table->schemalessAttributes('info');
            $table->softDeletes();
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
        Schema::dropIfExists('garages');
    }
};
