<?php

namespace Modules\Graph\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class GraphDetailedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
                'id'=>$this->id,
                'name'=>$this->name,
                'relations'=>$this->relations,
                'nodes'=>$this->nodes,
                'description'=>$this->description,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
               ];

    }
}
