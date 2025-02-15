<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Status extends Model
{
    /** @use HasFactory<\Database\Factories\StatusFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function requests(): HasMany
    {
        return $this->hasMany(Request::class);
    }
}
