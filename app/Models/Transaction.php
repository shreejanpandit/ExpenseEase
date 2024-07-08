<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'description',
        'type',
        'transaction_date',
        'user_id',
    ];

    public function userData()
    {
        return $this->belongsTo(User::class);
    }
}
