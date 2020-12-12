<?php

namespace Modules\Graph\Entities;

use Illuminate\Database\Eloquent\Model;


class Relation extends Model
{
    public $timestamps=false;

    protected $fillable = ['from_node','to_node'];


}
