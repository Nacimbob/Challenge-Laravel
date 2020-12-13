<?php

namespace Modules\Graph\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
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
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request,int $id)
    {
        //
            return  $this->success('Node created successfully',$this->nodeService->store($request,$id),201) ;
    }




}
