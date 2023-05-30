<?php

use App\Models\Specialite;
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
        Schema::create('medecins', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('cin');
            $table->string('email');
            $table->integer('telephone');
            $table->date('naissance');
            $table->enum('civilité', ['male', 'female']);
            $table->string('adresse');
            $table->string('image')->nullable();
            $table->string('password')->default('12345678');
            // Nedd to removed online
            $table->boolean('online')->default(false);
            $table->rememberToken();
            $table->foreignIdFor(Specialite::class)->nullOnDelete();
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
        Schema::dropIfExists('medecins');
    }
};
