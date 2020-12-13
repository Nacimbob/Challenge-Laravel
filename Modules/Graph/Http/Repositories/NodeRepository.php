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

   public function findGraph(int $id)
   {
       return Node::find($id)->graph;
   }


   public function all(){
       return Node::paginate(20);
   }

   public function delete(int $id){

    $node=Node::find($id);
      if($node){
        return  $node->delete();
      }
      return  null;
   }


   public function belongSameGraph($from_node,$to_node){
       $graph1=$this->findGraph($from_node);
       $graph2=$this->findGraph($to_node);

       if($graph1 && $graph2 ){
            return $graph1->id==$graph2->id;
       }
       return false;

   }


}
