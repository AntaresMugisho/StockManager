<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = ["id"];


    public function setCode() : void
    {
        $this->update([
            "code" => sprintf("FRN-%05d", $this->id) 
        ]);
    }

    
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
