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
                  <h4 class="card-title m-0">Résevation</h4>
                  <div class="d-flex flex-row">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#Modaladd"><i class="ri-add-line"></i> Réserver</a>
                    <a href="#" class="btn mx-1 btn-primary">PDF</a>
                    <a href="#" class="btn btn-primary">Excel</a>
                    <a href="#" class="btn ml-1 btn-primary">Imprimer</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="iq-card-body">
              <!--Content start here-->
              <div class="table-responsive">
                <table id="reservation-table" class="table table-striped table-bordered mt-4" role="grid"
                    aria-describedby="user-list-page-info">
                    <thead>
                        <tr class="text-center">
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Session</th>
                            <th>Cour</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>Mohammed</td>
                        <td>Amine</td>
                        <td>Decembre</td>
                        <td>A1.2 Extensiv</td>
                        <td>
                            <div class="flex align-items-center list-user-action">
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Profil" href="{{ route('Client_profile') }}" ><i class="ri-user-line"></i></a>
                                <span data-toggle="modal" data-target="#ModalEdit">
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier" href="#" ><i class="ri-pencil-line"></i></a>
                                </span>
                                <span data-toggle="modal" data-target="#Modaldel">
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer" href="#" ><i class="ri-delete-bin-line"></i></a>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <!--Modal edit start-->
                    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mise a jour</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!--Form start-->
                                <div class="container">
                                    <form method="post" action="#" enctype="multipart/form-data">
                                        <!--form inputs here-->
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="clients">Client</label>
                                                <select id="clients" class="form-control" name="clients" required>
                                                  <option value="">Veillez choisir un client ...</option>
                                                  <option>...</option>
                                                </select>
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label for="Session">Sessions</label>
                                                <select id="Session" class="form-control" name="Session" required>
                                                  <option value="">Veillez choisir une session ...</option>
                                                  <option>...</option>
                                                </select>
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label for="lessons">Cours</label>
                                                <select id="lessons" class="form-control" name="lessons" required>
                                                  <option value="">Veillez choisir un cour ...</option>
                                                  <option>...</option>
                                                </select>
                                              </div>
                                          </div>
                                        <!--form inputs end-->
                                </div>
                                <!--Form end-->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn mr-2 iq-bg-danger" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn iq-bg-success">modifier</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                    <!--Modal edit end-->
                    <!--Modal delete start-->
                    <div class="modal fade" id="Modaldel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                voulez vous vraiment supprimer ce ----- ?
                                <form method="post" action="#">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn mr-2 iq-bg-danger" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn iq-bg-success">valider</button>
                            </div>
                        </form>
                            </div>
                        </div>
                        </div>
                    <!--Modal delete end-->
                    </tbody>
                </table>
            </div>
              <!--content end here-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Modal add start here-->
<div class="modal fade" id="Modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!--Form start-->
            <div class="container">
                <form method="post" action="#" enctype="multipart/form-data">
                    <!--form inputs here-->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="clients">Client</label>
                            <select id="clients" class="form-control" name="clients" required>
                              <option value="">Veillez choisir un client ...</option>
                              <option>...</option>
                            </select>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="Session">Sessions</label>
                            <select id="Session" class="form-control" name="Session" required>
                              <option value="">Veillez choisir une session ...</option>
                              <option>...</option>
                            </select>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="lessons">Cours</label>
                            <select id="lessons" class="form-control" name="lessons" required>
                              <option value="">Veillez choisir un cour ...</option>
                              <option>...</option>
                            </select>
                          </div>
                      </div>
                    <!--form inputs end-->
            </div>
            <!--Form end-->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn mr-2 iq-bg-danger" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn iq-bg-success">Valider</button>
        </div>
        </form>
    </div>
</div>
</div>
<!--Modal add end here-->

<script>
    $(document).ready(function() {
        $('#reservation-table').DataTable({
            "columnDefs": [{
                "targets": [0, 4],
                "orderable": false,
                className: 'select-checkbox'
            }],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
            }
        });
    });
    </script>
@endsection
