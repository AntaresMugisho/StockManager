<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    
    public function setCode() : void
    {
        $this->update([
            "code" => sprintf("ART-%05d", $this->id) 
        ]);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)
                    ->withPivot(["price", "quantity_ordered", "quantity_delivered"]);
    }

    // Getters ----------------------------------------
    
    public function getOrderedQuantityAttribute() : int
    {
        return $this->pivot->quantity_ordered;
    }

    public function getDeliveredQuantityAttribute() : int | null
    {
        return $this->pivot->quantity_delivered;
    }
}
