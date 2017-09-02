<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    public $table = "item";


    public function itemnewspaper()
    {
        return $this->belongsTo(newspaper::class);
    }

}
