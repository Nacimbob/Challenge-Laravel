<?php
namespace Modules\Graph\Http\Services;

use Modules\Graph\Http\Repositories\RelationRepositoryInterface;
use Modules\Graph\Http\Services\RelationServiceInterface;

use  Illuminate\Http\Request;

class  RelationService implements  RelationServiceInterface
{


    private $relationRepo=null;

    function __construct(RelationRepositoryInterface $relation)
    {
        $this->relationRepo=$relation;

    }


    /*
       create a new Graph
       @return the created formation
    */



    public function store(Request $request){

    }








}
