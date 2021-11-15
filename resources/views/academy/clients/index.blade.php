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
                                        <h4 class="card-title m-0">Liste des Etudiants</h4>
                                        <div class="d-flex flex-row">
                                            <a href="{{ route('academy-clients.create') }}" class="btn btn-success"
                                                data-toggle="modal" data-target="#AddClients"><i class="ri-add-line"></i>
                                                Nouveau</a>
                                            <a href="#" class="btn mx-1 btn-primary">PDF</a>
                                            <a href="#" class="btn btn-primary">Excel</a>
                                            <a href="#" class="btn ml-1 btn-primary">Imprimer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <!--List of clients start-->
                            <div class="table-responsive">
                                <table id="Clients-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                                  <thead>
                                    <tr class="text-center">
                                      <th>ID</th>
                                      <th><a class="text-dark" href="#" data-toggle="tooltip" data-placement="top" title="Code client">CC</a></th>
                                      <th>Nom</th>
                                      <th>Email</th>
                                      <th>Téléphone</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($clients as $client)
                                    <tr class="text-center">
                                      <td>{{ $client->id }}</td>
                                      <td>{{ $client->code_client }}</td>
                                      <td>{{ $client->first_name }} {{ $client->last_name }}</td>
                                      <td>{{ $client->email }}</td>
                                      <td>{{ $client->phone }}</td>
                                      <td>
                                        <div class="flex align-items-center list-user-action">
                                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Consulter" href="{{ route('Client_profile') }}"><i class="ri-eye-line"></i></a>
                                          <a data-placement="top" title="" data-original-title="Modifier" href="#" data-toggle="modal" data-target="#Editclient{{$client->id}}"><i class="ri-pencil-line"></i></a>
                                          <a data-placement="top" title="" data-original-title="Supprimer" href="#" data-toggle="modal" data-target="#ModalDel{{$client->id}}"><i class="ri-delete-bin-line"></i></a>
                                        </div>
                                      </td>
                                    </tr>
                                    <!--Modals start-->
                                              <!--edit client modal start-->
                                              <div class="modal fade bd-example-modal-xl" id="Editclient{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modifier Client</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!--form edit client start-->
                                                            <form method="post" action="{{ route('academy-clients.update',[$client->id]) }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('put')
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-lg-3">
                                                                        <div class="iq-card">
                                                                            <div class="iq-card-header d-flex justify-content-between">
                                                                            <div class="iq-header-title w-100">
                                                                                <div class="row">
                                                                                <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                                                                                    <h4 class="card-title m-0">Clients</h4>
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
                                                                                    <h4 class="card-title m-0">Information Clients</h4>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                            <div class="iq-card-body">
                                                                            <div class="row">
                                                                                <div class="form-group col-lg-2">
                                                                                <label for="gender"><b>Genre</b></label>
                                                                                <select id="gender" name="gender" class="form-control form-control-sm mb-3" required>
                                                                                    <option selected value="Male">Mr</option>
                                                                                    <option value="Female">Mme</option>
                                                                                </select>
                                                                                </div>
                                                                                <div class="form-group col-lg-5">
                                                                                <label class="control-label" for="firstname"><b>Prénom</b></label>
                                                                                <input type="text" class="form-control" name="firstname" id="firstname_update"
                                                                                    value="{{ $client->first_name }}" required/>
                                                                                </div>
                                                                                <div class="form-group col-lg-5">
                                                                                <label class="control-label" for="lastname"><b>Nom</b></label>
                                                                                <input type="text" class="form-control" name="lastname" id="lastname_update"
                                                                                    value="{{ $client->last_name }}" required/>
                                                                                </div>
                                                                                <div class="form-group col-lg-6">
                                                                                <label class="control-label" for="birthday"><b>Date naissance</b></label>
                                                                                <input type="date" class="form-control" name="birthday" id="birthday_update"
                                                                                    value="{{ old('birthday') }}" required/>
                                                                                </div>
                                                                                <div class="form-group col-lg-6">
                                                                                    <label class="control-label" for="email"><b>Email</b></label>
                                                                                    <input type="text" class="form-control" name="email" id="email_update" value="{{ $client->email }}" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="form-group col-lg-6">
                                                                                <label class="control-label" for="phone"><b>Téléphone</b></label>
                                                                                <input type="text" class="form-control" name="phone" id="phone_update" value="{{ $client->phone }}" required/>
                                                                                </div>
                                                                                <div class="form-group col-lg-6">
                                                                                <label class="control-label" for="address"><b>Adresse</b></label>
                                                                                <input type="text" class="form-control" name="address" id="address_update"
                                                                                    value="{{ $client->address_line }}" required/>
                                                                                </div>
                                                                                <div class="form-group col-lg-6">
                                                                                <label class="control-label" for="country"><b>Pays</b></label>
                                                                                <select id="country_update" name="country" class="form-control form-control-sm mb-3" required>
                                                                                    <option selected>Tunisie</option>
                                                                                </select>
                                                                                </div>
                                                                                <div class="form-group col-lg-6">
                                                                                <label class="control-label" for="city"><b>Ville</b></label>
                                                                                <select id="city_update" name="city" class="form-control form-control-sm mb-3" required>
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
                                                                                <div class="form-group col-lg-6">
                                                                                <label class="control-label" for="zip_code"><b>Code postale</b></label>
                                                                                <input type="text" class="form-control" name="zip_code" id="zip_code_update"
                                                                                    value="{{ $client->zip_code }}" required/>
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="mb-3">Documents</h5>
                                                                            <div class="row">
                                                                                <div class="form-group col-lg-12">
                                                                                <div id="dragndrop" class="drag-n-drop">
                                                                                    <div class="drop-wrapper">
                                                                                    <span class="drop-icon text-primary"><i class="ri-upload-cloud-fill"></i></span>
                                                                                    <div class="drop-text">
                                                                                        <p id="text-desc" class="m-0">Glisser ici pour télécharger le fichier</p>
                                                                                        <p class="m-0"><b>ou</b></p>
                                                                                        <label for="documentUpload" id="openUploader_update" class="btn iq-bg-primary">cliquez ici</label>
                                                                                        <input style="display:none;" name="documents[]" type="file" id="documentHolder" multiple="">
                                                                                    </div>
                                                                                    </div>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="container">
                                                                                <div class="row d-flex gallery">
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!--inputs end here-->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn mr-2 iq-bg-danger" data-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn iq-bg-success">Mise a jour</button>
                                                        </div>
                                                        <!--form edit client end-->
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--edit client modal end-->
                                          <!--Modal del start-->
                                          <div class="modal fade" id="ModalDel{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Supprimer le client {{ $client->first_name }} {{ $client->last_name }}</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <form action="{{  route('academy-clients.destroy', [$client->id]) }}" method="POST">
                                                  @csrf
                                                  @method('delete')
                                                  <div class="modal-body">
                                                    Vous êtes sûr de vouloir supprimer le client {{ $client->first_name }} {{ $client->last_name }} ?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn mr-2 btn-primary" data-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                  </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                          <!--Modal del end-->
                                    <!--Modals end-->
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                            <!--List of clients end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal start-->
    <!--add client modal start-->
    <div class="modal fade bd-example-modal-xl" id="AddClients" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ajouter Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--form add client start-->
                    <form method="post" action="{{ route('academy-clients.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-3">
                                  <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between">
                                      <div class="iq-header-title w-100">
                                        <div class="row">
                                          <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                                            <h4 class="card-title m-0">Nouveau Clients</h4>
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
                                      <div class="form-group" id="codeClient">
                                        <label class="control-label" for="code_client">Code client :</label>
                                        <input type="text" class="form-control" name="code_client" id="code_client"
                                          value="{{ (old('code_client'))?old('code_client'):'C'.rand(0,9999).'-'.rand(0, 99999)}}" />
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
                                            <h4 class="card-title m-0">Information Clients</h4>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="iq-card-body">
                                      <div class="row">
                                        <div class="form-group col-lg-2">
                                          <label for="gender"><b>Genre</b></label>
                                          <select id="gender" name="gender" class="form-control form-control-sm mb-3" required>
                                            <option selected value="Male">Mr</option>
                                            <option value="Female">Mme</option>
                                          </select>
                                        </div>
                                        <div class="form-group col-lg-5">
                                          <label class="control-label" for="firstname"><b>Prénom</b></label>
                                          <input type="text" class="form-control" name="firstname" id="firstname"
                                            value="{{ old('firstname') }}" required/>
                                        </div>
                                        <div class="form-group col-lg-5">
                                          <label class="control-label" for="lastname"><b>Nom</b></label>
                                          <input type="text" class="form-control" name="lastname" id="lastname"
                                            value="{{ old('lastname') }}" required/>
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <label class="control-label" for="birthday"><b>Date naissance</b></label>
                                          <input type="date" class="form-control" name="birthday" id="birthday"
                                            value="{{ old('birthday') }}" required/>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="control-label" for="email"><b>Email</b></label>
                                            <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" required/>
                                          </div>
                                      </div>
                                      <div class="row">
                                        <div class="form-group col-lg-6">
                                          <label class="control-label" for="phone"><b>Téléphone</b></label>
                                          <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" required/>
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <label class="control-label" for="address"><b>Adresse</b></label>
                                          <input type="text" class="form-control" name="address" id="address"
                                            value="{{ old('address') }}" required/>
                                        </div>
                                        <div class="form-group col-lg-6">
                                          <label class="control-label" for="country"><b>Pays</b></label>
                                          <select id="country" name="country" class="form-control form-control-sm mb-3" required>
                                            <option selected>Tunisie</option>
                                          </select>
                                        </div>
                                        <div class="form-group col-lg-6">
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
                                        <div class="form-group col-lg-6">
                                          <label class="control-label" for="zip_code"><b>Code postale</b></label>
                                          <input type="text" class="form-control" name="zip_code" id="zip_code"
                                            value="{{ old('zip_code') }}" required/>
                                        </div>
                                      </div>
                                      <h5 class="mb-3">Documents</h5>
                                      <div class="row">
                                        <div class="form-group col-lg-12">
                                          <div id="dragndrop" class="drag-n-drop">
                                            <div class="drop-wrapper">
                                              <span class="drop-icon text-primary"><i class="ri-upload-cloud-fill"></i></span>
                                              <div class="drop-text">
                                                <p id="text-desc" class="m-0">Glisser ici pour télécharger le fichier</p>
                                                <p class="m-0"><b>ou</b></p>
                                                <label for="documentUpload" id="openUploader" class="btn iq-bg-primary">cliquez ici</label>
                                                <input style="display:none;" name="documents[]" type="file" id="documentHolder" multiple="">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="container">
                                        <div class="row d-flex gallery">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>

                        <!--inputs end here-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mr-2 iq-bg-danger" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn iq-bg-success">Ajouter</button>
                </div>
                <!--form add client end-->
            </div>
        </div>
    </div>
    <!--Add client modal end-->
    <!--Modal end-->
    <script>
        $(document).ready(function() {
          $('#Clients-table').DataTable({
            "columnDefs": [{
              "targets": [0, 5]
              , "orderable": false
            }]
            , language: {
              url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
            }
          });
        });
      </script>
    <style>
        /* Zoom In #1 */
        /* Zoom In #1 */
        .hover01 {
          -webkit-transform: scale(1);
          transform: scale(1);
          -webkit-transition: .3s ease-in-out;
          transition: .3s ease-in-out;
        }
        .hover01:hover {
          -webkit-transform: scale(1.3);
          transform: scale(1.3);
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
      <!--Scripts start here-->
      <script>
              $(document).ready(function(){
      /////
      $('#firstname').keyup(function(){
            let e = $('#firstname');
            let l = e.val();
            if(l.length > 3){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ////
        $('#lastname').keyup(function(){
            let e = $('#lastname');
            let l = e.val();
            if(l.length > 3){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ///
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
        ///
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
        ////
        $('#address').keyup(function(){
            let e = $('#address');
            let l = e.val();
            if(l.length > 8){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ////
        ////
        $('#city').keyup(function(){
            let e = $('#city');
            let l = e.val();
            if(l.length > 3){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ////
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
    });
    /////////////////////////////////////////////////////////
    $(document).ready(function(){
      /////
      $('#firstname_update').keyup(function(){
            let e = $('#firstname_update');
            let l = e.val();
            if(l.length > 3){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ////
        $('#lastname_update').keyup(function(){
            let e = $('#lastname_update');
            let l = e.val();
            if(l.length > 3){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ///
        $('#email_update').keyup(function(){
            let e = $('#email_update');
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
        $('#phone_update').keyup(function(){
            let e = $('#phone_update');
            let l = e.val();
            if(l.length > 7){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ////
        $('#address_update').keyup(function(){
            let e = $('#address_update');
            let l = e.val();
            if(l.length > 8){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ////
        ////
        $('#city_update').keyup(function(){
            let e = $('#city_update');
            let l = e.val();
            if(l.length > 3){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        ////
        $('#zip_code_update').keyup(function(){
            let e = $('#zip_code_update');
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
    ////////////////////////////////////////////////////////
      </script>
      <!--Scripts end here-->
      <script>
        $(document).ready(function() {
          $('#contact-table').DataTable({
            "columnDefs": [{
              "targets": [0, 6]
              , "orderable": false
            }]
            , language: {
              url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
            }
          });
        });
      </script>

@endsection
