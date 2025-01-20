<?php  

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  

return new class extends Migration  
{  
    public function up(): void  
    {  
        Schema::create('produks', function (Blueprint $table) {  
            $table->id();  
            $table->string('nama_produk');  
            $table->integer('stock_produk')->default(0);  
            $table->foreignId('category_id')->constrained('categories');  
            $table->string('gambar')->nullable();  
            $table->text('deskripsi')->nullable();  
            $table->timestamps();  
            $table->softDeletes();  
        });  
    }  

    public function down(): void  
    {  
        Schema::dropIfExists('produks');  
    }  
};