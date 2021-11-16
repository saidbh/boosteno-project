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
                                        <h4 class="card-title m-0">Timesheets</h4>
                                        <div class="d-flex flex-row">
                                            <a href="#" class="btn btn-success" data-toggle="modal"
                                                data-target="#Addtimesheets"><i class="ri-add-line"></i> Ajouter</a>
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
                                <table id="Clients-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                                  <thead>
                                    <tr class="text-center">
                                      <th>ID</th>
                                      <th>Session</th>
                                      <th>Enseignants</th>
                                      <th>Cour</th>
                                      <th>Classe</th>
                                      <th>Salle</th>
                                      <th>Prix d'heure</th>
                                      <th>autres frais</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <tr class="text-center">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                          <div class="flex align-items-center list-user-action">
                                            <span data-toggle="modal" data-target="#Edit">
                                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier" href="#"><i class="ri-pencil-line"></i></a>
                                            </span>
                                            <span data-toggle="modal" data-target="#Del">
                                                <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Archiver" href="#" ><i class="ri-delete-bin-line"></i></a>
                                            </span>
                                          </div>
                                        </td>
                                      </tr>
                                      <!--Edit-->
                                      <div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                      aria-hidden="true">
                                      <div class="modal-dialog modal-xl" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Ajouter Timesheets</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                <div class="container-fluid">
                                                    <!--Form start here-->
                                                    <form action="#" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <!--content start here-->
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label for="Session">Session </label>
                                                               <select name="Session" id="Session_update" class="form-control" required>
                                                                    <option selected value=""> ...</option>
                                                                    <option value="1"> 1</option>
                                                                    <option value="2"> 2</option>
                                                                    <option value="3"> 3</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="teacher">Enseignants </label>
                                                               <select name="teacher" id="teacher_update" class="form-control" required>
                                                                    <option selected value=""> ...</option>
                                                                    <option value="1"> 1</option>
                                                                    <option value="2"> 2</option>
                                                                    <option value="3"> 3</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="lessons">Cours </label>
                                                               <select name="lessons" id="lessons_update" class="form-control" required>
                                                                    <option selected value=""> ...</option>
                                                                    <option value="1"> 1</option>
                                                                    <option value="2"> 2</option>
                                                                    <option value="3"> 3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label for="Class">Classes </label>
                                                               <select name="Class" id="Class_update" class="form-control" required>
                                                                    <option selected value=""> ...</option>
                                                                    <option value="1"> 1</option>
                                                                    <option value="2"> 2</option>
                                                                    <option value="3"> 3</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="rooms">Salles </label>
                                                               <select name="rooms" id="rooms_update" class="form-control" required>
                                                                    <option selected value=""> ...</option>
                                                                    <option value="1"> 1</option>
                                                                    <option value="2"> 2</option>
                                                                    <option value="3"> 3</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="hour_rate">Prix d'heure </label>
                                                                <input name="hour_rate" type="number" class="form-control" id="hour_rate_update" value="" autocomplete="off" required/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label for="other_fees">autres frais </label>
                                                                <input name="other_fees" type="number" class="form-control" id="other_fees_update" value="" autocomplete="off" required/>
                                                            </div>
                                                        </div>
                                                        <!--content end here-->
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn mr-2 iq-bg-danger" data-dismiss="modal">Annuler</button>
                                                  <button type="submit" class="btn iq-bg-success">Modifier</button>
                                              </div>
                                              </form>
                                              <!--Form end here-->
                                          </div>
                                      </div>
                                  </div>
                                      <!--Edit-->
                                      <!--Delete-->
                                      <div class="modal fade" id="Del" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Supprimer timesheet</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              Vous étes sur de vouloir supprimer ce timesheet ?
                                              <form method="POST" action="#">
                                                @csrf
                                                @method('DELETE')
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn mr-2 iq-bg-info" data-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn iq-bg-danger">Supprimer</button>
                                            </div>
                                        </form>
                                          </div>
                                        </div>
                                      </div>
                                      <!--Delete-->
                                  </tbody>
                                </table>
                              </div>
                            <!--Content end here-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal add timesheet start-->
    <div class="modal fade" id="Addtimesheets" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter Timesheets</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <!--Form start here-->
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--content start here-->
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="Session">Session </label>
                                   <select name="Session" id="Session" class="form-control" required>
                                        <option selected value=""> ...</option>
                                        <option value="1"> 1</option>
                                        <option value="2"> 2</option>
                                        <option value="3"> 3</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="teacher">Enseignants </label>
                                   <select name="teacher" id="teacher" class="form-control" required>
                                        <option selected value=""> ...</option>
                                        <option value="1"> 1</option>
                                        <option value="2"> 2</option>
                                        <option value="3"> 3</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lessons">Cours </label>
                                   <select name="lessons" id="lessons" class="form-control" required>
                                        <option selected value=""> ...</option>
                                        <option value="1"> 1</option>
                                        <option value="2"> 2</option>
                                        <option value="3"> 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="Class">Classes </label>
                                   <select name="Class" id="Class" class="form-control" required>
                                        <option selected value=""> ...</option>
                                        <option value="1"> 1</option>
                                        <option value="2"> 2</option>
                                        <option value="3"> 3</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="rooms">Salles </label>
                                   <select name="rooms" id="rooms" class="form-control" required>
                                        <option selected value=""> ...</option>
                                        <option value="1"> 1</option>
                                        <option value="2"> 2</option>
                                        <option value="3"> 3</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="hour_rate">Prix d'heure </label>
                                    <input name="hour_rate" type="number" class="form-control" id="hour_rate" value="" autocomplete="off" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="other_fees">autres frais </label>
                                    <input name="other_fees" type="number" class="form-control" id="other_fees" value="" autocomplete="off" required/>
                                </div>
                            </div>
                            <!--content end here-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mr-2 iq-bg-danger" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn iq-bg-success">Ajouter</button>
                </div>
                </form>
                <!--Form end here-->
            </div>
        </div>
    </div>
    <!--Modal add session end -->
    <script>
        $(document).ready(function() {
          $('#Clients-table').DataTable({
            "columnDefs": [{
              "targets": [0, 4]
              , "orderable": false
            }]
            , language: {
              url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
            }
          });
        });
        //////////////////////////////////////////////
        $(document).ready(function() {
        //
        $('#hour_rate').keyup(function(){
            let e = $('#hour_rate');
            let l = e.val();
            if(l.length > 0){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        //
        $('#other_fees').keyup(function(){
            let e = $('#other_fees');
            let l = e.val();
            if(l.length > 0){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
          });
          ////////////////////update part//////////////////////
          $(document).ready(function() {
              //
        //
        $('#hour_rate_update').keyup(function(){
            let e = $('#hour_rate_update');
            let l = e.val();
            if(l.length > 0){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
          //
                $('#other_fees_update').keyup(function(){
            let e = $('#other_fees_update');
            let l = e.val();
            if(l.length > 0){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
          });
      </script>
@endsection
