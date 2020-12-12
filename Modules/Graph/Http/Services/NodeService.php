<?php
namespace Modules\Graph\Http\Services;

Use  Modules\Graph\Http\Services\NodeServiceInterface;
use Modules\Graph\Http\Repositories\NodeRepositoryInterface;
use Modules\Graph\Http\Repositories\GraphRepositoryInterface;
use  Illuminate\Http\Request;

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
       create a new Graph
       @return the created formation
    */

    public function store(Request $request,int $graph_id){
        if($this->graphRepo->find($graph_id)){
            return  $this->nodeRepo->create($request->all(),$this->graphRepo->find($graph_id));
        }
        return null;

    }








}
