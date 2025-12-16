<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'kode_order',
        'table_id',
        'payment_method_id',
        'total_harga',
        'status',
        'approved_by',
        'approved_at',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    // Relasi
    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function financial()
    {
        return $this->hasOne(Financial::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // Helper Status
    public function isPendingVerification(): bool
    {
        return $this->status === 'menunggu_verifikasi';
    }

    public function isCompleted(): bool
    {
        return $this->status === 'selesai';
    }
}
