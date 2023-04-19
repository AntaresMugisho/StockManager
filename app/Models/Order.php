<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
