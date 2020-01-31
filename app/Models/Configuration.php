<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    public $table = 'configuration';
    public $prefix = 'con';
    public $primaryKey = 'con_id';
}
