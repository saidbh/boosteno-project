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
                  <h4 class="card-title m-0">Liste des sociétés</h4>
                  <a href="{{route('system-companies-plus.create')}}" class="btn btn-primary">Ajouter société</a>
                </div>
              </div>
            </div>
          </div>
          <div class="iq-card-body">
            <div class="table-responsive">
              <table id="companies-plus-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                <thead>
                  <tr class="text-center">
                    <th>ID</th>
                    <th>Nom</th>
                    <th><a class="text-dark" href="#" data-toggle="tooltip" data-placement="top" title="Label/Prénom">Alias</a></th>
                    <th>Adresse</th>
                    <th><a class="text-dark" href="#" data-toggle="tooltip" data-placement="top" title="Code postal">CP</a></th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($companies as $company)
                  <tr class="text-center">
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ ($company->alter_name==null)?'--':$company->alter_name }}</td>
                    <td>{{ $company->address_line }}</td>
                    <td>{{ $company->zip_code }}</td>
                    <td>
                      <div class="flex align-items-center list-user-action">
                        <a href="{{route('system-companies-plus.edit',[$company->id])}}" data-toggle="tooltip" data-placement="top" title="Modifier la société {{$company->name}}"><i class="ri-pencil-line"></i></a>
                        <a data-toggle="modal" data-target="#assign{{$company->id}}" data-placement="top" title="" data-original-title="Supprimer la société {{$company->name}}" href="#"><i class="ri-delete-bin-line"></i></a>
                        <div class="modal fade" id="assign{{$company->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <form method="POST" action="{{route('system-companies-plus.destroy',[$company->id])}}">
                              @csrf
                              @method('delete')
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="staticBackdropLabel">Supprimer l'utilisateur {{$company->name}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Vous êtes sûr de vouloir supprimer la société {{$company->name}}
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
    $('#companies-plus-table').DataTable({
      "columnDefs": [{
        "targets": [0, 5]
        , "orderable": false
      }]
      , language: {
        url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
      }
    });
  });

</script>
@endsection
