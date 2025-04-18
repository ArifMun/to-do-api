<?php

namespace App\Models;

use App\Models\Check;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckItem extends Model
{
    use HasFactory;
    protected $table = 'check_item';
    protected $fillable = ['check_id', 'content', 'is_done'];

    public function checklist()
    {
        return $this->belongsTo(Check::class);
    }
}
