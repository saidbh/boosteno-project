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
        <div class="iq-card">
          <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title w-100">
              <div class="row">
                <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                  <h4 class="card-title m-0">Liste des clients</h4>
                  <div class="d-flex flex-row">
                    <a href="{{route('thirds-new')}}" class="btn btn-primary"><i class="ri-add-line"></i> Nouveau</a>
                    <a href="#" class="btn mx-1 btn-primary">PDF</a>
                    <a href="#" class="btn btn-primary">Excel</a>
                    <a href="#" class="btn ml-1 btn-primary">Imprimer</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="iq-card-body">
            <div class="table-responsive">
              <table id="clients-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                <thead>
                  <tr class="text-center">
                    <th>ID</th>
                    <th><a class="text-dark" href="#" data-toggle="tooltip" data-placement="top" title="Code client">CC</a></th>
                    <th>Nom</th>
                    <th><a class="text-dark" href="#" data-toggle="tooltip" data-placement="top" title="Label/Prénom">Alias</a></th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($clients as $client)
                  <tr class="text-center">
                    <td>{{ $client->third->id }}</td>
                    <td>{{ $client->third->code_client }}</td>
                    <td>{{ $client->third->name }}</td>
                    <td>{{ ($client->third->alter_name==null)?'--':$client->third->alter_name }}</td>
                    <td>{{ $client->third->email }}</td>
                    <td>{{ $client->third->phone }}</td>
                    <td>
                      <div class="flex align-items-center list-user-action">
                        @if($client->third->category->id == 1)
                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Tansformer en client" href="{{route('thirds-switch',['id'=>$client->third->id])}}"><i class="ri-arrow-right-fill"></i></a>
                        @endif
                        <a data-placement="top" title="Affecter vis a vis" data-original-title="Affecter" href="{{ $client->third->id }}" data-toggle="modal" data-target="#Modalaffect{{ $client->third->id }}"><i class="ri-add-box-line"></i></a>
                        <div class="modal fade" id="Modalaffect{{ $client->third->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Affecter un contact</h5>
                                <a type="button" style="width:auto;height:auto" class="btn btn-primary" href="{{ route('contacts-new') }}">Ajouter un contact</a>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="{{route('thirds-affect')}}">
                                  @csrf
                                  @method('post')
                                  <div class="container">
                                    <div class="row">
                                      <label for="browser">Recherche contact :</label>
                                      <input type="hidden" name="thirdid" value="{{ $client->third->id }}">
                                      <input autocomplete="off" list="browsers2" class="form-control" name="browser" id="browser">
                                      <datalist name="items" id="browsers2">
                                        @foreach($contacts as $contact)
                                        <option value="{{ $contact->first_name }} {{ $contact->last_name }}">
                                          @endforeach
                                      </datalist>
                                    </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Affecter</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Consulter" href="#"><i class="ri-eye-line"></i></a>
                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier" href="{{route('thirds-edit',[$client->third->id])}}"><i class="ri-pencil-line"></i></a>
                        <a data-toggle="modal" data-target="#assign{{$client->third->id}}" data-placement="top" title="" data-original-title="Supprimer la société {{$client->third->name}}" href="#"><i class="ri-delete-bin-line"></i></a>
                        <div class="modal fade" id="assign{{$client->third->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <form method="POST" action="{{route('thirds-destroy', [$client->third->id])}}">
                              @csrf
                              @method('delete')
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="staticBackdropLabel">Supprimer la société {{$client->third->name}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Vous êtes sûr de vouloir supprimer la société {{$client->third->name}}
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                                  <button type="submit" class="btn btn-danger">Confirmer</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style rel="stylesheet">
  .custom-select {
    width: auto;
    display: inline-block;
    padding: 0 5px;
    height: 20px;
    line-height: 20px;
  }

</style>
<script>
  $(document).ready(function() {
    $('#clients-table').DataTable({
      "columnDefs": [{
        "targets": [0, 6]
        , "orderable": false
      }]
      , language: {
        url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
      }
    });
  });

</script>
@endsection
