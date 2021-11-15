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
        <form action="{{ route('contacts-store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-lg-3">
              <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title w-100">
                    <div class="row">
                      <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="card-title m-0">Nouveau Contact</h4>
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
                        <h4 class="card-title m-0"><b>Information Contact</b></h4>
                        <a href="#" class="btn btn-primary"><i class="ri-arrow-left-fill"></i> Retour</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="iq-card-body">
                  <div class="row">
                    <div class="form-group col-md-6 d-flex ">
                      <div class="form-wrapper">
                        <label class="form-check-label" for=""><b>Catégories</b></label>
                        <div class="form-group">
                          @foreach($categories as $category)
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="contact_category" @if(old('contact_category')==$category->id) checked @endif type="checkbox" id="is_{{strtolower($category->name)}}" value="{{$category->id}}">
                            <label class="form-check-label" for="is_{{strtolower($category->name)}}">{{$category->name}}</label>
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label class="control-label" for="firstname"><b>Nom</b> </label>
                      <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="lastname"><b>Prénom</b></label>
                      <input type="text" class="form-control" name="family" id="family" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="gender"><b>Titre civilité</b></label>
                      <select id="gender" name="gender" class="form-control form-control-sm mb-3">
                        <option value="Female" selected><b>Madame</b></option>
                        <option value="Male" selected>Monsieur</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="third"><b>Société</b></label>
                      <select id="third" name="third" class="form-control form-control-sm mb-3">
                        <option value="">Sélectionner une société</option>
                        @foreach($thirds as $third)
                        <option value="{{ $third->id }}">{{ $third->name }}-{{ $third->alter_name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="birthday"><b>Poste/fonction</b></label>
                      <input type="text" class="form-control" name="position" id="position" value="" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="email"><b>Email</b></label>
                      <input type="text" class="form-control" name="email" id="email" value="" required/>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label class="control-label" for="phone"><b>Téléphone</b></label>
                      <input type="text" class="form-control" name="phone" id="phone" value="" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="address"><b>Adresse</b></label>
                      <input type="text" class="form-control" name="address" id="address" value="" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="country"><b>Pays</b></label>
                      <input type="text" class="form-control" name="country" id="country" value="" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="city"><b>Ville</b></label>
                      <input type="text" class="form-control" name="city" id="city" value="" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="zip_code"><b>Code postale</b></label>
                      <input type="text" class="form-control" name="zip_code" id="zip_code" value="" required/>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-12 d-flex flex-row justify-content-end">
                      <button type="reset" class="btn mr-2 iq-bg-danger">Annuler</button>
                      <button type="submit" class="btn iq-bg-success">Ajouter</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<style>
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
  $(document).ready(function(){
    var isProspect = $('#is_prospect');
    var isClient = $('#is_client');
    var isSupplier = $('#is_fournisseur');

    isClient.on('change', function() {
      if ($(this).prop('checked') == true) {
        isProspect.prop('checked', false);
        isSupplier.prop('checked', false);
      }
    })

    isSupplier.on('change', function() {
      if ($(this).prop('checked') == true) {
        isProspect.prop('checked', false);
        isClient.prop('checked', false);
      }
    })

    isProspect.on('change', function() {
      if ($(this).prop('checked') == true) {
        isSupplier.prop('checked', false);
        isClient.prop('checked', false);
      }
    })


  })
  ////// this part is for inputs controle ////
  $(document).ready(function(){
      /////
      $('#name').keyup(function(){
            let e = $('#name');
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
        $('#family').keyup(function(){
            let e = $('#family');
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
        $('#position').keyup(function(){
            let e = $('#position');
            let l = e.val();
            if(l.length > 4){
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
        ///
        $('#address').keyup(function(){
            let e = $('#address');
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
        $('#country').keyup(function(){
            let e = $('#country');
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
</script>
@endsection
