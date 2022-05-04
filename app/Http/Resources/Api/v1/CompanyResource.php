<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public static $wrap = 'Company';

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        if (is_null($this->resource)) {
            return [];
        }

        return [
            'id' => $this->id,
            'edrpou' => $this->edrpou,
            'full_name' => $this->full_name,
            'short_name' => $this->short_name,
        ];
    }
}
