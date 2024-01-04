<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id', // request_info tablosundaki ID ile eşleşen request_id sütunu
        'user_id',    // request_info tablosundaki user_id sütunu
        'offer_price',
        'active',
        'order_status',
        'delivery_status',     // Aktif durum sütunu
    ];

    protected $casts = [
        'active' => 'boolean', // 'active' sütununu bir boolean olarak işaretle
    ];

    // İlişkili request_info'yu getirme
    public function requestInfo()
    {
        return $this->belongsTo(RequestInfo::class, 'request_id', 'id');
    }

    // İlişkili kullanıcıyı getirme
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

