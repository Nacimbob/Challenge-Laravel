<?php

namespace Modules\Graph\Entities;

use Illuminate\Database\Eloquent\Model;


class Graph extends Model
{

    public $timestamps=true;

    protected $fillable = ['name','description'];


}
