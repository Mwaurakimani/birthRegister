<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use SoftDeletes;
    use HasFactory;

    //should control input entry
    protected $guarded = [];

    public function entry(){
        return $this->hasMany(entry::class);
    }
}
