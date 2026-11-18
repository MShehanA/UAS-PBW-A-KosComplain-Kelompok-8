<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void { Schema::create('complaint_responses',function(Blueprint $t){$t->id();$t->foreignId('complaint_id')->constrained()->cascadeOnDelete();$t->foreignId('admin_id')->constrained('users')->restrictOnDelete();$t->text('response');$t->timestamps();}); }
 public function down(): void { Schema::dropIfExists('complaint_responses'); }
};
