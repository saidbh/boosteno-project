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
                    <a href="{{route('thirds-new')}}" class="btn btn-primary">Nouveau tier</a>
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
                    <th>Adresse</th>
                    <th><a class="text-dark" href="#" data-toggle="tooltip" data-placement="top" title="Code postal">CP</a></th>
                    <th><a class="text-dark" href="#" data-toggle="tooltip" data-placement="top" title="Particulier/Entreprise">Type</a></th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($clients as $client)
                  <tr class="text-center">
                    <td>{{ ($client->contact)?$client->contact->id:$client->third->id }}</td>
                    <td>{{ ($client->contact)?$client->contact->code_client:$client->third->code_client }}</td>
                    <td>{{ ($client->contact)?$client->contact->first_name:$client->third->name }}</td>
                    <td>{{ ($client->contact)?$client->contact->last_name:$client->third->alter_name }}</td>
                    <td>{{ ($client->contact)?$client->contact->address_line:$client->third->address_line }}</td>
                    <td>{{ ($client->contact)?$client->contact->zip_code:$client->third->zip_code }}</td>
                    <td><a class="text-dark" href="#" data-toggle="tooltip" data-placement="top" title="{{ ($client->contact)?'Particulier':'Entreprise' }}"><span class="badge iq-bg-primary">{{ ($client->contact)?'Particulier':'Entreprise' }}</span></a></td>
                    <td>
                      <div class="flex align-items-center list-user-action">
                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Ajouter devis" href="#"><i class="ri-bill-line"></i></a>
                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Consulter" href="#"><i class="ri-eye-line"></i></a>
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
