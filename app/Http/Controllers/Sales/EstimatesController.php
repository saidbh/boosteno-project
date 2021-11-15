<?php

namespace App\Http\Controllers\Sales;

use App\Models\Taxes;
use App\Models\Clients;
use App\Models\Products;
use App\Models\Estimates;
use App\Models\Conditions;
use App\Models\OrdersItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\Estimate\EstimateResources;
use App\Models\Contacts;

class EstimatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $estimates = Estimates::get();
        return view('sales.estimates.index', compact('estimates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $code_estimate = '#D'.rand(0,9999).'-'.rand(0, 99999);
        
        do {
            $code_estimate = '#D'.rand(0,9999).'-'.rand(0, 99999);
        } while (Estimates::where('code_estimate',$code_estimate)->first());

        /* $ordersItems = OrdersItems::where("estimates_id",Estimates::where("id",11)->pluck("id")->first())->get();
        return $ordersItems = EstimateResources::collection($ordersItems); */

        $estimate = new Estimates();
        $estimate->code_estimate = $code_estimate;
        $estimate->status_type_id = 1;
        $estimate->save();
        $estimate = Estimates::where("id",$estimate->id)->first();
        $clients = Clients::get();
        $products = Products::get();
        $taxes = Taxes::get();
        $conditions = Conditions::get();


        return view('sales.estimates.create', compact('estimate','clients','products','taxes','conditions'));
    }

    public function getOrders(Request $request)
    {
        if ($request->ajax()) {
            $ordersItems = OrdersItems::where("estimates_id",Estimates::where("code_estimate",$request->code)->pluck("id")->first())->get();
            $ordersItems = EstimateResources::collection($ordersItems);
            return DataTables::of($ordersItems)
                ->addColumn('action', function($ordersItems){
                    $btn = '<div class="flex align-items-center list-user-action">';
                    $btn = $btn.'<a href="#delete" id="deleteOrder" data-order="'.$ordersItems["id"].'" data-estimate="'.$ordersItems["estimates_id"].'" data-toggle="tooltip" data-placement="top" title="Supprimer" data-original-title="Supprimer"><i class="ri-delete-bin-line"></i></a>';
                    $btn = $btn.'</div>';
                    return $btn;
            })->toJson();
        }
    }

    public function deleteOrders(Request $request)
    {
        if ($request->ajax()) {
            try {
                OrdersItems::where(['estimates_id'=>$request->estimate,'id'=>$request->order])->delete();
                return response()->json(['error'=>false,"message"=>"supprimer"]);
            } catch (QueryException $qe) {
                return response()->json(['error'=>false,"message"=>$qe->getMessage()]);
            }
        }
    }

    public function addOrders(Request $request)
    {
        $estimate = Estimates::where("code_estimate",$request->estimateCode)->first();
        $products = Products::where('code_product', $request->productCode)->first();

        $disVal = null;
        if($request->discountType == "P"){
            $disVal = $request->discountValue/100;
        } else if($request->discountType == "V"){
            $disVal = $request->discountValue;
        } else {
            $disVal = null;
        }

        try {
            $orderItem = new OrdersItems();
            $orderItem->products_id = ($products)?$products->id:null;
            $orderItem->estimates_id = $estimate->id;
            $orderItem->code_product = ($products)?null:'OP'.rand(0,9999).'_'.rand(0,99999);
            $orderItem->name = ($products)?null:$request->productName;
            $orderItem->description = ($products)?null:$request->productDescription;
            $orderItem->quantity = $request->productQuantity;
            $orderItem->units_id = 2;
            $orderItem->price = $request->productPrice;
            $orderItem->discount_type = $request->discountType;
            $orderItem->discount = $disVal;
            $orderItem->taxes_id = ($request->has('tax'))?$request->tax:null;
            $orderItem->save();
        } catch(QueryException $qe){
            return response()->json(['error'=>true,"message"=>$qe]);
        }

        $orderItem = EstimateResources::make($orderItem);

        return response()->json(['error'=>false,"message"=>"done","order"=>$orderItem]);
    
    }

    public function getTaxes(Request $request)
    {
        if ($request->ajax()) {
            $ordersItems = OrdersItems::where("estimates_id",Estimates::where("code_estimate",$request->code)->pluck("id")->first())->where("taxes_id","!=",null)->get();
            $ordersItems = EstimateResources::collection($ordersItems);
            return DataTables::of($ordersItems)
            ->addColumn('action', function($ordersItems){
                $btn = '<div class="flex align-items-center list-user-action">';
                $btn = $btn.'<a href="#delete" id="deleteTaxe" data-order="'.$ordersItems["id"].'" data-estimate="'.$ordersItems["estimates_id"].'" data-toggle="tooltip" data-placement="top" title="Supprimer" data-original-title="Supprimer"><i class="ri-delete-bin-line"></i></a>';
                $btn = $btn.'</div>';
                return $btn;
            })->toJson();
        }
    }

    public function deleteTaxes(Request $request)
    {
        if ($request->ajax()) {
            try {
                OrdersItems::where(['estimates_id'=>$request->estimate,'id'=>$request->order])->update([
                    'taxes_id' => null
                ]);
                return response()->json(['error'=>false,"message"=>"supprimer"]);
            } catch (QueryException $qe) {
                return response()->json(['error'=>false,"message"=>$qe->getMessage()]);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
        $client = Clients::find($request->client_id);
        if($client->contact){
            return $client->contact;
        } else {
            return $client->third;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
