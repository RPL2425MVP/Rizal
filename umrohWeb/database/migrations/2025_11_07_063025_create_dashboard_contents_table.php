<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('dashboard_contents', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->text('isi');
        $table->string('kategori'); // hero, about, footer, dll
        $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_contents');
    }
};
