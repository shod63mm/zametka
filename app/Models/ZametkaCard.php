<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZametkaCard extends Model
{
    use HasFactory;

    protected $fillable = ["zametka_group_id", "title", "sort"];

}
