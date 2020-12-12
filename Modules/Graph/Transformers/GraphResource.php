<?php

namespace Modules\Graph\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class GraphResource extends JsonResource
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
                'description'=>$this->description,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
               ];

    }
}
