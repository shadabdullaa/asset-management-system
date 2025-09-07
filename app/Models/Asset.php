<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id', 'category_id', 'asset_name', 'manufacturer',
        'model', 'serial_number', 'purchase_date', 'warranty_expiry', 'cost',
        'condition', 'status', 'location', 'description', 'with_whom'
    ];

    // Relationships
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function maintenance()
    {
        return $this->hasMany(AssetMaintenance::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}