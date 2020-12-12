<?php
namespace Modules\Graph\Http\Repositories;

Use  Modules\Graph\Http\Repositories\GraphRepositoryInterface;
Use  Modules\Graph\Entities\Graph;

class GraphRepository  implements GraphRepositoryInterface
{



    /*
       create a formation
       @return the created formation
    */


   public function create(array $parameters){

        return Graph::create($parameters);
   }

   public function find(int $id)
   {
       return Graph::find($id);
   }

   public function all(){
       return Graph::paginate(20);
   }

   public function delete(int $id){
       return Graph::destroy($id);
   }

   public function update(array $parameters,int $graph_id){
    if($this->find($graph_id)){
        if($this->find($graph_id)->update($parameters)){
           return $this->find($graph_id);
        }
    }

    return null;


   }



}
