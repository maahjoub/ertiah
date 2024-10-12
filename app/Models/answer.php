<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    use HasFactory;

    public function qustion()
    {
        return $this->belongsTo(Questions::class);
    }
    protected $hidden = [
        'created_at', 'updated_at', 'qid',
    ];
}
