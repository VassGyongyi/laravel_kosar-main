<?php

use App\Models\ProductType;
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
        Schema::create('product_types', function (Blueprint $table) {
            $table->id('type_id');
            $table->string('name');
            $table->longText('description');
            $table->integer('cost')->default(200);
            $table->timestamps();
        });

        ProductType::create([
            'name' => 'lámpa', 
            'description' => 'leírás', 
            'cost' => ('400'),
            
        ]);
        ProductType::create([
            'name' => 'esernyő', 
            'description' => 'leírás', 
            'cost' => ('200'),
            
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_types');
    }
};
