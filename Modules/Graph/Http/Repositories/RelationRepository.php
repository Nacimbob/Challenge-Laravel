<?php
namespace Modules\Graph\Http\Repositories;

Use  Modules\Graph\Http\Repositories\RelationRepositoryInterface;
Use  Modules\Graph\Entities\Relation;
Use  Modules\Graph\Entities\Graph;
use Illuminate\Support\Facades\DB;
class RelationRepository  implements RelationRepositoryInterface
{



    /*
       create a formation
       @return the created formation
    */


    public function create(array $parameters,Graph $graph){

        return $graph->relations()->create($parameters);
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

   public function exists($graph_id,$from_node,$to_node){
    return DB::table('relations')->where('graph_id', $graph_id)
                          ->where('from_node', $from_node)
                          ->where('to_node',$to_node)->exists();


   }




}
