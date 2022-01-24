<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['title','ingredients','image_name'];

    /**
     * レシピを保持するユーザーの取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * ツールを保持するユーザーの取得
     */
    public function tool()
    {
        return $this->belongsTo(User::class);
    }

}
