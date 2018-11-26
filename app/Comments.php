<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Comments extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Comments';
    protected $primarykey = 'id';
}
