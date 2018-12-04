<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Friends extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Friends';
    protected $primarykey = 'id';
}
