<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    // protected $guarded = [];

    protected $fillable = ['user_id', 'title', 'description'];


    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $value){
    $query->where('title' , 'like' , "%{$value}%")
          ->orWhere('description' , 'like' , "%{$value}%");
    }
}
