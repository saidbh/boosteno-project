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
                                                data-target="#Addlessons"><i class="ri-add-line"></i> Ajouter</a>
                                            <a href="#" class="btn mx-1 btn-primary">PDF</a>
                                            <a href="#" class="btn btn-primary">Excel</a>
                                            <a href="#" class="btn ml-1 btn-primary">Imprimer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <!--Lessons form-->
                            <div class="table-responsive">
                                <table id="lessons-table" class="table table-striped table-bordered mt-4" role="grid"
                                    aria-describedby="user-list-page-info">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Cours</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Lessons as $Lesson)
                                            <tr class="text-center">
                                                <td>{{ $Lesson->id }}</td>
                                                <td>{{ $Lesson->name }}</td>
                                                <td>{{ $Lesson->lessons_type->name }}</td>
                                                <td>
                                                    <div class="flex align-items-center list-user-action">
                                                        <span data-toggle="modal"
                                                            data-target="#Editmodal{{ $Lesson->id }}">
                                                            <a data-placement="top" title="" data-original-title="Modifier"
                                                                href="#"><i class="ri-pencil-line"></i></a>
                                                        </span>
                                                        <span data-toggle="modal"
                                                            data-target="#delmodal{{ $Lesson->id }}">
                                                            <a  data-placement="top" title="" data-original-title="Supprimer"
                                                                href="#"><i class="ri-delete-bin-line"></i></a>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--Edit modal start-->
                                                                                    <div class="modal fade" id="Editmodal{{ $Lesson->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modifier un cour</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!--Form start-->
                                                        <div class="container">
                                                            <form method="post" action="{{ route('academy-lessons.update',[$Lesson->id]) }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('put')
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="Session">Session</label>
                                                                        <select name="Session" id="inputState" class="form-control" required>
                                                                            <option value="">Veillez choisir une session ... </option>
                                                                            @foreach ($sessions as $session)
                                                                                <option value="{{ $session->id }}">{{ $session->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="teacher_id">Enseignants</label>
                                                                        <select name="teacher_id" id="inputState" class="form-control" required>
                                                                            <option value="">Veillez choisir un Enseignants ...</option>
                                                                            @foreach ($teachers as $teacher)
                                                                                <option value="{{ $teacher->employees->id }}">
                                                                                    {{ $teacher->employees->first_name }}
                                                                                    {{ $teacher->employees->last_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="lessons_type_id">Type de Cours</label>
                                                                        <select name="lessons_type_id" id="inputState" class="form-control" required>
                                                                            <option value=""></option>
                                                                            @foreach ($lessens_type as $lessen_type)
                                                                                <option value="{{ $lessen_type->id }}">{{ $lessen_type->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="level_update">Niveau</label>
                                                                        <select id="level_update" class="form-control" required>
                                                                            <option value="">Veillez choisir un Niveau ...</option>
                                                                            @foreach ($levels as $level)
                                                                                <option>{{ $level->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="level_type_update">Type de Niveau</label>
                                                                        <select id="level_type_update" class="form-control" required>
                                                                            <option value=""></option>
                                                                            @foreach ($levels_type as $level_type)
                                                                                <option>{{ $level_type->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="name_lesson_update">Nom du cour</label>
                                                                        <input name="name_lesson" type="text" class="form-control" id="namelesson" Value=""
                                                                            autocomplete="off" required readonly />
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <!--Form end-->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn mr-2 iq-bg-danger" data-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn iq-bg-success">Modifier</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                            <!--Edit modal end-->
                                            <!--Delete modal start-->
                                            <div class="modal fade" id="delmodal{{ $Lesson->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Supprimer cours
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Vouler vous vraiment supprimer ce cour ?
                                                            <form method="POST" action="{{ route('academy-lessons.destroy',[$Lesson->id]) }}">
                                                                @csrf
                                                                @method('delete')
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn mr-2 iq-bg-info"
                                                                data-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn iq-bg-danger">Supprimer</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Delete modal end -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--Lessons form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Add Lesson start-->
    <div class="modal fade" id="Addlessons" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un cour</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Form start-->
                    <div class="container">
                        <form method="post" action="{{ route('academy-lessons.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Session">Session</label>
                                    <select name="Session" id="inputState" class="form-control">
                                        <option value="">Veillez choisir une session ... </option>
                                        @foreach ($sessions as $session)
                                            <option value="{{ $session->id }}">{{ $session->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="teacher_id">Enseignants</label>
                                    <select name="teacher_id" id="inputState" class="form-control">
                                        <option value="">Veillez choisir un Enseignants ...</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->employees->id }}">
                                                {{ $teacher->employees->first_name }}
                                                {{ $teacher->employees->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="lessons_type_id">Type de Cours</label>
                                    <select name="lessons_type_id" id="inputState" class="form-control">
                                        @foreach ($lessens_type as $lessen_type)
                                            <option value="{{ $lessen_type->id }}">{{ $lessen_type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="level">Niveau</label>
                                    <select id="level" class="form-control">
                                        <option></option>
                                        @foreach ($levels as $level)
                                            <option>{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="level_type">Type de Niveau</label>
                                    <select id="level_type" class="form-control">
                                        <option ></option>
                                        @foreach ($levels_type as $level_type)
                                            <option>{{ $level_type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name_lesson">Nom du cour</label>
                                    <input name="name_lesson" type="text" class="form-control" id="namelesson1" Value=""
                                        autocomplete="off" required readonly />
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
    <!--Add Lesson end-->
    <!--scripts-->
    <script>
        $(document).ready(function() {
            $('#lessons-table').DataTable({
                "columnDefs": [{
                    "targets": [0, 3],
                    "orderable": false
                }],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
                }
            });
        });
        $(document).ready(function() {
            var value;
            $('#level').change(function() {
                let value = $("#level option:selected").text();
                $('#level_type').change(function() {
                    let value1 = $("#level_type option:selected").text();

                    if($('#namelesson1').val(value + value1)){
                      $('#namelesson1').removeClass('is-invalid');
                      $('#namelesson1').addClass('is-valid');
                    }else{
                        $('#namelesson1').removeClass('is-valid');
                        $('#namelesson1').addClass('is-invalid');
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
                    if($('#namelesson1').val(value1 + value)){
                      $('#namelesson1').removeClass('is-invalid');
                      $('#namelesson1').addClass('is-valid');
                    }else{
                        $('#namelesson1').removeClass('is-valid');
                        $('#namelesson1').addClass('is-invalid');
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
                    $('#namelesson').val(value + value1)
                });
            });
        });
        $(document).ready(function() {
            var value;
            $('#level_type_update').change(function() {
                let value = $("#level_type_update option:selected").text();
                $('#level_update').change(function() {
                    let value1 = $("#level_update option:selected").text();
                    $('#namelesson').val(value1 + value)
                });
            });
        });
    </script>
@endsection
