<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZametkaGroup extends Model
{
    use HasFactory;
    protected $fillable = ["title", "sort"];
 
    public function cards()
    {
    return $this->hasMany(ZametkaCard::class)->orderBy("sort");
    }
}
