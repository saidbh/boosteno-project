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
                  <h4 class="card-title m-0">Liste des enseignants</h4>
                  <div class="d-flex flex-row">
                    <a href="#" class="btn mx-1 btn-primary">PDF</a>
                    <a href="#" class="btn btn-primary">Excel</a>
                    <a href="#" class="btn ml-1 btn-primary">Imprimer</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="iq-card-body">
              <!--Teacher form-->
              <div class="table-responsive">
                <table id="teacher-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                  <thead>
                    <tr class="text-center">
                      <th>Nom</th>
                      <th>prénom</th>
                      <th>Niveau</th>
                      <th>Email</th>
                      <th>Agence</th>
                      <th>Téléphone</th>
                      <th>Adresse</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr class="text-center">
                        <td>Mohammed</td>
                        <td>amine</td>
                        <td>B2</td>
                        <td>amine@gmail.com</td>
                        <td>Lac1</td>
                        <td>12345678</td>
                        <td>Tunis 1000 cité ezahra</td>
                        <td>
                          <div class="flex align-items-center list-user-action">
                            <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Consulter" href="{{ route('teacher_profile') }}"><i class="ri-eye-line"></i></a>
                          </div>
                        </td>
                      </tr>
                  </tbody>
                </table>
              </div>
              <!--Teacher form-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--scripts-->
<script>
$(document).ready(function() {
        $('#teacher-table').DataTable({
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
<!--scripts-->
@endsection
