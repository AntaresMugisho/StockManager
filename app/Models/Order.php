<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// use App\Models\Supplier;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    
    public function setCode() : void
    {
        $this->update([
            "code" => sprintf("ORD-%05d", $this->id) 
        ]);
    }


    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }


    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
