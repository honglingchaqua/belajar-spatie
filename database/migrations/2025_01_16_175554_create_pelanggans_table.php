<?php  

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  

return new class extends Migration  
{  
    public function up(): void  
    {  
        Schema::create('pelanggans', function (Blueprint $table) {  
            $table->id();  
            $table->string('email')->unique();  
            $table->string('password');  
            $table->string('username')->unique();  
            $table->string('nama_lengkap');  
            $table->foreignId('tipe_divisi')->constrained('divisis');  
            $table->timestamps();  
            $table->softDeletes();  
        });  
    }  

    public function down(): void  
    {  
        Schema::dropIfExists('pelanggans');  
    }  
};