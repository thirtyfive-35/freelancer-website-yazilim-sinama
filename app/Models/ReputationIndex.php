<?php

// app/Models/ReputationIndex.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReputationIndex extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_user_id',
        'target_user_id',
        'target_and_client_username',
        'limit_price',
    ];

    // İlişkileri tanımlamak için gerekirse buraya ekleyebilirsin.
    // İlişkileri tanımlamak için gerekirse buraya ekleyebilirsin.
    public function clientUser()
    {
        return $this->belongsTo(User::class, 'client_user_id')->constrained();
    }

    public function targetUser()
    {
        return $this->belongsTo(User::class, 'target_user_id')->constrained();
    }
}


