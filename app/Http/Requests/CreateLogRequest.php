<?php

namespace Fuellog\Http\Requests;

use Fuellog\Http\Requests\Request;

class CreateLogRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'log_date'      => ['required', 'date'],
            'fueled_units'  => ['required', 'numeric', 'min:1', 'max:999'],
            'driven_units'  => ['required', 'numeric', 'min:1', 'max:9999'],
            'cost_per_unit' => ['required', 'numeric', 'max:9999999'],
            'cost_total'    => ['required', 'numeric', 'max:9999999'],
            'longtitude'    => ['numeric'],
            'latitude'      => ['numeric']
        ];
    }
}
