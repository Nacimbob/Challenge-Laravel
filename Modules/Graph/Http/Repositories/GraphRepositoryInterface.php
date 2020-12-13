<?php
namespace Modules\Graph\Http\Repositories;



Interface GraphRepositoryInterface
{



    /*
       create a formation
       @return the created formation
    */


   public function create(array $parameters);

   public function find(int $id);

   public function all();

   public function delete(int $id);

   public function update(array $parameters,int $graph_id);

   public function clearEmpy();

}
