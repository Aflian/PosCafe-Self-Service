<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = [
        'nama_metode',
        'keterangan',
        'is_active',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
