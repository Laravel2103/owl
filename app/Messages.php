<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Messages extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Messages';
    protected $primarykey = 'id';
}
