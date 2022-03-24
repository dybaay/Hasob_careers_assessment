<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetAssignment extends Model
{
    use HasFactory;
    protected $guarded = [];
//    protected $with = ['user'];

    public function asset() {
        return $this->belongsTo(Asset::class);
    }
    public function assigned_by() {
        return $this->belongsTo(User::class, 'assigned_by');
    }
    public function assigned_user() {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }



}
