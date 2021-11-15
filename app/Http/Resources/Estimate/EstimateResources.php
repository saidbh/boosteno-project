<?php

namespace App\Http\Resources\Estimate;

use App\Models\Products;
use App\Models\Taxes;
use Illuminate\Http\Resources\Json\JsonResource;

class EstimateResources extends JsonResource
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
            "id"=>$this->id,
            "orders_id"=>$this->orders_id,
            "products_id"=>$this->products_id,
            "invoices_id"=>$this->invoices_id,
            "estimates_id"=>$this->estimates_id,
            "code_product"=>($this->products_id!=null)?Products::where("id",$this->products_id)->pluck("code_product")->first():$this->code_product,
            "name"=>($this->products_id!=null)?Products::where("id",$this->products_id)->pluck("name")->first():$this->name,
            "description"=>($this->products_id!=null)?Products::where("id",$this->products_id)->pluck("description")->first():$this->description,
            "quantity"=>$this->quantity,
            "units_id"=>$this->units_id,
            "price"=>$this->price." TND",
            "discountType"=>$this->discount_type,
            "discount"=>($this->discount_type == "false" || $this->discount_type == null) ? "--" : (($this->discount_type == "P") ? ($this->discount*100)." %" : $this->discount." TND"),

            "taxe"=>($this->taxes_id !=null)?$this->getTax($this->taxes_id):null,

            "taxe_name"=>($this->taxes_id !=null)?$this->getTax($this->taxes_id)['name']:null,

            "taxe_value"=>$this->calculateTax(
                $this->getTotal($this->quantity,$this->price,$this->discount_type,$this->discount),
                ($this->taxes_id !=null)?$this->getTax($this->taxes_id)['value']:null
            )." TND",
            "totalHt"=> $this->getTotal($this->quantity,$this->price,$this->discount_type,$this->discount)." TND",

            "totalTTC" => ($this->taxes_id !=null)?$this->getTotalTTC(
                $this->getTotal($this->quantity,$this->price,$this->discount_type,$this->discount),
                $this->calculateTax($this->getTotal($this->quantity,$this->price,$this->discount_type,$this->discount),($this->taxes_id !=null)?$this->getTax($this->taxes_id)['value']:null)
            )." TND":$this->getTotal($this->quantity,$this->price,$this->discount_type,$this->discount)." TND",
        ];
    }

    private function getTotal($quantity,$price,$discountType,$discount)
    {
        $total = 0;
        if($discountType == "false" || $discountType == null){
            $total = $quantity*$price;
        } else {
            if($discountType == "P"){
                $total = ($quantity*$price) - (($quantity*$price)*$discount);
            } else {
                $total =  (($quantity*$price) - $discount);
            }
        }
        return $total;
    }

    private function getTax($id)
    {
        $taxe = Taxes::where("id",$id)->first();
        return [
            "id"=>$taxe->id,
            "name"=>$taxe->name,
            "description"=>$taxe->description,
            "value"=>$taxe->value,
        ];
    }

    private function calculateTax($totalHt,$tax)
    {
        $totalTax = null;
        if($tax != null){
            $totalTax = $totalHt*$tax;
        }
        return $totalTax; 
    }

    private function getTotalTTC($totalHt,$tax)
    {
        return $totalHt+$tax;
    }
}
