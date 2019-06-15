<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'history';

    protected $fillable=['ontlener_id','title','auteur','isbn','jaartal',
        'editie','desc','photo'];
}
