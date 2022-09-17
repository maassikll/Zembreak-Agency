<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'payment' => $this->payment,
            'amount' => $this->amount,
            'employe_id' => $this->employe_id,
            'project_id' => $this->project_id, 
        ];
    }
}
