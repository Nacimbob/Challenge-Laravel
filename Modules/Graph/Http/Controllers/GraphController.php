<?php

namespace Modules\Graph\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Graph\Http\Services\GraphServiceInterface;
use Modules\Graph\Transformers\GraphResource;
use Modules\Graph\Http\Traits\ApiResponse;
use Modules\Graph\Http\Requests\GraphRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GraphController extends Controller
{

    use ApiResponse;



    private $graphService=null;
    function __construct(GraphServiceInterface $graph)
    {
         $this->graphService=$graph;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return  $this->success('List of graphs',GraphResource::collection($this->graphService->graphs()),200) ;

    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(GraphRequest  $request)
    {
       $result=$this->graphService->store($request);
       if($result) {
        return  $this->success('Graph created successfully',new GraphResource($result),201) ;
       }

       return  $this->failure('error creating new graph',422);




    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

        return  $this->success('Graph meta data',new GraphResource($this->graphService->graph($id)),200);

    }



    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(GraphRequest $request,int $id)
    {
        //



            return  $this->success('Graph updated successfully',new GraphResource($this->graphService->update($request, $id)),200) ;




    }



    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {


            return  $this->success('Graph deleted successfully',200) ;
    }
}
