<?php  

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  

return new class extends Migration  
{  
    public function up(): void  
    {  
        Schema::create('status_pesanans', function (Blueprint $table) {  
            $table->id();  
            $table->foreignId('pelanggan_id')->constrained('pelanggans');  
            $table->foreignId('divisi_id')->constrained('divisis');  
            $table->date('tanggal_pesanan');  
            $table->string('status_pesanan')->default('pending');  
            $table->timestamps();  
            $table->softDeletes();  
        });  
    }  

    public function down(): void  
    {  
        Schema::dropIfExists('status_pesanans');  
    }  
};