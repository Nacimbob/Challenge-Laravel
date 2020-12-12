<?php
namespace Modules\Graph\Http\Repositories;

Use  Modules\Graph\Http\Repositories\NodeRepositoryInterface;
Use  Modules\Graph\Entities\Node;

class NodeRepository  implements NodeRepositoryInterface
{



    /*
       create a formation
       @return the created formation
    */


   public function create(array $parameters){

        return Node::create($parameters);
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
