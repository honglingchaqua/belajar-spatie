<?php  

namespace App\Models;  

use Illuminate\Database\Eloquent\Model;  
use Illuminate\Database\Eloquent\Relations\BelongsTo;  
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;  

class Pelanggan extends Model  
{  
    use SoftDeletes;
    protected $fillable = [  
        'divisi_id',   
        'email',   
        'username',   
        'password',   
        'nama_lengkap',   
        'status_aktif'  
    ];  

    public function divisi(): BelongsTo  
    {  
        return $this->belongsTo(Divisi::class);  
    }  

    public function orders(): HasMany  
    {  
        return $this->hasMany(Order::class);  
    }  
}