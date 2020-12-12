<?php
namespace Modules\Graph\Http\Repositories;



Interface RelationRepositoryInterface
{



    /*
       create a formation
       @return the created formation
    */


   public function create(array $parameters);

   public function find(int $id);

   public function all();

   public function delete(int $id);





}
