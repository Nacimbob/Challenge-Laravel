<?php
namespace Modules\Graph\Http\Services;



use  Illuminate\Http\Request;

Interface  NodeServiceInterface
{




    /*
       create a new Graph
       @return the created formation
    */

    public function store(Request $request,int $graph_id);


    public function delete(int $node_id);





}
