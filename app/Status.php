<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Status extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Status';
    protected $primarykey = 'id';
}
