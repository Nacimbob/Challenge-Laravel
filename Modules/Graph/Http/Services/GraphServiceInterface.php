<?php
namespace Modules\Graph\Http\Services;
use Modules\Graph\Http\Requests\GraphRequest;

use  Illuminate\Http\Request;


Interface GraphServiceInterface
{

   public function store(Request $request);


   public function graphs();


   public function graph(int $graph_id);


   public function update(GraphRequest $request,int $graph_id);


   public function delete(int $graph_id);

}
