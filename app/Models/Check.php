<?php

namespace App\Models;

use App\Models\CheckItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Check extends Model
{
    use HasFactory;
    protected $table = 'check';
    protected $fillable = ['user_id', 'title', 'color'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CheckItem::class);
    }
}
