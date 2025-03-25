<?php

namespace Modules\PkgWidget\Models;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    protected $fillable = ['name', 'method', 'type'];
}
