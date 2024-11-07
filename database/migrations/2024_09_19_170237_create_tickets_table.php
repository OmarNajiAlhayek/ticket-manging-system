<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD:database/migrations/2024_08_27_151540_create_tickets_table.php
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
=======
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('status_id')->constrained()->cascadeOnDelete();
>>>>>>> 5175a82efa4cfc71a48f8fe096d302b5c18f99f3:database/migrations/2024_09_19_170237_create_tickets_table.php
            $table->string('title');
            $table->text('description');
            $table->timestamp('deadline',  0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
