<?php

namespace Modules\Graph\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graph\Http\Services\RelationServiceInterface;
use Modules\Graph\Http\Requests\CreateRelationRequest;
use Modules\Graph\Http\Traits\ApiResponse;
class RelationController extends Controller
{
    use ApiResponse;
    private $relationService=null;

    function __construct(RelationServiceInterface $relation)
    {
       $this->relationService=$relation;
    }

    public function store(CreateRelationRequest $request,int $id)
    {
        //

            return  $this->success('Node created successfully',$this->relationService->store($request,$id),201) ;
    }
}
