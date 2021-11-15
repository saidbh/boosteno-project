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
                                        <h4 class="card-title m-0">Liste des employés</h4>
                                        <div class="d-flex flex-row">
                                            <a href="#" class="btn btn-success" data-toggle="modal"
                                                data-target="#AddEmployee"><i class="ri-add-line"></i> Ajouter</a>
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
                                <table id="employes-table" class="table table-striped table-bordered mt-4" role="grid"
                                    aria-describedby="user-list-page-info">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>adresse</th>
                                            <th>Agence</th>
                                            <th>Département</th>
                                            <th>Type</th>
                                            <th>Niveau</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employe)
                                            <td>{{ $employe->first_name }}</td>
                                            <td>{{ $employe->last_name }}</td>
                                            <td>{{ $employe->email }}</td>
                                            <td>{{ $employe->phone }}</td>
                                            <td>{{ $employe->address_line }}</td>
                                            <td>{{ $employe->agency->name }}</td>
                                            <td>{{ $employe->department->name }}</td>
                                            <td>{{ $employe->type->name }}</td>
                                            <td>{{ $employe->level != null ? $employe->level : '--' }}</td>
                                            <td>
                                                <div class="flex align-items-center list-user-action">
                                                    <a data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Consulter" href="{{ route('teacher_profile') }}"><i
                                                            class="ri-eye-line"></i></a>
                                                    <span data-toggle="modal" data-target="#ModalEdit{{$employe->id}}">
                                                        <a data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Modifier" href="#"><i
                                                                class="ri-pencil-line"></i></a>
                                                    </span>
                                                    <span data-toggle="modal" data-target="#Modaldel{{$employe->id}}">
                                                        <a data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Supprimer" href="#"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </span>
                                                </div>
                                            </td>
                                            </tr>
                                            <!--Modal edit start-->
                                        <div class="modal fade" id="ModalEdit{{$employe->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Mise a jour
                                                            Employee</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!--Form start-->
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <form autocomplete="off" method="POST" action="{{ route('rh-employees.update',[$employe->id]) }}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-4">
                                                                                <label for="employees_type_id_update">Type
                                                                                    Employé</label>
                                                                                <select id="employees_type_id_update"
                                                                                    class="form-control"
                                                                                    name="employee_type" required>
                                                                                    <option value="">Choisir un type
                                                                                        d'employé ...</option>
                                                                                    @foreach ($employeeType as $type)
                                                                                        <option
                                                                                            value="{{ $type->id }}">
                                                                                            {{ $type->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="agencies_id_update">Agence</label>
                                                                                <select id="agencies_id_update"
                                                                                    class="form-control" name="agency_id"
                                                                                    required>
                                                                                    @foreach ($Agencys as $Agency)
                                                                                        <option
                                                                                            value="{{ $Agency->id }}">
                                                                                            {{ $Agency->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label
                                                                                    for="departments_id_update">Département</label>
                                                                                <select id="departments_id_update"
                                                                                    class="form-control"
                                                                                    name="departement" required>
                                                                                    @foreach ($Depaprtements as $Depaprtement)
                                                                                        <option
                                                                                            value="{{ $Depaprtement->id }}">
                                                                                            {{ $Depaprtement->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-4">
                                                                                <label for="first_name">Nom</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="first_name_update" name="first_name"
                                                                                    autocomplete="off" value="{{ $employe->first_name }}" required>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="last_name">Prénom</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="last_name_update" name="last_name"
                                                                                    autocomplete="off" value="{{ $employe->last_name }}" required>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="email">Email</label>
                                                                                <input type="email" class="form-control"
                                                                                    id="email_update" name="email"
                                                                                    autocomplete="off" value="{{ $employe->email }}" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-4">
                                                                                <label for="phone">Téléphone</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="phone_update" name="phone"
                                                                                    autocomplete="off" value="{{ $employe->phone }}" required>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="gender">Genre</label>
                                                                                <select id="gender_update" class="form-control"
                                                                                    name="gender">
                                                                                    <option value="Male" selected>Mr
                                                                                    </option>
                                                                                    <option value="Female">Mme</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="last_name">Date de
                                                                                    naissance</label>
                                                                                <input type="date" class="form-control"
                                                                                    id="birthday_update" name="birthday" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-md-4">
                                                                                <label for="address">Adresse</label>
                                                                                    <input type="text" class="form-control"
                                                                                    id="address_update" name="address" value="{{ $employe->address_line }}" autocomplete="off" required>
                                                                            </div>
                                                                            <div class="form-group col-md-4"
                                                                                id="level_teacher_update">
                                                                                <label for="level">Niveau </label>
                                                                                <select id="level_update" class="form-control"
                                                                                    name="level">
                                                                                    <option value="">Choisir un niveau ...
                                                                                    </option>
                                                                                    <option value="A1">A1</option>
                                                                                    <option value="A2">A2</option>
                                                                                    <option value="B1">B1</option>
                                                                                    <option value="B2">B2</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4"
                                                                                id="teacherType_update">
                                                                                <label for="teacher_type_update">Type Enseignants
                                                                                </label>
                                                                                <select id="teacher_type_update"
                                                                                    class="form-control"
                                                                                    name="teacher_type_update">
                                                                                    <option value="">Choisir un type d'enseignants ...</option>
                                                                                    @foreach ($TeachersType as $Types)
                                                                                        <option
                                                                                            value="{{ $Types->id }}">
                                                                                            {{ $Types->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="form-group col-md-4">
                                                                                <label for="country">Pays </label>
                                                                                <select id="country_update" class="form-control"
                                                                                    name="country">
                                                                                    <option value="Tunisie" selected>Tunisie
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="region">Region</label>
                                                                                <select id="region_update" class="form-control"
                                                                                    name="region">
                                                                                    <option selected>Ariana</option>
                                                                                    <option>Béja</option>
                                                                                    <option>Ben Arous</option>
                                                                                    <option>Bizerte</option>
                                                                                    <option>Gabès</option>
                                                                                    <option>Nabeul</option>
                                                                                    <option>Jendouba</option>
                                                                                    <option>Kairouan</option>
                                                                                    <option>Kasserine</option>
                                                                                    <option>Kebili</option>
                                                                                    <option>Kef</option>
                                                                                    <option>Mahdia</option>
                                                                                    <option>Manouba</option>
                                                                                    <option>Medenine</option>
                                                                                    <option>Monastir</option>
                                                                                    <option>Gafsa</option>
                                                                                    <option>Sfax</option>
                                                                                    <option>Sidi Bouzid</option>
                                                                                    <option>Siliana</option>
                                                                                    <option>Sousse</option>
                                                                                    <option>Tataouine</option>
                                                                                    <option>Tozeur</option>
                                                                                    <option>Tunis</option>
                                                                                    <option>Zaghouan</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label for="zip_code_update">Code postal</label>
                                                                                <input type="number" class="form-control"
                                                                                    id="zip_code_update" name="zip_code_update"
                                                                                    autocomplete="off" value="{{ $employe->zip_code }}"  required>
                                                                            </div>
                                                                        </div>
                                                                    <!--Edit employee form end-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Form end-->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                            class="btn mr-2 iq-bg-danger"
                                                            data-dismiss="modal">Annuler</button>
                                                        <button type="submit"
                                                            class="btn iq-bg-success">Modifier</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Modal edit end-->
                                        <!--Modal delete start-->
                                        <div class="modal fade" id="Modaldel{{$employe->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer Employé
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Voulez vous vraiment supprimer cette employé ?
                                                        <form method="POST" action="{{ route('rh-employees.destroy',[$employe->id]) }}" >
                                                            @csrf
                                                            @method('delete')
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn mr-2 iq-bg-info"
                                                            data-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn iq-bg-danger">valider</button>
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
                            <!--Content end here-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal add start-->
    <div class="modal fade" id="AddEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter Employés</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Add employee form start-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <form autocomplete="off" method="POST" action="{{ route('rh-employees.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="employees_type_id">Type Employé</label>
                                            <select id="employees_type_id" class="form-control" name="employee_type"
                                                required>
                                                <option value="">Choisir un type d'employé ...</option>
                                                @foreach ($employeeType as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="agencies_id">Agence</label>
                                            <select id="agencies_id" class="form-control" name="agency_id" required>
                                                @foreach ($Agencys as $Agency)
                                                    <option value="{{ $Agency->id }}">{{ $Agency->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="departments_id">Département</label>
                                            <select id="departments_id" class="form-control" name="departement" required>
                                                @foreach ($Depaprtements as $Depaprtement)
                                                    <option value="{{ $Depaprtement->id }}">{{ $Depaprtement->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="first_name">Nom</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="last_name">Prénom</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="phone">Téléphone</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="gender">Genre</label>
                                            <select id="gender" class="form-control" name="gender">
                                                <option value="Male" selected>Mr</option>
                                                <option value="Female">Mme</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="last_name">Date de naissance</label>
                                            <input type="date" class="form-control" id="birthday" name="birthday"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="address">Adresse</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                required>
                                        </div>
                                        <div class="form-group col-md-4" id="level_teacher">
                                            <label for="level">Niveau </label>
                                            <select id="level" class="form-control" name="level">
                                                <option value="">Choisir un niveau ...</option>
                                                <option value="A1">A1</option>
                                                <option value="A2">A2</option>
                                                <option value="B1">B1</option>
                                                <option value="B2">B2</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4" id="teacherType">
                                            <label for="teacher_type">Type Enseignants </label>
                                            <select id="teacher_type" class="form-control" name="teacher_type">
                                                <option value="">Choisir un type d'enseignants ...</option>
                                                @foreach ($TeachersType as $Types)
                                                    <option value="{{ $Types->id }}">{{ $Types->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="country">Pays </label>
                                            <select id="country" class="form-control" name="country">
                                                <option value="Tunisie" selected>Tunisie</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="region">Region</label>
                                            <select id="region" class="form-control" name="region">
                                                <option selected>Ariana</option>
                                                <option>Béja</option>
                                                <option>Ben Arous</option>
                                                <option>Bizerte</option>
                                                <option>Gabès</option>
                                                <option>Nabeul</option>
                                                <option>Jendouba</option>
                                                <option>Kairouan</option>
                                                <option>Kasserine</option>
                                                <option>Kebili</option>
                                                <option>Kef</option>
                                                <option>Mahdia</option>
                                                <option>Manouba</option>
                                                <option>Medenine</option>
                                                <option>Monastir</option>
                                                <option>Gafsa</option>
                                                <option>Sfax</option>
                                                <option>Sidi Bouzid</option>
                                                <option>Siliana</option>
                                                <option>Sousse</option>
                                                <option>Tataouine</option>
                                                <option>Tozeur</option>
                                                <option>Tunis</option>
                                                <option>Zaghouan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="zip_code">Code postal</label>
                                            <input type="number" class="form-control" id="zip_code" name="zip_code"
                                                autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn mr-2 iq-bg-danger"
                                            data-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn iq-bg-success">Ajouter</button>
                                    </div>
                                </form>
                                <!--Add employee form end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal add end-->
    <script>
        $(document).ready(function() {
            $('#employes-table').DataTable({
                "columnDefs": [{
                    "targets": [0, 8],
                    "orderable": false
                }],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
                }
            });
        });
        /////////////////////////////////////////////////////////
        //
        $('#first_name').keyup(function() {
            let e = $('#first_name');
            let l = e.val();
            if (l.length > 2) {
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            } else {
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        $('#email').keyup(function() {
            let e = $('#email');
            let l = e.val();
            if (IsEmail(l)) {
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            } else {
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
            /////
            function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(email)) {
                    return false;
                } else {
                    return true;
                }
            }
            /////
        });
        ////
        $('#last_name').keyup(function() {
            let e = $('#last_name');
            let l = e.val();
            if (l.length > 2) {
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            } else {
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ////
        $('#phone').keyup(function() {
            let e = $('#phone');
            let l = e.val();
            if (l.length > 7) {
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            } else {
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ////
        $('#address').keyup(function() {
            let e = $('#address');
            let l = e.val();
            if (l.length > 5) {
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            } else {
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ////
        $('#zip_code').keyup(function() {
            let e = $('#zip_code');
            let l = e.val();
            if (l.length > 3) {
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            } else {
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ////
        $('#level_teacher').hide();
        $('#employees_type_id').change(function() {
            let e = $('#employees_type_id');
            let l = e.val();
            if (l == 1) {
                $('#level_teacher').show();
            } else {
                $('#level_teacher').hide();
            }
        });
        ///
        $('#teacherType').hide();
        $('#employees_type_id').change(function() {
            let e = $('#employees_type_id');
            let l = e.val();
            if (l == 1) {
                $('#teacherType').show();
            } else {
                $('#teacherType').hide();
            }
        });
        /////////////////////////////////////////
        $('#level_teacher_update').hide();
        $('#employees_type_id_update').change(function() {
            let e = $('#employees_type_id_update');
            let l = e.val();
            if (l == 1) {
                $('#level_teacher_update').show();
            } else {
                $('#level_teacher_update').hide();
            }
        });
        ///
        $('#teacherType_update').hide();
        $('#employees_type_id_update').change(function() {
            let e = $('#employees_type_id_update');
            let l = e.val();
            if (l == 1) {
                $('#teacherType_update').show();
            } else {
                $('#teacherType_update').hide();
            }
        });
        /////

    </script>
@endsection
