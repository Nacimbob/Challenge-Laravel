<?php
namespace Modules\Graph\Http\Services;

use Modules\Graph\Http\Repositories\RelationRepositoryInterface;
use Modules\Graph\Http\Services\RelationServiceInterface;

use  Illuminate\Http\Request;
use Modules\Graph\Http\Repositories\GraphRepositoryInterface;
use Modules\Graph\Http\Repositories\NodeRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Graph\Http\Exceptions\ModelExistsException;
use Modules\Graph\Http\Exceptions\NodesParentException;
class  RelationService implements  RelationServiceInterface
{


    private $relationRepo=null;
    private $graphRepo=null;
    private $nodeRepo;

    function __construct(RelationRepositoryInterface $relation,GraphRepositoryInterface $graph,NodeRepositoryInterface $node)
    {
        $this->relationRepo=$relation;
        $this->graphRepo=$graph;
        $this->nodeRepo=$node;
    }


    /*
       create a new Graph
       @return the created formation
    */



    public function store(Request $request,int $id){

        if(!$this->graphRepo->find($id)){
            throw new ModelNotFoundException('Graph not found by Id '.$id);

        }
        if(!$this->nodeRepo->find($request->from_node)){
            throw new ModelNotFoundException('Node not found by Id '.$request->from_node);

        }
        if(!$this->nodeRepo->find($request->to_node)){
            throw new ModelNotFoundException('Node not found by Id '.$request->to_node);

        }

        if($this->relationRepo->exists($request->from_node,$request->to_node)){
           throw new ModelExistsException('relation already exists');
        }

        if(!$this->nodeRepo->belongSameGraph($request->from_node,$request->to_node)){

            throw new NodesParentException('nodes has different parent graph');
        }

        return $this->relationRepo->create($request->all(),$this->graphRepo->find($id));

    }








}
