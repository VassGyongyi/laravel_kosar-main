<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('create TRIGGER novel 
        AFTER DELETE on baskets
        for each row
        
           UPDATE products set quality=quality+1 where item_id=old.item_id' );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
