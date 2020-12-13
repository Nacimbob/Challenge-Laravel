<?php
namespace Modules\Graph\Http\Services;

Use  Modules\Graph\Http\Services\GraphServiceInterface;
use Modules\Graph\Http\Repositories\GraphRepositoryInterface;
use  Illuminate\Http\Request;
use Modules\Graph\Http\Requests\GraphRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class GraphService  implements GraphServiceInterface
{

    private $graphRepo=null;

    function __construct(GraphRepositoryInterface $graph)
    {
        $this->graphRepo=$graph;

    }


    /*
       create a new Graph
       @return the created formation
    */

    public function store(Request $request){

       return  $this->graphRepo->create($request->all());

    }

    public function graphs(){

      return   $this->graphRepo->all();

    }

    public function update(GraphRequest $request,int $graph_id){
        $graph= $this->graphRepo->find($graph_id);

        if(!$graph) {
            throw new ModelNotFoundException('Graph not found by Id '.$graph_id);
        }

        return $this->graphRepo->update($request->all(),$graph_id);

    }

    public function graph(int $graph_id){

        $graph= $this->graphRepo->find($graph_id);
        if(!$graph) {
            throw new ModelNotFoundException('Graph not found by Id '.$graph_id);
        }


        return $graph;

    }




    public function delete(int $graph_id)
    {
        $graph= $this->graphRepo->find($graph_id);
        if(!$graph) {
          throw new ModelNotFoundException('Graph not found by Id '.$graph_id);
        }
        return $this->graphRepo->delete($graph_id);
    }


    public function clearEmpy()
    {
        return $this->graphRepo->clearEmpy();
    }


}
