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
        <form action="{{route('system-companies-plus.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-lg-3">
              <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title w-100">
                    <div class="row">
                      <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="card-title m-0">Nouvelle société</h4>
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
                        <input class="file-upload" type="file" accept="image/*" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group" id="codeClient">
                    <label class="control-label" for="code_client">Code client</label>
                    <input type="text" class="form-control" name="code_client" id="code_client" value="{{ (old('code_client'))?old('code_client'):'C'.rand(0,9999).'-'.rand(0, 99999)}}" />
                  </div>
                  <div class="form-group" id="codeSupplier">
                    <label class="control-label" for="code_supplier">Code fournisseur</label>
                    <input type="text" class="form-control" name="code_supplier" id="code_supplier" value="{{ (old('code_supplier'))?old('code_supplier'):'F'.rand(0,9999).'-'.rand(0, 99999)}}" />
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
                        <h4 class="card-title m-0">Information société</h4>
                        <a href="{{route('system-companies-plus')}}" class="btn btn-primary"><i class="ri-arrow-left-fill"></i> Retour</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="iq-card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_name">Nom du société</label>
                      <input type="text" class="form-control" name="company_name" id="company_name" value="{{ old('company_name') }}" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_altername">Nom alternatif (commercial, marque, ...)</label>
                      <input type="text" class="form-control" name="company_altername" id="company_altername" value="{{ old('company_altername') }}" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_address">Adresse</label>
                      <input type="text" class="form-control" name="company_address" id="company_address" value="{{ old('company_address') }}" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_city">Ville</label>
                      <input type="text" class="form-control" name="company_city" id="company_city" value="{{ old('company_city') }}" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_zip_code">Code postale</label>
                      <input type="text" class="form-control" name="company_zip_code" id="company_zip_code" value="{{ old('company_zip_code') }}" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_country">Pays</label>
                      <input type="text" class="form-control" name="company_country" id="company_country" value="{{ old('company_country') }}" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_phone">Téléphone</label>
                      <input type="text" class="form-control" name="company_phone" id="company_phone" value="{{ old('company_phone') }}" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_email">Email</label>
                      <input type="text" class="form-control" name="company_email" id="company_email" value="{{ old('company_email') }}" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_tax_number">Matricule fiscale</label>
                      <input type="text" class="form-control" name="company_tax_number" id="company_tax_number" value="{{ old('company_tax_number') }}" required/>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="bcPaint">Signature</label>
                      <div id="bcPaint"></div>
                    </div>
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
  $(document).ready(function() {
    $('#bcPaint').bcPaint();

    var codeClient = $('#codeClient');
    var codeSupplier = $('#codeSupplier');

    codeClient.hide();
    codeSupplier.hide();

    var isProspect = $('#is_prospect');
    var isClient = $('#is_client');
    var isSupplier = $('#is_supplier');

    isClient.on('change', function() {
      if ($(this).prop('checked') == true) {
        isProspect.prop('checked', false);
        isSupplier.prop('checked', false);
        codeClient.show();
        codeSupplier.hide();
      }
    })

    isSupplier.on('change', function() {
      if ($(this).prop('checked') == true) {
        isProspect.prop('checked', false);
        isClient.prop('checked', false);
        codeSupplier.show();
        codeClient.hide();
      }
    })

    isProspect.on('change', function() {
      if ($(this).prop('checked') == true) {
        isSupplier.prop('checked', false);
        isClient.prop('checked', false);
        codeClient.hide();
        codeSupplier.hide();
      }
    })

  });

</script>
<script>
      ////////////
  $(document).ready(function(){
            /////
            $('#company_name').keyup(function(){
            let e = $('#company_name');
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
        $('#company_altername').keyup(function(){
            let e = $('#company_altername');
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
        $('#company_city').keyup(function(){
            let e = $('#company_city');
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
        $('#company_email').keyup(function(){
            let e = $('#company_email');
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
        $('#company_zip_code').keyup(function(){
            let e = $('#company_zip_code');
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
        $('#company_address').keyup(function(){
            let e = $('#company_address');
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
        $('#company_country').keyup(function(){
            let e = $('#company_country');
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
        $('#company_tax_number').keyup(function(){
            let e = $('#company_tax_number');
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
        $('#company_phone').keyup(function(){
            let e = $('#company_phone');
            let l = e.val();
            if(l.length > 7){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
  });

  ////////////
</script>
@endsection
