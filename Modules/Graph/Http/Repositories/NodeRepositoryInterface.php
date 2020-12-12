<?php
namespace Modules\Graph\Http\Repositories;


Use  Modules\Graph\Entities\Node;

Interface NodeRepositoryInterface
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
