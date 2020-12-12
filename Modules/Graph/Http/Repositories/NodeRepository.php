<?php
namespace Modules\Graph\Http\Repositories;

Use  Modules\Graph\Http\Repositories\NodeRepositoryInterface;
Use  Modules\Graph\Entities\Node;
Use  Modules\Graph\Entities\Graph;
class NodeRepository  implements NodeRepositoryInterface
{



    /*
       create a formation
       @return the created formation
    */


   public function create(array $parameters,Graph $graph){

        return $graph->nodes()->create($parameters);
   }

   public function find(int $id)
   {
       return Node::find($id);
   }

   public function all(){
       return Node::paginate(20);
   }

   public function delete(int $id){
       return Node::destroy($id);
   }





}
