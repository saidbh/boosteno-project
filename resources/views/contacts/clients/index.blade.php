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
                    <a href="{{route('contacts-new')}}" class="btn btn-primary"><i class="ri-add-line"></i> Nouveau</a>
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
              <table id="contact-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                <thead>
                  <tr class="text-center">
                    <th>ID</th>
                    <th><a class="text-dark" href="#" data-toggle="tooltip" data-placement="top" title="Code client">CC</a></th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Société</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($clients as $client)
                  <tr class="text-center">
                    <td>{{ $client->contact->id }}</td>
                    <td>{{ $client->contact->code_client }}</td>
                    <td>{{ $client->contact->first_name }} {{ $client->contact->last_name }}</td>
                    <td>{{ $client->contact->email }}</td>
                    <td>{{ $client->contact->phone }}</td>
                    <td>{{ ($client->contact->third != null)?$client->contact->third->name:"--" }}</td>
                    <td>
                      <div class="flex align-items-center list-user-action">
                        @if($client->contact->third == null)
                        <a data-placement="top" title="" data-original-title="Affecter" href="{{ $client->contact->id }}" data-toggle="modal" data-target="#Modalaffect{{ $client->contact->id }}"><i class="ri-add-box-line"></i></a>
                        <div class="modal fade" id="Modalaffect{{ $client->contact->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Affecter</h5>
                                <a type="button" style="width:auto;height:auto" class="btn btn-primary" href="{{ route('thirds-new') }}">Ajouter une société</a>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="{{route('contacts-affect')}}">
                                  @csrf
                                  @method('post')
                                  <div class="container">
                                    <div class="row">
                                      <label for="browser">Recherche société :</label>
                                      <input list="browsers2" class="form-control" name="browser" id="browser">
                                      <input type="hidden" name="contactid" value="{{ $client->contact->id }}">
                                      <datalist name="items" id="browsers2">
                                        @foreach($thirds as $third)
                                        <option value="{{ $third->name }} {{ $third->alter_name }}">
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
                        @endif
                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Consulter" href="#"><i class="ri-eye-line"></i></a>
                        <a data-placement="top" title="" data-original-title="Modifier" href="{{route('contacts-edit',[$client->contact->id])}}"><i class="ri-pencil-line"></i></a>
                        <a data-placement="top" title="" data-original-title="Supprimer" href="#" data-toggle="modal" data-target="#ModalDel{{$client->contact->id}}"><i class="ri-delete-bin-line"></i></a>
                        <div class="modal fade" id="ModalDel{{$client->contact->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Supprimer le contact {{ $client->contact->first_name }} {{ $client->contact->last_name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="{{  route('contacts-destroy', [$client->contact->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="modal-body">
                                  Vous êtes sûr de vouloir supprimer le contact {{ $client->contact->first_name }} {{ $client->contact->last_name }} ?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn mr-2 btn-primary" data-dismiss="modal">Annuler</button>
                                  <button type="submit" class="btn btn-danger">Supprimer</button>
                                </div>
                              </form>
                            </div>
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
    $('#contact-table').DataTable({
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
