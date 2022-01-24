<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;

    protected $fillable = ['process_title', 'make', 'image_name'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
