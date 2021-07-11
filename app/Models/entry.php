<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class entry extends Model
{
    use HasFactory;

    public function sethospitalIdAttribute($value){
        $hospital = Hospital::where('name',$value)->firstOrFail();
        $id = $hospital->id;
        $this->attributes['hospital_id'] = $id;
    }

    public function getChildNameAttribute(){
        return $this->childFirstName." ".$this->childMiddleName;
    }

    public function getMothersNameAttribute(){
        return $this->motherFirstName." ".$this->motherMiddleName;
    }

    public function getFathersNameAttribute(){
        return $this->fatherFirstName." ".$this->fatherMiddleName;
    }

    public function Hospital(){
        return $this->belongsTo( Hospital::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
