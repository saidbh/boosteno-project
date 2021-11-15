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
                  <h4 class="card-title m-0">Liste des Departements</h4>
                  <div class="d-flex flex-row">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#AgencyADD"><i class="ri-add-circle-fill"></i> Ajouter</a>
                    <div class="modal fade" id="AgencyADD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Departement</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-sm-12">
                                  <form action="{{ route('system-departments.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                      <div class="col-lg-3">
                                        <div class="iq-card">
                                          <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title w-100">
                                              <div class="row">
                                                <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                                                  <h4 class="card-title m-0">Nouveau Departement</h4>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="iq-card-body">
                                            <div class="form-group">
                                              <div class="avatar">
                                                <div class="avatar-wrapper">
                                                  <img src="{{ asset('assets/images/user/11.png') }}" alt="" class="profile-pic">
                                                  <div class="upload-button"><i class="ri-camera-line"></i></div>
                                                  <input class="file-upload" name="avatar" type="file" accept="image/*" />
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-9">
                                        <div class="iq-card">
                                          <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title w-100">
                                              <div class="row">
                                                <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                                                  <h4 class="card-title m-0"><b>Information Departement</b></h4>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="iq-card-body">
                                            <div class="row">
                                              <div class="form-group col-md-6">
                                                <label class="control-label" for="firstname"><b>Nom de departement</b> </label>
                                                <input type="text" class="form-control" name="departement_name" id="departement_name">
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label for="agency"><b>Agence</b></label>
                                                <select id="agency" name="agency" class="form-control form-control-sm mb-3">
                                                  @foreach($agencies as $agency)
                                                  <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label class="control-label" for="lastname"><b>Adresse</b></label>
                                                <input type="text" class="form-control" name="address_line" id="address_line">
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label class="control-label" for="city"><b>Ville</b></label>
                                                <select id="city" name="city" class="form-control form-control-sm mb-3">
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
                                              <div class="form-group col-md-6">
                                                <label class="control-label" for="region"><b>Region</b></label>
                                                <input type="text" class="form-control" name="region" id="region">
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label class="control-label" for="zip_code"><b>Code postale</b></label>
                                                <input type="text" class="form-control" name="zip_code" id="zip_code">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <!--Form add end here-->
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn mr-2 iq-bg-danger" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn iq-bg-success">Ajouter</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
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
              <table id="departement-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                <thead>
                  <tr class="text-center">
                    <th>Nom de departement</th>
                    <th>Agence</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Region</th>
                    <th>Code postal</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($departments as $department)
                  <tr class="text-center">
                    <td>{{ $department->name }}</td>
                    <td>{{ ($department->agency) ? $department->agency->name : "--" }}</td>
                    <td>{{ $department->address_line }}</td>
                    <td>{{ $department->city }}</td>
                    <td>{{ $department->region }}</td>
                    <td>{{ $department->zip_code }}</td>
                    <td>
                      <div class="flex align-items-center list-user-action">
                        <a data-placement="top" title="" data-original-title="Modifier" href="#" data-toggle="modal" data-target="#DepartmentADD{{ $department->id }}"><i class="ri-pencil-line"></i></a>
                        <div class="text-left modal fade" id="DepartmentADD{{ $department->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modifier departement</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="container-fluid">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <form action="{{ route('system-departments.update',[ $department->id ]) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                          <div class="col-lg-3">
                                            <div class="iq-card">
                                              <div class="iq-card-header d-flex justify-content-between">
                                                <div class="iq-header-title w-100">
                                                  <div class="row">
                                                    <div
                                                      class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                                                      <h4 class="card-title m-0">Departement</h4>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="iq-card-body">
                                                <div class="form-group">
                                                  <div class="avatar">
                                                    <div class="avatar-wrapper">
                                                      <img src="{{ asset('assets/images/user/11.png') }}" alt=""
                                                        class="profile-pic">
                                                      <div class="upload-button"><i class="ri-camera-line"></i></div>
                                                      <input class="file-upload" name="avatar" type="file" accept="image/*" />
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-lg-9">
                                            <div class="iq-card">
                                              <div class="iq-card-header d-flex justify-content-between">
                                                <div class="iq-header-title w-100">
                                                  <div class="row">
                                                    <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                                                      <h4 class="card-title m-0"><b>Information Departement</b></h4>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="iq-card-body">
                                                <div class="row">
                                                  <div class="form-group col-md-6">
                                                    <label class="control-label" for="firstname"><b>Nom de departement</b>
                                                    </label>
                                                    <input type="text" class="form-control" name="departement_name" id="departement_name" value="{{ $department->name }}">
                                                  </div>
                                                  <div class="form-group col-md-6">
                                                    <label for="agency"><b>Agence</b></label>
                                                    <select id="agency" name="agency" class="form-control form-control-sm mb-3">
                                                      @foreach($agencies as $agency)
                                                      <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                                      @endforeach
                                                    </select>
                                                  </div>
                                                  <div class="form-group col-md-6">
                                                    <label class="control-label" for="lastname"><b>Adresse</b></label>
                                                    <input type="text" class="form-control" name="address_line" id="address_line" value="{{ $department->address_line }}">
                                                  </div>
                                                  <div class="form-group col-md-6">
                                                    <label class="control-label" for="city"><b>Ville</b></label>
                                                    <select id="city" name="city" class="form-control form-control-sm mb-3">
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
                                                  <div class="form-group col-md-6">
                                                    <label class="control-label" for="region"><b>Region</b></label>
                                                    <input type="text" class="form-control" name="region" id="region" value="{{ $department->region }}">
                                                  </div>
                                                  <div class="form-group col-md-6">
                                                    <label class="control-label" for="zip_code"><b>Code postale</b></label>
                                                    <input type="text" class="form-control" name="zip_code" id="zip_code" value="{{ $department->zip_code }}">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn iq-bg-danger" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn iq-bg-success">Modifier</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <a data-placement="top" title="" data-original-title="Supprimer" href="#" data-toggle="modal" data-target="#ModalDel{{ $department->id }}"><i class="ri-delete-bin-line"></i></a>
                        <div class="modal fade" id="ModalDel{{ $department->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Supprimer Departement</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="{{ route('system-departments.destroy',[$department->id]) }}" enctype="multipart/form-data">
                                  @csrf
                                  @method('delete')
                                  Voulez vous vraiment supprimer {{ $department->name }} ?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn mr-2 bg-primary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn bg-danger">Supprimer</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
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

  .avatar {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .avatar .avatar-wrapper {
    position: relative;
    height: 150px;
    width: 150px;
    border-radius: 150px;
    overflow: hidden;
    transition: all .3s ease;
  }

  .avatar .avatar-wrapper:hover {
    cursor: pointer;
  }

  .avatar .avatar-wrapper .profile-pic {
    height: 150px;
    width: 150px;
    border-radius: 150px;
    object-fit: cover;
  }

  .avatar .avatar-wrapper:hover .upload-button {
    opacity: 1;
  }

  .avatar .avatar-wrapper .upload-button {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0;
  }

  .avatar .avatar-wrapper .upload-button .ri-camera-line {
    font-size: 25px;
    transition: all .3s ease;
    color: #ffffff;
  }
</style>
<script>
  $(document).ready(function() {
            $('#departement-table').DataTable({
                "columnDefs": [{
                    "targets": [0, 6]
                    , "orderable": false
                }]
                , language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
                }
            });
        });
//////////////////////////////////////
        $('#departement_name').keyup(function(){
            let e = $('#departement_name');
            let l = e.val();
            if(l.length > 5){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ///
        $('#Adresse').keyup(function(){
            let e = $('#Adresse');
            let l = e.val();
            if(l.length > 10){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ///
        $('#address_line').keyup(function(){
            let e = $('#address_line');
            let l = e.val();
            if(l.length > 10){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ///
        $('#region').keyup(function(){
            let e = $('#region');
            let l = e.val();
            if(l.length > 4){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        //
        $('#zip_code').keyup(function(){
        let e = $('#zip_code');
        let l = e.val();
        if($.isNumeric( l ) && l.length > 3 ){
            e.removeClass('is-invalid');
            e.addClass('is-valid');
        }else{
            e.removeClass('is-valid');
            e.addClass('is-invalid');
        }
        });
</script>
@endsection