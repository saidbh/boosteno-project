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
                  <h4 class="card-title m-0">Liste des Agences</h4>
                  <div class="d-flex flex-row">
                    <a href="#" class="btn mx-1 btn-success" data-toggle="modal" data-target="#AddAgency"><i class="ri-add-circle-fill"></i> Ajouter</a>
                    <div class="modal fade" id="AddAgency" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Ajouter agence</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-sm-12">
                                  <form action="{{ route('system-agencies.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                      <div class="col-lg-3">
                                        <div class="iq-card">
                                          <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title w-100">
                                              <div class="row">
                                                <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                                                  <h4 class="card-title m-0">Agence</h4>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="iq-card-body">
                                            <div class="form-group">
                                              <div class="avatar">
                                                <div class="avatar-wrapper">
                                                  <img src="{{ asset('assets/images/user/11.png') }}" alt="" class="profile-pic">
                                                  <div class="upload-button"><i class="ri-camera-line"></i>
                                                  </div>
                                                  <input class="file-upload" name="avatar_add" type="file" accept="image/*" />
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
                                                  <h4 class="card-title m-0"><b>Information Agence</b></h4>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="iq-card-body">
                                            <div class="row">
                                              <div class="form-group col-md-6">
                                                <label class="control-label" for="agency_name"><b>Nom de l'agence </b> </label>
                                                <input type="text" class="form-control" name="agency_name" id="agency_name_add" value="" required />
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label class="control-label" for="company"><b>Société</b></label>
                                                <select id="company" name="company" class="form-control form-control-sm mb-3" required>
                                                    <option value="" >Veillez choisir une société ...</option>
                                                  <option value="company1">Société 1</option>
                                                  <option value="company2">Société 2</option>
                                                </select>
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label class="control-label" for="city"><b>Ville</b></label>
                                                <select id="city" name="city" class="form-control form-control-sm mb-3" required>
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
                                                <label class="control-label" for="address_agency"><b>Adresse</b></label>
                                                <input type="text" class="form-control" name="address_agency" id="address_agency_add" value="" required />
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label class="control-label" for="zip_code"><b>Code postale</b></label>
                                                <input type="text" class="form-control" name="zip_code" id="zip_code_add" value="" required />
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label class="control-label" for="phone"><b>Téléphone</b></label>
                                                <input type="text" class="form-control" name="phone" id="phone_add" value="" required />
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label class="control-label" for="fax"><b>Fax </b></label>
                                                <input type="text" class="form-control" name="fax" id="fax_add" value="" required />
                                              </div>
                                              <div class="form-group col-md-6">
                                                <label class="control-label" for="fax"><b>Email </b></label>
                                                <input type="text" class="form-control" name="email" id="email_add" value="" required />
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
              <table id="agency-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                <thead>
                  <tr class="text-center">
                    <th>Nom de l'agence</th>
                    <th>Société</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Fax</th>
                    <th>Adresse</th>
                    <th>Region</th>
                    <th>Code postale</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($agencies as $agency)
                  <tr class="text-center">
                    <td>{{ $agency->name }}</td>
                    <td>Boosteno</td>
                    <td>{{ $agency->email }}</td>
                    <td>{{ $agency->phone }}</td>
                    <td>{{ $agency->fax }}</td>
                    <td>{{ $agency->address_line }}</td>
                    <td>{{ $agency->city }}</td>
                    <td>{{ $agency->zip_code }}</td>
                    <td>
                      <div class="flex align-items-center list-user-action">
                        <a data-placement="top" title="" data-original-title="Modifier" href="#" data-toggle="modal" data-target="#ModalModify{{ $agency->id }}"><i class="ri-pencil-line"></i></a>
                        <div class="text-left modal fade" id="ModalModify{{ $agency->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modifier agence</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form method="post" action="{{ route('system-agencies.update',[$agency->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="container-fluid">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <div class="row">
                                        <div class="col-lg-3">
                                          <div class="iq-card">
                                            <div class="iq-card-header d-flex justify-content-between">
                                              <div class="iq-header-title w-100">
                                                <div class="row">
                                                  <div
                                                    class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                                                    <h4 class="card-title m-0">Agence</h4>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="iq-card-body">
                                              <div class="form-group">
                                                <div class="avatar">
                                                  <div class="avatar-wrapper">
                                                    <img src="{{ asset('assets/images/user/11.png') }}" alt="" class="profile-pic">
                                                    <div class="upload-button"> <i class="ri-camera-line"></i></div>
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
                                                  <div
                                                    class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                                                    <h4 class="card-title m-0">
                                                      <b>Information Agence</b>
                                                    </h4>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="iq-card-body">
                                              <div class="row">
                                                <div class="form-group col-md-6">
                                                  <label class="control-label" for="agency_name"><b>Nom de l'agence </b> </label>
                                                  <input type="text" class="form-control" name="agency_name" id="agency_name" value="{{ $agency->name }}" required />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="company"><b>Société</b></label>
                                                    <select id="company" name="company" class="form-control form-control-sm mb-3" required>
                                                        <option value="" >Veillez choisir une société ...</option>
                                                      <option value="company1">Société 1</option>
                                                      <option value="company2">Société 2</option>
                                                    </select>
                                                  </div>
                                                <div class="form-group col-md-6">
                                                  <label class="control-label" for="city"><b>Ville</b></label>
                                                  <select id="city" name="city" class="form-control form-control-sm mb-3" required>
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
                                                  <label class="control-label" for="address_agency"><b>Adresse</b></label>
                                                  <input type="text" class="form-control" name="address_agency" id="address_agency" value="{{ $agency->address_line }}" required />
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label class="control-label" for="zip_code"><b>Code postale</b></label>
                                                  <input type="text" class="form-control" name="zip_code" id="zip_code" value="{{ $agency->zip_code }}" required />
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label class="control-label" for="phone"><b>Téléphone</b></label>
                                                  <input type="text" class="form-control" name="phone" id="phone" value="{{ $agency->phone }}" required />
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label class="control-label" for="fax"><b>Fax</b></label>
                                                  <input type="text" class="form-control" name="fax" id="fax" value="{{ $agency->fax }}" required />
                                                </div>
                                                <div class="form-group col-md-6">
                                                  <label class="control-label" for="fax"><b>Email</b></label>
                                                  <input type="text" class="form-control" name="email" id="email" value="{{ $agency->email }}" required />
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-body">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                                  <button type="submit" class="btn btn-danger">Modifier</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <a data-placement="top" title="" data-original-title="Supprimer" href="#" data-toggle="modal" data-target="#ModalDel{{ $agency->id }}"><i class="ri-delete-bin-line"></i></a>
                        <div class="modal fade" id="ModalDel{{ $agency->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Supprimer l'agence {{ $agency->name }} </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="{{ route('system-agencies.destroy',[$agency->id]) }}">
                                  @csrf()
                                  @method('delete')
                                  Voulez-vous vraiment supprimer l'agence {{ $agency->name }} ?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-danger">Confirmer</button>
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

<style>
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
            $('#agency-table').DataTable({
                "columnDefs": [{
                    "targets": [0, 7]
                    , "orderable": false
                }]
                , language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
                }
            });
        });


        /////////////////////////////////////////////////////////

        $('#agency_name').keyup(function(){
            let e = $('#agency_name');
            let l = e.val();
            if(l.length > 3){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });

        //
        $('#address_agency').keyup(function(){
            let e = $('#address_agency');
            let l = e.val();
            if(l.length > 10){
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
            if(l.length > 3){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        //
        $('#phone').keyup(function(){
            let e = $('#phone');
            let l = e.val();
            if(l.length > 7){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        //
        $('#fax').keyup(function(){
            let e = $('#fax');
            let l = e.val();
            if(l.length > 7){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        //
        $('#email').keyup(function(){
            let e = $('#email');
            let l = e.val();
            if(IsEmail(l)){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
            /////
            function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!regex.test(email)) {
                    return false;
                }else{
                    return true;
                }
                }
            /////
        });
        //////////////////////////Add agency modal script ////////////////
        $('#agency_name_add').keyup(function(){
            let e = $('#agency_name_add');
            let l = e.val();
            if(l.length > 3){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });

        //
        $('#address_agency_add').keyup(function(){
            let e = $('#address_agency_add');
            let l = e.val();
            if(l.length > 10){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        //
        $('#zip_code_add').keyup(function(){
            let e = $('#zip_code_add');
            let l = e.val();
            if(l.length > 3){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        //
        $('#phone_add').keyup(function(){
            let e = $('#phone_add');
            let l = e.val();
            if(l.length > 7){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        //
        $('#fax_add').keyup(function(){
            let e = $('#fax_add');
            let l = e.val();
            if(l.length > 7){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
                ///
                $('#email_add').keyup(function(){
            let e = $('#email_add');
            let l = e.val();
            if(IsEmail(l)){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
            /////
            function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!regex.test(email)) {
                    return false;
                }else{
                    return true;
                }
                }
            /////
        });
        ///

</script>
@endsection
