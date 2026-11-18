<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void { Schema::create('complaint_status_histories',function(Blueprint $t){$t->id();$t->foreignId('complaint_id')->constrained()->cascadeOnDelete();$t->foreignId('admin_id')->nullable()->constrained('users')->nullOnDelete();$t->string('old_status')->nullable();$t->string('new_status');$t->string('note')->nullable();$t->timestamps();}); }
 public function down(): void { Schema::dropIfExists('complaint_status_histories'); }
};
