@extends('layouts.master')
@section('content')
<div id="content-page" class="content-page">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
      </div>
      <div class="col-sm-12">
        <form id="estimateForm" {{-- onsubmit="return false" --}} action="{{route('sales-estimates.store')}}" method="POST">
          @csrf
          <div class="row">
            <div class="col-lg-9">
              <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title w-100">
                    <div class="row">
                      <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="card-title m-0">Nouveau devis <span class="badge badge-danger">{{$estimate->status->name}}</span></h4>
                        <a href="{{route('sales-estimates')}}" class="btn btn-primary"><i class="ri-arrow-left-fill"></i> Retour</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="iq-card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <h5 class="mb-3">Information devis</h5>
                      <div class="row">
                        <div class="form-group col-md-3">
                          <label for="estimate">N° de devis</label>
                          <input type="text" class="form-control" name="estimate_code" id="estimate" value="{{$estimate->code_estimate}}">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="estimate">Date du devis</label>
                          <input type="date" class="form-control" name="estimate_date" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="estimate">Date de validité</label>
                          <input type="date" class="form-control" name="estimate_validate" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="estimate">Emis par :</label>
                          <input type="text" readonly disabled value="{{auth()->user()->first_name.' '.auth()->user()->last_name}}" class="form-control" id="estimate">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <h5 class="mb-3">Information client</h5>
                      <div class="row">
                        <div class="form-group col-md-3">
                          <label for="client">Code client</label>
                          <input type="hidden" name="client_id" id="clientId">
                          <input autocomplete="off" class="form-control" name="client" id="client" list="clients">
                          <datalist id="clients">
                            @foreach($clients as $client)
                            <option data-clientid="{{$client->id}}"
                              data-clientname="{{($client->third)?$client->third->name:$client->contact->first_name}}"
                              data-clientaltername="{{($client->third)?$client->third->alter_name:$client->contact->last_name}}"
                              data-clientemail="{{($client->third)?$client->third->email:$client->contact->email}}"
                              data-clientphone="{{($client->third)?$client->third->phone:$client->contact->phone}}"
                              data-clientaddress="{{($client->third)?$client->third->address_line:$client->contact->address_line}}"
                              data-clientcity="{{($client->third)?$client->third->city:$client->contact->city}}"
                              data-clientzipcode="{{($client->third)?$client->third->zip_code:$client->contact->zip_code}}"
                              data-clientcountry="{{($client->third)?$client->third->country:$client->contact->country}}"
                              value="{{($client->third)?$client->third->code_client:$client->contact->code_client}}">
                            </option>
                            @endforeach
                          </datalist>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="subject">Nom client</label>
                          <input type="text" class="form-control" name="clientname" id="clientname">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="address">Adresse Principale/Facturation</label>
                          <input class="form-control" name="clientaddress" id="clientaddress" rows="1">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <ul class="nav nav-tabs" id="myTab-1" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="articles-tab" data-toggle="tab" href="#articles" role="tab" aria-controls="articles" aria-selected="true">Articles</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="taxes-tab" data-toggle="tab" href="#taxes" role="tab" aria-controls="taxes" aria-selected="false">Taxes</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="conditions-tab" data-toggle="tab" href="#conditions" role="tab" aria-controls="conditions" aria-selected="false">Conditions</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent-2">
                        <div class="tab-pane fade show active" id="articles" role="tabpanel" aria-labelledby="articles-tab">
                          <div class="row">
                            <div class="form-group col-md-3">
                              <label class="control-label" for="productCode">Code produit</label>
                              <input autocomplete="off" id="productCode" onkeyup="searchProduct(this)" value="{{'P'.rand(0,9999).'-'.rand(0, 99999)}}" name="product_code" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="text" class="dropdown-toggle form-control" />
                              <div class="dropdown-menu" style="width: 95%;" id="menu" aria-labelledby="productCode">
                                <ul class="m-0 px-2" id="productsList">
                                  @foreach($products as $product)
                                  <li style="color:#0084ff;cursor:pointer;font-size: 14px;" id="productItem" onclick="getProduct({{json_encode($product)}})">[{{$product->code_product}}] {{$product->name}} </li>
                                  @endforeach
                                </ul>
                              </div>
                            </div>
                            <div class="form-group col-md-3">
                              <label class="control-label" for="productName">Nom produit</label>
                              <input type="text" class="form-control" name="product_name" id="productName" />
                            </div>
                            <div class="form-group col-md-6">
                              <label for="description">Description</label>
                              <input type="text" class="form-control" name="product_description"
                                id="productDescription" />
                            </div>
                            <div class="form-group col-md-2">
                              <label class="control-label" for="productQuantity">Quantité</label>
                              <input type="number" class="form-control" name="product_quantity" id="productQuantity" />
                            </div>
                            <div class="form-group col-md-2">
                              <label class="control-label" for="productPrice">Prix unitaire</label>
                              <input type="number" class="form-control" name="product_price" id="productPrice" />
                            </div>
                            <div class="form-group col-md-4">
                              <label class="control-label" for="discountType">Remise</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <select id="discountType" name="discount_type" class="form-control">
                                    <option selected value="false">Auncune remise</option>
                                    <option value="P">En pourcentage</option>
                                    <option value="V">Fixe</option>
                                  </select>
                                </div>
                                <input type="number" class="form-control" name="discount_value" id="discountValue">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="discountUnit"></span>
                                </div>
                              </div>
                            </div>
                            <div class="form-group col-md-4">
                              <label class="control-label" for="taxName">Taxe</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <select id="taxName" name="tax_name" class="form-control">
                                    <option selected value="false">Auncun taxe</option>
                                    @foreach($taxes as $taxe)
                                    <option id="{{$taxe->id}}" name="{{$taxe->name}}" value="{{$taxe->value}}"> {{$taxe->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <input type="number" class="form-control" name="tax_value" id="taxValue">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="taxUnit"></span>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12 form-group d-flex flex-row align-items-end justify-content-end">
                              <span style="height: 45px;" id="addArticle" class="btn w-100 d-flex justify-content-center align-items-center text-white bg-primary">Ajouter</span>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="table-responsive table-sm">
                                <table id="articles-table" class="table table-bordered" role="grid" aria-describedby="user-list-page-info">
                                  <thead class="table-secondary">
                                    <tr class="text-center">
                                      <th>ID</th>
                                      <th>Code produit</th>
                                      <th>Description</th>
                                      <th>Quantité</th>
                                      <th>P.U</th>
                                      <th>Remise</th>
                                      <th>Montant H.T</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody class="text-center">
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="taxes" role="tabpanel" aria-labelledby="taxes-tab">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="table-responsive table-sm">
                                <table id="taxes-table" class="table table-bordered" role="grid" aria-describedby="user-list-page-info" style="width: 100%">
                                  <thead class="table-secondary">
                                    <tr class="text-center">
                                      <th>ID</th>
                                      <th>Base H.T</th>
                                      <th>Taxe</th>
                                      <th>Montant T.T.C</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody class="text-center">
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="conditions" role="tabpanel" aria-labelledby="conditions-tab">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                @foreach($conditions as $condition)
                                <div class="custom-control custom-checkbox custom-control-inline">
                                  <input type="checkbox" class="custom-control-input" name="conditions[]" value="{{$condition->id}}" id="{{$condition->name}}">
                                  <label class="custom-control-label" for="{{$condition->name}}">{{$condition->name}}</label>
                                </div>
                                @endforeach
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="iq-card">
                <div class="iq-card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <h5 class="mb-3">Montants devis</h5>
                      <hr>
                      <div class="d-flex flex-row justify-content-start align-item-center">
                        <div style="width:100px" class="m-0 mr-5">Total HT :</div>
                        <div id="totalHt" class="m-0">0 TND</div>
                      </div>
                      <div class="d-flex flex-row justify-content-start align-item-center">
                        <div style="width:100px" class="m-0 mr-5">Total taxes :</div>
                        <div id="totalTax" class="m-0">0 TND</div>
                      </div>
                      <hr>
                      <div class="d-flex flex-row justify-content-start align-item-center">
                        <div style="width:100px" class="m-0 mr-5"><b>Total TTC :</b></div>
                        <div id="totalTtc" class="m-0"><b>0 TND</b></div>
                      </div>
                    </div>
                    <div class="mt-3 col-lg-12">
                      <button type="submit" id="confirmEstimate" class="btn w-100 iq-bg-success">Confirmer</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>

  document.getElementById('productName').addEventListener('keyup',function(){
    document.getElementById("productCode").value=""
  });

  function getProduct(product) {
    console.log(product)
    document.getElementById('productCode').value = product.code_product;
    document.getElementById('productName').value = product.name;
    document.getElementById('productPrice').value = product.price;
    document.getElementById('productDescription').value = product.description;
  }

  function searchProduct(e) {
    filterProductsList(e.value)
  }

  function filterProductsList(productName) {
    productsList = document.getElementById('productsList');
    productItem = productsList.getElementsByTagName('li');
    for (let index = 0; index < productItem.length; index++) {
      a = productItem[index];
      txtValue = a.textContent || a.innerText;
      if (txtValue.toLowerCase().indexOf(productName) > -1) {
        productItem[index].style.display = "";
      } else {
        productItem[index].style.display = "none";
      }
    }
  }

  var client = document.getElementById('client');
  client.addEventListener('change', function(e) {
    var datalistClients = document.querySelector('option[value="' + client.value + '"]').dataset;
    document.getElementById('clientId').value = datalistClients.clientid;
    document.getElementById('clientname').value = datalistClients.clientname + " " + datalistClients.clientaltername;
    document.getElementById('clientaddress').value = datalistClients.clientaddress + ' ' + datalistClients.clientcity + ', ' + datalistClients.clientcountry + '. ' + datalistClients.clientzipcode;
  });

  var discountType = document.getElementById('discountType');
  var discountUnit = document.getElementById('discountUnit');
  var discountValue = document.getElementById('discountValue');
  discountValue.disabled = true;
  discountType.addEventListener('change', function(e) {
    if (e.target.value == 'V') {
      discountUnit.innerHTML = 'TND';
      discountValue.disabled = false;
    } else if (e.target.value == 'P') {
      discountUnit.innerHTML = '%';
      discountValue.disabled = false;
    } else {
      discountUnit.innerHTML = "";
      discountValue.value = null;
      discountValue.disabled = true;
    }
  });

  var taxName = document.getElementById('taxName');
  var taxUnit = document.getElementById('taxUnit');
  var taxValue = document.getElementById('taxValue');
  taxValue.disabled = true;
  taxName.addEventListener('change', function(e) {
    
    if (e.target.value == "false") {
      taxUnit.innerHTML = "";
      taxValue.value = null;
      taxValue.disabled = true;
    } else {
      taxUnit.innerHTML = "%";
      taxValue.disabled = false;
      taxValue.value = e.target.value * 100;
    }
  });


  //---------------------------------------------------------------------
  
  $(document).ready(function() {

    var articlesTable = $('#articles-table').DataTable({
      "paging": true,
      "ordering": false,
      "processing": true,
      "serverSide": true,
      "ajax": {
        "headers": {'X-CSRF-TOKEN': '{{csrf_token()}}'},
        "url":"{{route('sales-estimates-orders.list',['code'=>$estimate->code_estimate])}}",
      },
      columns: [
        {data: 'id', name: 'ID'},
        {data: 'code_product', name: 'Code produit'},
        {data: 'description', name: 'Description'},
        {data: 'quantity', name: 'Quantité'},
        {data: 'price', name: 'P.U'},
        {data: 'discount', name: 'Remise'},
        {data: 'totalHt', name: 'Montant H.T'},
        {data: 'action', name: 'Action'},
      ],
      "language": {
        "url": 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
      }
    });

    var taxesTable = $("#taxes-table").DataTable({
      "paging": true,
      "ordering": false,
      "processing": true,
      "serverSide": true,
      "ajax": {
        "headers": {'X-CSRF-TOKEN': '{{csrf_token()}}'},
        "url":"{{route('sales-estimates-taxes.list',['code'=>$estimate->code_estimate])}}",
      },
      columns: [
        {data: 'id', name: 'ID'},
        {data: 'totalHt', name: 'Base H.T'},
        {data: 'taxe_value', name: 'Taxe'},
        {data: 'totalTTC', name: 'Montant T.T.C'},
        {data: 'action', name: 'Action'},
      ],
      "language": {
        "url": 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
      }
    });

    $("#addArticle").on('click', () => {
      var productCode = document.getElementById('productCode').value;
      var productName = document.getElementById('productName').value;
      var productDescription = document.getElementById('productDescription').value;
      var productQuantity = document.getElementById('productQuantity').value;
      var productPrice = document.getElementById('productPrice').value;
      var discountType = document.getElementById('discountType').value;
      var discountValue = document.getElementById('discountValue').value;
      var taxValue = document.getElementById('taxName');
      
      /* switch (productCode) {
        case null:
          return null
        case '':
          return null
      } */
      switch (productDescription) {
        case null:
          return null
        case '':
          return null
      }
      switch (productQuantity) {
        case null:
          return null
        case '':
          return null
      }
      switch (productPrice) {
        case null:
          return null
        case '':
          return null
      }
      if (discountType != 'false') {
        switch (discountValue) {
          case null:
            return null
          case '':
            return null
        }
      }

      axios({
        headers: {'X-CSRF-TOKEN': "{{csrf_token()}}",'Content-Type':"application/json"},
        method: 'post',
        url: "{{route('sales-estimates-orders.add')}}",
        responseType: 'json',
        data: {
          estimateID: "{{$estimate->id}}",
          estimateCode:"{{$estimate->code_estimate}}",
          productCode: productCode,
          productName: productName,
          productDescription: productDescription,
          productQuantity: productQuantity,
          productPrice: productPrice,
          discountType: discountType,
          discountValue: discountValue,
          tax: taxValue.options[taxValue.selectedIndex].getAttribute('id')
        }
      }).then(res=>{
        articlesTable.ajax.reload();
        taxesTable.ajax.reload();
      }).catch(err=>{
        console.log(err)
      });
    });

    $('body').on('click', '#deleteOrder', function(){
        var order = $(this).data('order');
        var estimate = $(this).data('estimate');
        let route = '{{route("sales-estimates-orders.delete")}}?order='+order+'&estimate='+estimate;
        $.ajax({
          "headers": {'X-CSRF-TOKEN': '{{csrf_token()}}'},
          "url": route,
          "method": 'DELETE',
          success: function(result) {
            console.log(result)
            articlesTable.ajax.reload();
            taxesTable.ajax.reload();
          }
      });
    });

    $('body').on('click', '#deleteTaxe', function(){
        var order = $(this).data('order');
        var estimate = $(this).data('estimate');
        let route = '{{route("sales-estimates-taxes.delete")}}?order='+order+'&estimate='+estimate;
        $.ajax({
          "headers": {'X-CSRF-TOKEN': '{{csrf_token()}}'},
          "url": route,
          "method": 'DELETE',
          success: function(result) {
            console.log(result)
            articlesTable.ajax.reload();
            taxesTable.ajax.reload();
          }
      });
    });

    

    

    

    

  
  });

  $("#estimateForm").submit(function(){
    if(!($(this).find("#confirmEstimate").is(":focus"))){
      return false;
    }
  });

</script>
@endsection