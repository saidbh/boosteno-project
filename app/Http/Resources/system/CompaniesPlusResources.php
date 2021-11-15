<?php

namespace App\Http\Resources\System;

use App\Models\ThirdsContactsCategories;
use Illuminate\Http\Resources\Json\JsonResource;

class CompaniesPlusResources extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'category'=>ThirdsContactsCategories::where('id',$this->thirds_contact_categories_id)->pluck('name')->first(),
            'email'=>$this->email,
            'phone'=>$this->phone,
        ];
    }
}
