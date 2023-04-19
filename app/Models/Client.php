<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
