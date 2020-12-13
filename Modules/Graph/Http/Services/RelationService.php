<?php
namespace Modules\Graph\Http\Services;

use Modules\Graph\Http\Repositories\RelationRepositoryInterface;
use Modules\Graph\Http\Services\RelationServiceInterface;

use  Illuminate\Http\Request;
use Modules\Graph\Http\Repositories\GraphRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Graph\Http\Exceptions\ModelExistsException;
class  RelationService implements  RelationServiceInterface
{


    private $relationRepo=null;
    private $graphRepo=null;

    function __construct(RelationRepositoryInterface $relation,GraphRepositoryInterface $graph)
    {
        $this->relationRepo=$relation;
        $this->graphRepo=$graph;
    }


    /*
       create a new Graph
       @return the created formation
    */



    public function store(Request $request,int $id){

        if(!$this->graphRepo->find($id)){
            throw new ModelNotFoundException('Graph not found by Id '.$id);

        }
         //dd($this->relationRepo->exists($request->from_node,$request->to_node,$id));
        if($this->relationRepo->exists($id,$request->from_node,$request->to_node)){
           throw new ModelExistsException('relation already exists');
        }

        return $this->relationRepo->create($request->all(),$this->graphRepo->find($id));

    }








}
