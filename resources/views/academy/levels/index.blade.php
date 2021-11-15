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
                  <h4 class="card-title m-0">Liste des Niveaux</h4>
                  <div class="d-flex flex-row">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#Addlevel"><i class="ri-add-line"></i> Ajouter</a>
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
                <table id="levels-table" class="table table-striped table-bordered mt-4" role="grid"
                    aria-describedby="user-list-page-info">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Niveau</th>
                            <th>type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($levels as $level)
                        <td>{{ $level->id }}</td>
                        <td>{{ $level->name }}</td>
                        <td>{{ $level->levelsType->name }}</td>
                        <td>
                            <div class="flex align-items-center list-user-action">
                                <span data-toggle="modal" data-target="#ModalEdit{{$level->id}}">
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier" href="#"><i class="ri-pencil-line"></i></a>
                                </span>
                                <span data-toggle="modal" data-target="#Modaldel{{$level->id}}">
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer" href="#" ><i class="ri-delete-bin-line"></i></a>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <!--Modal edit start-->
                    <div class="modal fade" id="ModalEdit{{$level->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mise a jour niveau</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!--Form start-->
                                <div class="container">
                                    <form method="post" action="{{ route('academy-levels.update',[$level->id]) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="name_level">Nom</label>
                                                <input name="name_level" type="text" class="form-control" id="name_level" autocomplete="off" value="{{ $level->name }}" required/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="name_level">Type</label>
                                                <select class="form-control" name="Type_level" id="Type_level" required>
                                                    @foreach ($levelsType as $Type)
                                                    <option value="{{ $Type->id }}">{{ $Type->name }}</option>
                                                    @endforeach

                                                  </select>
                                            </div>
                                          </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" rows="2" name="description">{{ $level->description }}</textarea>
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
                    <div class="modal fade" id="Modaldel{{$level->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Supprimer Niveau</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Voulez vous vraiment supprimer ce Niveau ?
                                <form method="post" action="{{ route('academy-levels.destroy',[$level->id]) }}" enctype="multipart/form-data">
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
              <!--Content end here-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Modal add start here-->
<div class="modal fade" id="Addlevel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter Niveau</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{ route('academy-levels.store') }}" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
          <!--content start here-->
          <div class="container-fluid">
              <div class="row">
                <div class="form-group col-md-6">
                    <label for="input_name_level">Nom</label>
                    <input name="input_name_level" type="text" class="form-control" id="input_name_level" autocomplete="off" required/>
                </div>
                <div class="form-group col-md-6">
                    <label for="type_level">Type</label>
                    <select class="form-control" name="Type_level" id="Type_level" required>
                        @foreach ($levelsType as $Type)
                        <option value="{{ $Type->id }}">{{ $Type->name }}</option>
                        @endforeach

                      </select>
                </div>
              </div>
          </div>
          <!--content end here-->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn mr-2 iq-bg-danger" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn iq-bg-success">Ajouter</button>
        </div>
      </div>
    </div>
  </div>
<!--Modal add end here-->

<script>
          $(document).ready(function() {
            $('#levels-table').DataTable({
                "columnDefs": [{
                    "targets": [0, 3],
                    "orderable": false
                }],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
                }
            });
        });
        ///////
        $(document).ready(function(){
            $('#input_name_level').keyup(function(){
            let e = $('#input_name_level');
            let l = e.val();
            if(l.length > 3){
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
