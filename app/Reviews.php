<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Reviews extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Reviews';
    protected $primarykey = 'id';
}
