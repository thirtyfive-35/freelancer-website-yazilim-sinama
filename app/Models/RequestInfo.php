<?php

// app/Models/RequestInfo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestInfo extends Model
{
    use HasFactory;

    protected $table = 'request_infos';

    protected $fillable = [
        'user_id',
        'price',
        'hizmet_title', // Değişiklik burada
        'delivery_date', // Değişiklik burada
        'hizmet_describe', // Değişiklik burada
        //'freelancer_keywords',
        'hizmet_not',
        'hizmet_sistem',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // User'a ait bilgilere daha kolay erişim için özel bir özellik ekleyebilirsiniz
    public function getUserNameAttribute()
    {
        return $this->user->name;
    }
    
}
