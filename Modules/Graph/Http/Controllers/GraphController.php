<?php

namespace Modules\Graph\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Graph\Http\Services\GraphServiceInterface;
use Modules\Graph\Transformers\GraphResource;
use Modules\Graph\Http\Traits\ApiResponse;
use Modules\Graph\Http\Requests\GraphRequest;
use Modules\Graph\Transformers\GraphDetailedResource;


class GraphController extends Controller
{

    use ApiResponse;



    private $graphService=null;
    function __construct(GraphServiceInterface $graph)
    {
         $this->graphService=$graph;
    }
    /**
     * Display a listing of the graphs.
     * @return list of graphs
     */
    public function index()
    {

        return  $this->success('List of graphs',GraphResource::collection($this->graphService->graphs()),200) ;

    }


    /**
     * create new graph.
     * @param GraphRequest $request validates given params
     * @return success
     * exceptions  ar handeled globaly in app/exceptions/handler
     */

    public function store(GraphRequest  $request)
    {

        return  $this->success('Graph created successfully',new GraphResource($this->graphService->store($request)),201) ;

    }

    /**
     * show the specified graph.
     * @param int $id of graph
     * @param Request $request holds URI params if all==true return graph with nodes and relations else return graph meta data
     * @return success
     * exceptions  ar handeled globaly in app/exceptions/handler
     */
    public function show(Request $request,$id)
    {
       if($request->all==true){
        return $this->success('Graph with nodes and relations',new GraphDetailedResource($this->graphService->graph($id)),200);
       }
       return  $this->success('Graph meta data',new GraphResource($this->graphService->graph($id)),200);



    }






    /**
     * update the specified graph.
     * @param int $id of graph
     * @param GraphRequest $request validates given params
     * @return success
     * exceptions  ar handeled globaly in app/exceptions/handler
     */
    public function update(GraphRequest $request,int $id)
    {

            return  $this->success('Graph updated successfully',new GraphResource($this->graphService->update($request, $id)),200) ;

    }



    /**
     * Remove the specified graph.
     * @param int $id of graph
     * @return success
     * exceptions  ar handeled globaly in app/exceptions/handler
     */
    public function destroy($id)
    {

       return  $this->success('Graph deleted successfully',$this->graphService->delete($id),200) ;

    }
}
