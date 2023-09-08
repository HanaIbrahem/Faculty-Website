<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $guarded=[];

    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
