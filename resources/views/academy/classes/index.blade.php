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
                                        <h4 class="card-title m-0">Liste des classes</h4>
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
                                            <th>ID</th>
                                            <th>Code</th>
                                            <th>Classe</th>
                                            <th>Capacité</th>
                                            <th>Salle</th>
                                            <th>departement</th>
                                            <th>Cours</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($classes as $class)
                                        <td>{{ $class->id }}</td>
                                        <td>{{ $class->code_class }}</td>
                                        <td>{{ $class->name }}</td>
                                        <td>{{ $class->capacity }}</td>
                                        <td>{{ ($class->rooms_id !=Null)? $class->rooms_id : '--' }}</td>
                                        <td>{{ ($class->departments_id !=null)? $class->departments_id : '--'}}</td>
                                        <td>{{ ($class->lessons_id !=Null)? $class->lessons_id : '--' }}</td>
                                        <td>
                                            <div class="flex align-items-center list-user-action">
                                                <span data-toggle="modal" data-target="#ModalEdit{{$class->id}}">
                                                    <a data-placement="top" title="" data-original-title="Modifier" href="#" data-toggle="modal" data-target="#ModalEdit"><i class="ri-pencil-line"></i></a>
                                                </span>
                                                <span data-toggle="modal" data-target="#Modaldel{{$class->id}}">
                                                    <a data-placement="top" title="" data-original-title="Supprimer" href="#" data-toggle="modal" data-target="#Modaldel"><i class="ri-delete-bin-line"></i></a>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!--Modal edit start-->
                                    <div class="modal fade" id="ModalEdit{{$class->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Mise a jour classes</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!--Form start-->
                                                <div class="container">
                                                    <form method="post" action="{{ route('academy-classes.update',[$class->id]) }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="departement_update">Département</label>
                                                                <select name="departement" id="departement_update" class="form-control" >
                                                                    <option value="">Veillez choisir un département </option>
                                                                    @foreach ($departments as $department)
                                                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="room">Salles</label>
                                                                <select name="room" id="room_update" class="form-control" >
                                                                    <option selected value="">Veillez choisir une salle ...</option>
                                                                    <option value="1">SAlle 1</option>
                                                                    <option value="2">Salle 2</option>
                                                                    <option value="3">Salle 3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label for="lesson">Cours</label>
                                                                <select name="lesson" id="lesson_update" class="form-control">
                                                                    <option selected value="">Veillez choisir un cours ...</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="code_class_update">code classe</label>
                                                                <input type="text" class="form-control" id="code_class_update" value="CL{{ rand(0,9999) }}" required readonly/>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="name_class">Nom de la classe</label>
                                                                <input name="name_class" type="text" class="form-control" id="nameclass_update" value="{{ $class->name }}" autocomplete="off" required/>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="capacity">Capacité de la classe</label>
                                                                <input name="capacity" type="number" class="form-control" id="capacity_update" value="{{ $class->capacity }}" autocomplete="off" required/>
                                                            </div>
                                                        </div>
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
                                    <div class="modal fade" id="Modaldel{{$class->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Supprimer classe</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                voulez vous vraiment supprimer ce classe ?
                                                <form method="post" action="{{ route('academy-classes.destroy',[$class->id]) }}">
                                                    @csrf
                                                    @method('delete')
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
    <!--Add class start-->
    <div class="modal fade" id="Addcalss" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter classes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Form start-->
                    <div class="container">
                        <form method="post" action="{{ route('academy-classes.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="departement">Département</label>
                                    <select name="departement" id="departement" class="form-control" required>
                                        <option value="">Veillez choisir un département </option>
                                        @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="room">Salles</label>
                                    <select name="room" id="room" class="form-control" >
                                        <option value="">Veillez choisir une salle ...</option>
                                        <option value="1">SAlle 1</option>
                                        <option value="2">Salle 2</option>
                                        <option value="3">Salle 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="lesson">Cours</label>
                                    <select name="lesson" id="lesson" class="form-control" required>
                                        <option value="">Veillez choisir un cours ...</option>
                                        @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }} {{ $level->levelsType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Code classe</label>
                                    <input name="code_class" type="text" class="form-control is-valid" id="code_class" value="CL{{ rand(0,9999) }}" required readonly/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputnameclass">Nom de la classe</label>
                                    <input name="name_class" type="text" class="form-control" id="inputnameclass" autocomplete="off" required/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputcapacity">Capacité </label>
                                    <input name="capacity" type="number" class="form-control" id="inputcapacity" autocomplete="off" required/>
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
    <script>
        $(document).ready(function() {
            $('#class-table').DataTable({
                "columnDefs": [{
                    "targets": [0, 6],
                    "orderable": false
                }],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
                }
            });
        });
        //
        $(document).ready(function(){
            $('#inputnameclass').keyup(function(){
            let e = $('#inputnameclass');
            let l = e.val();
            if(l.length > 1){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ////
        $('#inputcapacity').keyup(function(){
            let e = $('#inputcapacity');
            let l = e.val();
            if(l.length != 0){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ///
        $('#departement').keyup(function(){
            let e = $('#departement');
            let l = e.val();
            alert(e)
            if(l != ""){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ///
        $('#room').keyup(function(){
            let e = $('#room');
            let l = e.val();
            if(l != ""){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ///
        $('#lesson').keyup(function(){
            let e = $('#lesson');
            let l = e.val();
            if(l != ""){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        });
    </script>
    <!--scripts-->
@endsection
