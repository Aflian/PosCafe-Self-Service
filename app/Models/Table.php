<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
        'kode_meja',
        'status',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function activeOrder()
    {
        return $this->hasOne(Order::class)
            ->whereNotIn('status', ['selesai', 'ditolak']);
    }
}
