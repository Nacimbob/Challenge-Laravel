<?php

namespace Modules\Graph\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Graph extends Model
{

    public $timestamps=true;

    public function nodes(){
      return $this->HasMany('Modules\Graph\Entities\Node');
    }

    protected $fillable = ['name','description'];


}
