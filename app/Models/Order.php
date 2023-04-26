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


    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class)
                    ->withPivot(["price", "quantity_ordered", "quantity_delivered"]);
    }


    public function getValueAttribute(): float
    {
        $value = 0;
        foreach ($this->articles as $article){
            $value += $article->pivot->price * $article->pivot->quantity_ordered;
        }

        return $value;
    }


    public function getOrderedQuantityAttribute(): int
    {
        $quantity = 0;
        foreach ($this->articles as $article){
            $quantity += $article->pivot->quantity_ordered;
        }

        return $quantity;
    }


    public function getDeliveredQuantityAttribute(): int
    {
        $quantity = 0;
        foreach ($this->articles as $article){
            $quantity += $article->pivot->quantity_delivered;
        }

        return $quantity;
    }

    
    public function getValidatedAttribute(): bool
    {
        return ($this->deliveredQuantity >= $this->orderedQuantity );
    }
}
