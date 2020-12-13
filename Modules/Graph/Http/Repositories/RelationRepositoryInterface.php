<?php
namespace Modules\Graph\Http\Repositories;

Use  Modules\Graph\Entities\Graph;


Interface RelationRepositoryInterface
{



    /*
       create a formation
       @return the created formation
    */


   public function create(array $parameters,Graph $graph);

   public function find(int $id);

   public function all();

   public function delete(int $id);

   public function exists($graph_id,$from_node,$to_node);


}
