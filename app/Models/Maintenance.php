<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_id',
        'maintenance_date',
        'description',
        'cost',
        'performed_by',
        'next_due'
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}