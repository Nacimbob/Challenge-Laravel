<?php
namespace Modules\Graph\Http\Repositories;

Use  Modules\Graph\Http\Repositories\RelationRepositoryInterface;
Use  Modules\Graph\Entities\Relation;

class RelationRepository  implements RelationRepositoryInterface
{



    /*
       create a formation
       @return the created formation
    */


   public function create(array $parameters){

        return Relation::create($parameters);
   }

   public function find(int $id)
   {
       return Relation::find($id);
   }

   public function all(){
       return Relation::paginate(20);
   }

   public function delete(int $id){
       return Relation::destroy($id);
   }





}
