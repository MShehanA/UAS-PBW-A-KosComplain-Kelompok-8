<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void { Schema::create('complaints',function(Blueprint $t){$t->id();$t->foreignId('user_id')->constrained()->cascadeOnDelete();$t->string('title',150);$t->string('category',60);$t->text('description');$t->string('room_number',30);$t->string('image')->nullable();$t->string('status')->default('Menunggu');$t->timestamps();$t->index(['status','category']);}); }
 public function down(): void { Schema::dropIfExists('complaints'); }
};
