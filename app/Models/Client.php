<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $guarded = ["id"];


    public function setCode() : void
    {
        $this->update([
            "code" => sprintf("CLT-%05d", $this->id) 
        ]);
    }


    public function invoices() : HasMany    
    {
        return $this->hasMany(Invoice::class);
    }
}
