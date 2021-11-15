<?php

namespace App\Http\Resources\system;

use App\Models\SubCategories;
use Illuminate\Http\Resources\Json\JsonResource;

class RolePermissionRessources extends JsonResource
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
            "id" => $this->id,
            "title" => $this->title,
            "link" => $this->link,
            "subcat" => $this->subcats($this->id)
        ];
    }

    public function subcats($cid)
    {
        return SubCategories::select("id","title","link")->where("categories_id",$cid)->get();
    }
}
