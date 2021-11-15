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
                  <h4 class="card-title m-0">Liste des Contacts</h4>
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
                    <th><a class="text-dark" href="#" data-toggle="tooltip" data-placement="top" title="Code fournisseur">CF</a></th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Société</th>
                    <th><a class="text-dark" href="#" data-toggle="tooltip" data-placement="top" title="Prospect/CLient/Fournisseur">Catégorie</a></th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($contacts as $contact)
                  <tr class="text-center">
                    <td>{{ $contact->id }}</td>
                    <td>{{ ($contact->category->id == 2)?$contact->code_client:"--" }}</td>
                    <td>{{ ($contact->category->id == 3)?$contact->code_supplier:"--" }}</td>
                    <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ ($contact->third != null)?$contact->third->name:"--" }}</td>
                    <td><a class="text-dark" href="#" data-toggle="tooltip" data-placement="top" title="{{ $contact->category->name }}"><span class="badge @if(substr($contact->category->name,0,1)=='P') iq-bg-info @endif @if(substr($contact->category->name,0,1)=='C') iq-bg-success @endif @if(substr($contact->category->name,0,1)=='F') iq-bg-warning @endif">{{ substr($contact->category->name,0,1) }}</span></a></td>
                    <td>
                      <div class="flex align-items-center list-user-action">
                        @if($contact->category->id == 1)
                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Tansformer en client" href="{{route('contacts-switch',['id'=>$contact->id])}}"><i class="ri-arrow-right-fill"></i></a>
                        @endif
                        @if($contact->third == null)
                        <a data-placement="top" title="" data-original-title="Affecter" href="{{ $contact->id }}" data-toggle="modal" data-target="#Modalaffect{{ $contact->id }}"><i class="ri-add-box-line"></i></a>
                        <div class="modal fade" id="Modalaffect{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                      <input type="hidden" name="contactid" value="{{ $contact->id }}">
                                      <input list="browsers2" class="form-control" name="browser" id="browser">
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
                        <a data-placement="top" title="" data-original-title="Consulter" href="#"><i class="ri-eye-line"></i></a>
                        <a data-placement="top" title="" data-original-title="Modifier" href="{{route('contacts-edit',[$contact->id])}}"><i class="ri-pencil-line"></i></a>
                        <a data-placement="top" title="" data-original-title="Supprimer" href="#" data-toggle="modal" data-target="#ModalDel{{$contact->id}}"><i class="ri-delete-bin-line"></i></a>
                        <div class="modal fade" id="ModalDel{{$contact->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Supprimer le contact {{ $contact->first_name }} {{ $contact->last_name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="{{  route('contacts-destroy', [$contact->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="modal-body">
                                  Vous êtes sûr de vouloir supprimer le contact {{ $contact->first_name }} {{ $contact->last_name }} ?
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
        "targets": [0, 7]
        , "orderable": false
      }]
      , language: {
        url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
      }
    });
  });

</script>
@endsection
