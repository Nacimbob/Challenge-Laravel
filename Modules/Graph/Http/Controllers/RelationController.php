<?php

namespace Modules\Graph\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Graph\Http\Services\RelationServiceInterface;
use Modules\Graph\Http\Requests\CreateRelationRequest;
use Modules\Graph\Http\Traits\ApiResponse;
use Modules\Graph\Http\Exceptions\NodesParentException;
class RelationController extends Controller
{
    use ApiResponse;
    private $relationService=null;

    function __construct(RelationServiceInterface $relation)
    {
       $this->relationService=$relation;
    }

        /**
     * create a new relation for the specified graph.
     * @param Request $request
     * @param int $id graph id
     * @return success
     * exceptions  ar handeled globaly in app/exceptions/handler
     */


    public function store(CreateRelationRequest $request,int $id)
    {
        try{
            $result= $this->relationService->store($request,$id);
        }
        catch(NodesParentException $exception){
            return  $this->failure($exception->getMessage(),422) ;
        }
        return  $this->success('Node created successfully',$result,201) ;

    }
}
