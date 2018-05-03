<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //You can rename aliases
    // Table Name
    protected $table='posts';
    //Primary key
    public $primaryKey='id';
    //Timestamps
    public $timestamps= true;
}
