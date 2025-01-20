<?php  

namespace App\Models;  

use Illuminate\Database\Eloquent\Model;  
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model  
{  
    use SoftDeletes;
        protected $fillable = [  
        'nama_category',   
        'deskripsi',   
        'status_category'  
    ];  

    public function produks(): HasMany  
    {  
        return $this->hasMany(Produk::class);  
    }  
}