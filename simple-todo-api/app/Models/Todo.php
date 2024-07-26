<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $casts = [
        "status" => "boolean",
    ];

    protected $fillable = [
        "title",
        "status"
    ];
}
