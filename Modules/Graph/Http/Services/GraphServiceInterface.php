<?php
namespace Modules\Graph\Http\Services;
use Modules\Graph\Http\Requests\UpdateGraphRequest;

use  Illuminate\Http\Request;


Interface GraphServiceInterface
{

   public function store(Request $request);


   public function graphs();


   public function graph(int $graph_id);


   public function update(UpdateGraphRequest $request,int $graph_id);


   public function delete(int $graph_id);

}
