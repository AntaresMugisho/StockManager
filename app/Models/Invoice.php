<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    use HasFactory;

    // Setters --------------------------------------

    public function setCode(): void
    {
        $this->update([
            "code" => sprintf("FCT-%05d", $this->id) 
        ]);
    }


    // Relationships----------------------------------

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class)
                    ->withPivot(["unit_selling_price", "quantity"]);
    }

    public function booking(): HasOne
    {
        return $this->hasOne(Booking::class);
    }


    // Getters ----------------------------------------

    public function getTotalAttribute(): float
    {
        $total = 0;
        foreach ($this->articles as $article){
            $total += ($article->pivot->unit_selling_price * $article->pivot->quantity) - $this->discount;
        }

        return $total;
    }

    public function getBalanceAttribute(): float
    {
        return ($this->total - $this->paid);
    }
}
