<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReputationInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reputation_title',
        'target_username',
        'reputation_price',
        'delivery_date',
    ];

    // İlişkili model belirtme (user tablosu ile)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
