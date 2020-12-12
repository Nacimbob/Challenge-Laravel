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
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('graph::index');
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request,int $id)
    {
        //
        $result = $this->nodeService->store($request,$id);
        if($result){
            return  $this->success('Node created successfully',$result,201) ;
        }
        return  $this->failure('graph not found',404);


    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('graph::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('graph::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
