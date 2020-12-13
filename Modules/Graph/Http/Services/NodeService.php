<?php
namespace Modules\Graph\Http\Services;

Use  Modules\Graph\Http\Services\NodeServiceInterface;
use Modules\Graph\Http\Repositories\NodeRepositoryInterface;
use Modules\Graph\Http\Repositories\GraphRepositoryInterface;
use  Illuminate\Http\Request;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class NodeService  implements NodeServiceInterface
{

    private $nodeRepo=null;
    private $graphRepo=null;

    function __construct(NodeRepositoryInterface $node,GraphRepositoryInterface $graph)
    {
        $this->nodeRepo=$node;
        $this->graphRepo=$graph;
    }


    /*
       create a new node
       @return the created node
    */

    public function store(Request $request,int $graph_id){

        if(!$this->graphRepo->find($graph_id)) {
            throw new ModelNotFoundException('Graph not found by Id '.$graph_id);
        }

        return  $this->nodeRepo->create($request->all(),$this->graphRepo->find($graph_id));


    }

    public function delete(int $node_id){
        if(!$this->nodeRepo->find($node_id)){
            throw new ModelNotFoundException('Node not found by Id '.$node_id);
        }
        return $this->nodeRepo->delete($node_id);
    }








}
