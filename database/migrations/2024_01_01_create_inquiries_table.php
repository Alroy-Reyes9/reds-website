<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
  public function up(): void {
    Schema::create('inquiries', function (Blueprint $t) {
      $t->id();
      $t->string('name',120);$t->string('phone',30);
      $t->string('email',120)->nullable();$t->string('service',60);
      $t->text('message');
      $t->enum('status',['new','in_progress','resolved','archived'])->default('new');
      $t->text('notes')->nullable();$t->timestamp('read_at')->nullable();
      $t->timestamps();
      $t->index('status');$t->index('created_at');
    });
  }
  public function down(): void { Schema::dropIfExists('inquiries'); }
};
