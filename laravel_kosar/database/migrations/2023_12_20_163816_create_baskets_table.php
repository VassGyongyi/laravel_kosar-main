<?php

use App\Models\Basket;
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
        Schema::create('baskets', function (Blueprint $table) {
            //a primary... nem hozza létre a mezőket...
            $table->primary(['user_id', 'item_id']);
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('item_id')->references('item_id')->on('products');
            $table->date('date');
            $table->timestamps();
        });
        Basket::create([

            'user_id' => 1,
            'item_id' => 1,
            'date'=>'2023-02-02'
      ]);
      Basket::create([

        'user_id' => 1,
        'item_id' => 2,
        'date'=>'2024-02-20'
  ]);
  Basket::create([

    'user_id' => 1,
    'item_id' => 3,
    'date'=>'2023-02-05'
]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baskets');
    }
};
