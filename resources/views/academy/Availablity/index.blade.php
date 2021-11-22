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
                                        <h4 class="card-title m-0">Disponibilité des Enseignants</h4>
                                        <div class="d-flex flex-row">
                                            <a href="#" class="btn btn-success" data-toggle="modal"
                                                data-target="#ModalAdd"><i class="ri-add-line"></i> Ajouter</a>
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
                                <table id="class-table" class="table table-striped table-bordered mt-4" role="grid"
                                    aria-describedby="user-list-page-info">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Téléphone</th>
                                            <th>8h</th>
                                            <th>11h</th>
                                            <th>14h</th>
                                            <th>18h</th>
                                            <th>ONLINE</th>
                                            <th>21h</th>
                                            <th>Weekend</th>
                                            <th>Email</th>
                                            <th>Niveau prof</th>
                                            <th>Prix de l'heure</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <td>
                                            <div class="flex align-items-center list-user-action">
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
                                        <!--Modal edit start-->
                                        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Mise a jour</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!--Form start-->
                                                        <div class="container">
                                                            <form method="post" action="#" enctype="multipart/form-data">
                                                                <!--form inputs here-->
                                                                <div class="row d-flex justify-content-center">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="teacher">Liste des Enseignants</label>
                                                                        <select name="teacher" id="teacher"
                                                                            class="form-control" required>
                                                                            <option value="">Veillez choisir un Enseignants
                                                                                ... </option>
                                                                            <option value="1">Amine ben omor </option>
                                                                            <option value="2">Walid ben moussa </option>
                                                                            <option value="3">Azhar tounsi </option>
                                                                            <option value="4">ahmed ben abdallah </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label for="time">Les temps</label>
                                                                        <select name="time[]" id="time"
                                                                            class="form-control" multiple required>
                                                                            <option value="">Veillez choisir vos
                                                                                disponiblité ... </option>
                                                                            <option value="1">8h </option>
                                                                            <option value="2">11h</option>
                                                                            <option value="3">14h</option>
                                                                            <option value="4">18h</option>
                                                                            <option value="4">ONLINE</option>
                                                                            <option value="4">21h</option>
                                                                            <option value="4">Week-end</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <!--form inputs end-->
                                                        </div>
                                                        <!--Form end-->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-success">modifier</button>
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
                                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        voulez vous vraiment supprimer ce ----- ?
                                                        <form method="post" action="#">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-info"
                                                            data-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-danger">Valider</button>
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
    <!--Modal add-->
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <div class="row d-flex justify-content-center">
                                <div class="form-group col-md-6">
                                    <label for="teacher">Liste des Enseignants</label>
                                    <select name="teacher" id="teacher" class="form-control" required>
                                        <option value="">Veillez choisir un Enseignants ... </option>
                                        <option value="1">Amine ben omor </option>
                                        <option value="2">Walid ben moussa </option>
                                        <option value="3">Azhar tounsi </option>
                                        <option value="4">ahmed ben abdallah </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="time">Les temps</label>
                                    <select name="time[]" id="time" class="form-control" multiple required>
                                        <option value="">Veillez choisir vos disponiblité ... </option>
                                        <option value="1">8h </option>
                                        <option value="2">11h</option>
                                        <option value="3">14h</option>
                                        <option value="4">18h</option>
                                        <option value="4">ONLINE</option>
                                        <option value="4">21h</option>
                                        <option value="4">Week-end</option>
                                    </select>
                                </div>
                            </div>
                            <!--form inputs end-->
                    </div>
                    <!--Form end-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Valider</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--Modal add end-->
    <script>
        $(document).ready(function() {
            $(function() {
                $('select').selectpicker();
            });
        });
    </script>
@endsection
