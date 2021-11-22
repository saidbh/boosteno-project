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
                                        <h4 class="card-title m-0">Liste des Cours</h4>
                                        <div class="d-flex flex-row">
                                            <a href="#" class="btn btn-success" data-toggle="modal"
                                                data-target="#Addcalss"><i class="ri-add-line"></i> Ajouter</a>
                                            <a href="#" class="btn mx-1 btn-primary">PDF</a>
                                            <a href="#" class="btn btn-primary">Excel</a>
                                            <a href="#" class="btn ml-1 btn-primary">Imprimer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <!--classe form-->
                            <div class="table-responsive">
                                <table id="class-table" class="table table-striped table-bordered mt-4" role="grid"
                                    aria-describedby="user-list-page-info">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Code</th>
                                            <th>Cour</th>
                                            <th>Date de début</th>
                                            <th>Date de fin</th>
                                            <th>Heure début</th>
                                            <th>Heure de fin</th>
                                            <th>Enseignants</th>
                                            <th>Salle</th>
                                            <th>Capacité</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td></td>
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
                                                <span data-toggle="modal" data-target="#details">
                                                    <a data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Détaille" href="#"><i
                                                            class="ri-article-line"></i></a>
                                                </span>
                                                <span data-toggle="modal" data-target="#affectClient">
                                                    <a data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Affecter-clients" href="#"><i
                                                            class="ri-user-shared-line"></i></a>
                                                </span>
                                                <span data-toggle="modal" data-target="#ModalEdit">
                                                    <a data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Modifier" href="#"><i
                                                            class="ri-pencil-line"></i></a>
                                                </span>
                                                <span data-toggle="modal" data-target="#Modaldel">
                                                    <a data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Supprimer" href="#"><i
                                                            class="ri-delete-bin-line"></i></a>
                                                </span>
                                            </div>
                                        </td>
                                        </tr>
                                        <!--Modal details-->
                                        <div class="modal fade" id="details" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Détailles classe
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="">
                                                        <!--content here-->

                                                        <!--content end-->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn mr-2 iq-bg-info"
                                                        data-dismiss="modal">fermer</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                        <!--Modal details end-->
                                        <!--Modal affect start-->
                                        <div class="modal fade" id="affectClient" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Affecter client
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="">
                                                            <!--content here-->
                                                            <div class="container">
                                                                <div class="row d-flex justify-content-center">
                                                                    <div class="form-group col">
                                                                        <label for="clients">Liste des clients</label>
                                                                        <select name="clients[]" id="clients" class="form-control" multiple required>
                                                                            <option value="">Veillez choisir un client </option>
                                                                            <option value="1">Amine ben omor </option>
                                                                            <option value="2">Walid ben moussa </option>
                                                                            <option value="3">Azhar tounsi </option>
                                                                            <option value="4">ahmed ben abdallah </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--content end-->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn mr-2 iq-bg-danger"
                                                            data-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn iq-bg-success">valider</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Modal affect end-->
                                        <!--Modal edit start-->
                                        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Mise a jour Cours
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!--Form start-->
                                                        <div class="container">
                                                            <form method="post" action="#" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputCity">Code classe</label>
                                                                        <input name="code_class" type="text"
                                                                            class="form-control is-valid"
                                                                            id="code_class_update"
                                                                            value="CL{{ rand(0, 9999) }}" required
                                                                            readonly />
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="inputnameclass">Nom de la classe</label>
                                                                        <input name="name_class" type="text"
                                                                            class="form-control"
                                                                            id="inputnameclass_update" autocomplete="off"
                                                                            readonly required />
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="level_update">Niveau</label>
                                                                        <select id="level_update" class="form-control"
                                                                            required>
                                                                            <option value=""></option>
                                                                            <option value="A1.1">A1.1</option>
                                                                            <option value="A1.2">A1.2</option>
                                                                            <option value="A2.1">A2.1</option>
                                                                            <option value="A2.2">A2.2</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="level_type_update">Type de
                                                                            Niveau</label>
                                                                        <select id="level_type_update"
                                                                            class="form-control" required>
                                                                            <option value=""></option>
                                                                            <option value="Intensif">Intensif</option>
                                                                            <option value="Sup-intensif">Sup-intensif
                                                                            </option>
                                                                            <option value="Extensiv">Extensiv</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="Session_update">Session</label>
                                                                        <select name="Session" id="Session_update"
                                                                            class="form-control" required>
                                                                            <option value="">Veillez choisir un Session
                                                                            </option>
                                                                            <option value="Session">Session 1 </option>
                                                                            <option value="Session">Session 2 </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="teacher_update">Enseignants</label>
                                                                        <select name="teacher" id="teacher_update"
                                                                            class="form-control" required>
                                                                            <option value="">Veillez choisir un Enseignants
                                                                            </option>
                                                                            <option value="teacher1">enseignats 1 </option>
                                                                            <option value="teacher2">enseignats 2 </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="rooms">Salles</label>
                                                                        <select name="rooms" id="rooms_update"
                                                                            class="form-control" required>
                                                                            <option value="">Veillez choisir une salle
                                                                            </option>
                                                                            <option value="rooms">Salle 1 </option>
                                                                            <option value="rooms">Salle 2 </option>
                                                                            <option value="rooms">Salle En ligne </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label for="start_date_update">Date début</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control"
                                                                                name="start_date" id="start_date_update"
                                                                                aria-describedby="start_date_update">
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text"
                                                                                    id="start_date_update"><i
                                                                                        class="ri-calendar-line"></i></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label for="end_date_update">Date fin</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="text" class="form-control"
                                                                                name="end_date" id="end_date_update"
                                                                                aria-describedby="end_date_update">
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text"
                                                                                    id="end_date_update"><i
                                                                                        class="ri-calendar-line"></i></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label for="start_time_update">Heure début</label>
                                                                        <input type="time" class="form-control"
                                                                            name="start_time" id="start_time_update"
                                                                            autocomplete="off" required />
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label for="room">Heure du fin</label>
                                                                        <input type="time" class="form-control"
                                                                            name="end_time" id="end_time_update"
                                                                            autocomplete="off" required />
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="days_update">Jours</label>
                                                                        <select name="days" id="days_update"
                                                                            class="form-control" required>
                                                                            <option value="">Veillez choisir un Jour
                                                                            </option>
                                                                            <option value="Lundi">Lundi </option>
                                                                            <option value="Mardi">Mardi </option>
                                                                            <option value="Mercredi">Mercredi </option>
                                                                            <option value="Jeudi">Jeudi </option>
                                                                            <option value="Vendredi">Vendredi </option>
                                                                            <option value="Samedi">Samedi </option>
                                                                            <option value="Dimanche">Dimanche </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="capacity_update">Capacité </label>
                                                                        <input name="capacity" type="number"
                                                                            class="form-control" id="capacity_update"
                                                                            autocomplete="off" required />
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="price">Prix </label>
                                                                        <input name="price" type="number"
                                                                            class="form-control" id="price_update"
                                                                            autocomplete="off" required />
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <!--Form end-->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn mr-2 iq-bg-danger"
                                                            data-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn iq-bg-success">modifier</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Modal edit end-->
                                        <!--Modal delete start-->
                                        <div class="modal fade" id="Modaldel" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer classe
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        voulez vous vraiment supprimer ce classe ?
                                                        <form method="post" action="">
                                                            @csrf
                                                            @method('delete')
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn mr-2 iq-bg-danger"
                                                            data-dismiss="modal">Annuler</button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Add class start-->
    <div class="modal fade" id="Addcalss" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter Cour</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Form start-->
                    <div class="container">
                        <form method="post" action="#" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Code Cour</label>
                                    <input name="code_class" type="text" class="form-control is-valid" id="code_class"
                                        value="CL{{ rand(0, 9999) }}" required readonly />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputnameclass">Nom de la Cour</label>
                                    <input name="name_class" type="text" class="form-control" id="inputnameclass"
                                        autocomplete="off" readonly required />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="level">Niveau</label>
                                    <select id="level" class="form-control" required>
                                        <option value=""></option>
                                        <option value="A1.1">A1.1</option>
                                        <option value="A1.2">A1.2</option>
                                        <option value="A2.1">A2.1</option>
                                        <option value="A2.2">A2.2</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="level_type">Type de Niveau</label>
                                    <select id="level_type" class="form-control" required>
                                        <option value=""></option>
                                        <option value="Intensif">Intensif</option>
                                        <option value="Sup-intensif">Sup-intensif</option>
                                        <option value="Extensiv">Extensiv</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Session">Session</label>
                                    <select name="Session" id="Session" class="form-control" required>
                                        <option value="">Veillez choisir un Session </option>
                                        <option value="Session">Session 1 </option>
                                        <option value="Session">Session 2 </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="teacher">Enseignants</label>
                                    <select name="teacher" id="teacher" class="form-control" required>
                                        <option value="">Veillez choisir un Enseignants </option>
                                        <option value="teacher1">enseignats 1 </option>
                                        <option value="teacher2">enseignats 2 </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="rooms">Salles</label>
                                    <select name="rooms" id="rooms" class="form-control" required>
                                        <option value="">Veillez choisir une salle </option>
                                        <option value="rooms">Salle 1 </option>
                                        <option value="rooms">Salle 2 </option>
                                        <option value="rooms">Salle En ligne </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="start_date">Date début</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="start_date" id="start_date"
                                            aria-describedby="start_date">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="start_date"><i
                                                    class="ri-calendar-line"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="end_date">Date fin</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="end_date" id="end_date"
                                            aria-describedby="end_date">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="end_date"><i
                                                    class="ri-calendar-line"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="start_time">Heure début</label>
                                    <input type="time" class="form-control" name="start_time" id="start_time"
                                        autocomplete="off" required />
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="room">Heure du fin</label>
                                    <input type="time" class="form-control" name="end_time" id="end_time"
                                        autocomplete="off" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="days">Jours</label>
                                    <select name="days" id="days" class="form-control" multiple required>
                                        <option value="">Veillez choisir un Jour </option>
                                        <option value="Lundi">Lundi </option>
                                        <option value="Mardi">Mardi </option>
                                        <option value="Mercredi">Mercredi </option>
                                        <option value="Jeudi">Jeudi </option>
                                        <option value="Vendredi">Vendredi </option>
                                        <option value="Samedi">Samedi </option>
                                        <option value="Dimanche">Dimanche </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="capacity">Capacité </label>
                                    <input name="capacity" type="number" class="form-control" id="capacity"
                                        autocomplete="off" required />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="price">Prix </label>
                                    <input name="price" type="number" class="form-control" id="price" autocomplete="off"
                                        required />
                                </div>
                            </div>
                    </div>
                    <!--Form end-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mr-2 iq-bg-danger" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn iq-bg-success">Ajouter</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--Add class end-->
    <!--scripts-->
    <style>
        .ui-datepicker {
            z-index: 9999 !important;
        }

    </style>
    <script>
        $(document).ready(function() {
            $('#class-table').DataTable({
                "columnDefs": [{
                    "targets": [0, 9],
                    "orderable": false
                }],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
                }
            });
        });
        //
        $(document).ready(function() {
            $('#inputnameclass').keyup(function() {
                let e = $('#inputnameclass');
                let l = e.val();
                if (l.length > 1) {
                    e.removeClass('is-invalid');
                    e.addClass('is-valid');
                } else {
                    e.removeClass('is-valid');
                    e.addClass('is-invalid');
                }
            });
            ////
            $('#inputcapacity').keyup(function() {
                let e = $('#inputcapacity');
                let l = e.val();
                if (l.length != 0) {
                    e.removeClass('is-invalid');
                    e.addClass('is-valid');
                } else {
                    e.removeClass('is-valid');
                    e.addClass('is-invalid');
                }
            });
            ///
            $('#departement').keyup(function() {
                let e = $('#departement');
                let l = e.val();
                alert(e)
                if (l != "") {
                    e.removeClass('is-invalid');
                    e.addClass('is-valid');
                } else {
                    e.removeClass('is-valid');
                    e.addClass('is-invalid');
                }
            });
            ///
            $('#room').keyup(function() {
                let e = $('#room');
                let l = e.val();
                if (l != "") {
                    e.removeClass('is-invalid');
                    e.addClass('is-valid');
                } else {
                    e.removeClass('is-valid');
                    e.addClass('is-invalid');
                }
            });
            ///
            $('#lesson').keyup(function() {
                let e = $('#lesson');
                let l = e.val();
                if (l != "") {
                    e.removeClass('is-invalid');
                    e.addClass('is-valid');
                } else {
                    e.removeClass('is-valid');
                    e.addClass('is-invalid');
                }
            });
            //
            $('#capacity').keyup(function() {
                let e = $('#capacity');
                let l = e.val();
                if (l != "") {
                    e.removeClass('is-invalid');
                    e.addClass('is-valid');
                } else {
                    e.removeClass('is-valid');
                    e.addClass('is-invalid');
                }
            });
            //
            $('#price').keyup(function() {
                let e = $('#price');
                let l = e.val();
                if (l != "") {
                    e.removeClass('is-invalid');
                    e.addClass('is-valid');
                } else {
                    e.removeClass('is-valid');
                    e.addClass('is-invalid');
                }
            });
        });
        $(document).ready(function() {
            var value;
            $('#level').change(function() {
                let value = $("#level option:selected").text();
                $('#level_type').change(function() {
                    let value1 = $("#level_type option:selected").text();

                    if ($('#inputnameclass').val(value + value1)) {
                        $('#inputnameclass').removeClass('is-invalid');
                        $('#inputnameclass').addClass('is-valid');
                    } else {
                        $('#inputnameclass').removeClass('is-valid');
                        $('#inputnameclass').addClass('is-invalid');
                    }

                });
            });
        });
        $(document).ready(function() {
            var value;
            $('#level_type').change(function() {
                let value = $("#level_type option:selected").text();
                $('#level').change(function() {
                    let value1 = $("#level option:selected").text();
                    if ($('#inputnameclass').val(value1 + value)) {
                        $('#inputnameclass').removeClass('is-invalid');
                        $('#inputnameclass').addClass('is-valid');
                    } else {
                        $('#inputnameclass').removeClass('is-valid');
                        $('#inputnameclass').addClass('is-invalid');
                    }
                });
            });
        });
        // Edit //
        $(document).ready(function() {
            var value;
            $('#level_update').change(function() {
                let value = $("#level_update option:selected").text();
                $('#level_type_update').change(function() {
                    let value1 = $("#level_type_update option:selected").text();
                    $('#nameclass_update').val(value + value1)
                });
            });
        });
        $(document).ready(function() {
            var value;
            $('#level_type_update').change(function() {
                let value = $("#level_type_update option:selected").text();
                $('#level_update').change(function() {
                    let value1 = $("#level_update option:selected").text();
                    $('#nameclass_update').val(value1 + value)
                });
            });
        });

        ///////date picker ////

        $(function() {
            var dateFormat = "mm/dd/yy",
                from = $("#start_date")
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 3
                })
                .on("change", function() {
                    to.datepicker("option", "minDate", getDate(this));
                }),
                to = $("#end_date").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 3
                })
                .on("change", function() {
                    from.datepicker("option", "maxDate", getDate(this));
                });

            function getDate(element) {
                var date;
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                    date = null;
                }

                return date;
            }
        });
        ///date picker update //
        $(function() {
            var dateFormat = "mm/dd/yy",
                from = $("#start_date_update")
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 3
                })
                .on("change", function() {
                    to.datepicker("option", "minDate", getDate(this));
                }),
                to = $("#end_date_update").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 3
                })
                .on("change", function() {
                    from.datepicker("option", "maxDate", getDate(this));
                });

            function getDate(element) {
                var date;
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                    date = null;
                }

                return date;
            }
        });
        //Multi select//
        $(document).ready(function() {
            $(function() {
                $('select').selectpicker();
            });
        });
    </script>
    <!--scripts-->
@endsection
