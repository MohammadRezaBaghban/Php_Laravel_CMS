<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'Posts';
    //Primary Key 
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
