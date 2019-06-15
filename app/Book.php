<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'books';

    protected $fillable=['rented_id','title','auteur','isbn','jaartal',
        'editie','desc','photo','return_date'];

}
