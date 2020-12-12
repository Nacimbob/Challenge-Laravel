<?php
namespace Modules\Graph\Http\Repositories;

use Modules\Graph\Entities\Graph;


Interface NodeRepositoryInterface
{



    /*
       create a formation
       @return the created formation
    */


    public function create(array $parametersint,Graph $graph);

   public function find(int $id);

   public function all();

   public function delete(int $id);





}
