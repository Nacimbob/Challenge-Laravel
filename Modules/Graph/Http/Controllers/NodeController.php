<?php

namespace Modules\Graph\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graph\Http\Services\NodeServiceInterface;

use Modules\Graph\Http\Traits\ApiResponse;
class NodeController extends Controller
{
    use ApiResponse;
    private $nodeService=null;

    function __construct(NodeServiceInterface $node)
    {
       $this->nodeService=$node;
    }




    /**
     * create a new Node for the specified graph.
     * @param Request $request
     * @param int $id graph id
     * @return success
     * exceptions  ar handeled globaly in app/exceptions/handler
     */
    public function store(Request $request,int $id)
    {

            return  $this->success('Node created successfully',$this->nodeService->store($request,$id),201) ;
    }


     /**
     * Remove the specified node.
     * @param int $id of node
     * @return success
     * exceptions  ar handeled globaly in app/exceptions/handler
     */
    public function destroy($id)
    {
      return  $this->success('Graph deleted successfully',$this->nodeService->delete($id),200) ;
    }


}
