<?php

namespace App;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = ['name','nik','address'];
}
