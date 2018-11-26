<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Users extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Users';
    protected $primarykey = 'id';
}
