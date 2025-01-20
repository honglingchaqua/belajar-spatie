<?php  

namespace App\Models;  

use Illuminate\Database\Eloquent\Model;  
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Divisi extends Model  
{  
    use SoftDeletes;
    protected $fillable = [     
        'nama_divisi',   
    ];  

    public function pelanggans(): HasMany  
    {  
        return $this->hasMany(Pelanggan::class);  
    }  
}