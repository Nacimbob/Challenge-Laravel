<?php

namespace Modules\Graph\Entities;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{


    public $timestamps=false;

    protected $fillable = [];

    protected $guarded=['graph_id'];

    public function graph(){
        return $this->belongsTo('Modules\Graph\Entities\Graph');
    }

}
