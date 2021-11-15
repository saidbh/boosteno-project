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
                  <h4 class="card-title m-0">Liste des devis</h4>
                  <div class="d-flex flex-row">
                    <a href="{{route('sales-estimates.create')}}" class="btn btn-primary">Ajouter devis</a>
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
                    <th>N° devis</th>
                    <th>Emis</th>
                    <th>Client</th>
                    <th>Montant</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($estimates as $estimate)
                    <tr class="text-center">
                      <td>{{$estimate->id}}</td>
                      <td>{{$estimate->code_estimate}}</td>
                      <td>--</td>
                      <td>{{($estimate->clients_id)?$estimate->clients_id:"--"}}</td>
                      <td>--</td>
                      <td><a class="text-dark" href="#" data-toggle="tooltip" data-placement="top" title="{{$estimate->status->name}}"><span class="badge iq-bg-danger">{{$estimate->status->name}}</span></a></td>
                      <td>
                        <div class="flex align-items-center list-user-action">
                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Consulter" href="#"><i class="ri-eye-line"></i></a>
                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Cloner" href="#"><i class="ri-file-copy-line"></i></a>
                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier" href="#"><i class="ri-edit-2-line"></i></a>
                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Confimer" href="#"><i class="ri-thumb-up-line"></i></a>
                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Imprimer" href="#"><i class="ri-printer-line"></i></a>
                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer" href="#"><i class="ri-delete-bin-line"></i></a>
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
        "targets": [0]
        , "orderable": false
      }]
      , language: {
        url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
      }
    });
  });

</script>
@endsection
