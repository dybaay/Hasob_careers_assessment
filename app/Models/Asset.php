<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function assetAssignment() {
        return $this->hasOne(AssetAssignment::class);
    }
}
