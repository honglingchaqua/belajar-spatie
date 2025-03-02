<?php  

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  

return new class extends Migration  
{  
    public function up(): void  
    {  
        Schema::create('orders', function (Blueprint $table) {  
            $table->id();  
            $table->foreignId('pelanggan_id')->constrained('pelanggans');  
            $table->date('order_date');  
            $table->string('status')->default('pending');  
            $table->timestamps();  
            $table->softDeletes();  
        });  
    }  

    public function down(): void  
    {  
        Schema::dropIfExists('orders');  
    }  
};