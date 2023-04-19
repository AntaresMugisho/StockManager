<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function setCode() : void
    {
        $this->update([
            "code" => sprintf("FCT-%05d", $this->id) 
        ]);
    }
}
