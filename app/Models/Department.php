<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['floor_id', 'department_name', 'description'];

    // Relationships
    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
