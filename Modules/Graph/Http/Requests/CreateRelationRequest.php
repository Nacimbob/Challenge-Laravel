<?php

namespace Modules\Graph\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRelationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'from_node'=>'required|exists:nodes,id',
            'to_node'=>'required|exists:nodes,id',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
