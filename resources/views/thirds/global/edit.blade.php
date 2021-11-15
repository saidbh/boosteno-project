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
        <form action="{{ route('thirds-update', [$third->id]) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" class="form-control" name="users_id" id="thirdid" value="{{ $third->users_id  }}" />
          <div class="row">
            <div class="col-lg-3">
              <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title w-100">
                    <div class="row">
                      <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="card-title m-0">Mise a jour tier</h4>
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
                  <div class="form-group" id="codeSupplier">
                    <label class="control-label" for="code_supplier">Code fournisseur :</label>
                    <input type="text" class="form-control" name="code_supplier" id="code_supplier"
                      value="{{ (old('code_supplier'))?old('code_supplier'):'F'.rand(0,9999).'-'.rand(0, 99999)}}" />
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
                        <h4 class="card-title m-0">Information tier</h4>
                        <a href="{{route('thirds-list')}}" class="btn btn-primary"><i class="ri-arrow-left-fill"></i> Retour</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="iq-card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-wrapper">
                        <label class="form-check-label" for=""><b>Type</b></label>
                        <div class="form-group">
                          @foreach($types as $type)
                            <div class="custom-control custom-radio custom-control-inline">
                              <input class="form-check-input" name="third_type" @if($type->id == 2) checked @endif type="radio" id="{{$type->name}}" value="{{$type->id}}" >
                              <label class="form-check-label" for="{{$type->id}}">{{$type->name}}</label>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-6 d-flex ">
                      <div class="form-wrapper">
                        <label class="form-check-label" for=""><b>Catégories</b></label>
                        <div class="form-group">
                          @foreach($categories as $category)
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="third_category" @if($third->categories_type_id==$category->id) checked @endif type="checkbox" id="is_{{strtolower($category->name)}}" value="{{$category->id}}">
                            <label class="form-check-label" for="is_{{strtolower($category->name)}}">{{$category->name}}</label>
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="clientForm" class="row">
                    <div class="form-group col-md-3">
                      <label for="gender"><b>Genre</b></label>
                      <select id="gender" name="gender" class="form-control form-control-sm mb-3">
                        <option selected value="Male">Mr</option>
                        <option value="Female">Mme</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label class="control-label" for="firstname"><b>Prénom</b></label>
                      <input type="text" class="form-control" name="firstname" id="firstname"
                        value="{{ $third->name }}" />
                    </div>
                    <div class="form-group col-md-3">
                      <label class="control-label" for="lastname"><b>Nom</b></label>
                      <input type="text" class="form-control" name="lastname" id="lastname"
                        value="{{ $third->alter_name }}" />
                    </div>
                    <div class="form-group col-md-3">
                      <label class="control-label" for="birthday"><b>Date naissance</b></label>
                      <input type="date" class="form-control" name="birthday" id="birthday" value="" />
                    </div>
                  </div>
                  <div id="companyForm" class="row">
                    <div class="form-group col-md-4">
                      <label class="control-label" for="company_name"><b>Nom du société</b></label>
                      <input type="text" class="form-control" name="company_name" id="company_name"
                        value="{{ $third->name }}" />
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label" for="company_altername"><b>Nom alternatif (commercial, marque,
                          ...)</b></label>
                      <input type="text" class="form-control" name="company_altername" id="company_altername"
                        value="{{ $third->alter_name }}" />
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label" for="company_tax_number"><b>Matricule fiscale</b></label>
                      <input type="text" class="form-control" name="company_tax_number" id="company_tax_number"
                        value="{{ $third->tax_number }}" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-4">
                      <label class="control-label" for="email"><b>Email</b></label>
                      <input type="text" class="form-control" name="email" id="email" value="{{ $third->email }}" />
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label" for="phone"><b>Téléphone</b></label>
                      <input type="text" class="form-control" name="phone" id="phone" value="{{ $third->phone }}" />
                    </div>
                    <div class="form-group col-md-4" id="phonefix">
                      <label class="control-label" for="fix"><b>Téléphone fix</b></label>
                      <input type="text" class="form-control" name="fix" id="fix" value="{{ $third->fixed_phone }}" />
                    </div>
                    <div class="form-group col-md-4" id="phonefax">
                      <label class="control-label" for="Fax"><b>Fax</b> </label>
                      <input type="text" class="form-control" name="Fax" id="Fax" value="{{ $third->fax_phone }}" />
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label" for="address"><b>Adresse</b></label>
                      <input type="text" class="form-control" name="address" id="address"
                        value="{{ $third->address_line }}" />
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label" for="country"><b>Pays</b></label>
                      <input type="text" class="form-control" name="country" id="country"
                        value="{{ $third->country }}" />
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label" for="city"><b>Ville</b></label>
                      <input type="text" class="form-control" name="city" id="city" value="{{ $third->city }}" />
                    </div>
                    <div class="form-group col-md-4">
                      <label class="control-label" for="zip_code"><b>Code postale</b></label>
                      <input type="text" class="form-control" name="zip_code" id="zip_code"
                        value="{{ $third->zip_code }}" />
                    </div>
                  </div>
                  <h5 class="m-0"><b>Documents</b></h5>
                  <div class="row">
                    <div class="form-group col-md-12">
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
                  <div class="row">
                    <div class="col-md-12 d-flex flex-row justify-content-end">
                      <button type="reset" class="btn mr-2 iq-bg-danger">Annuler</button>
                      <button type="submit" class="btn iq-bg-success">Modifier</button>
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
//

//
<script>
  $(function() {
            // Multiple images preview in browser
  var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
              var filesAmount = input.files.length;
              for (i = 0; i < filesAmount; i++) {
                  var reader = new FileReader();
                  reader.onload = function(event) {
                      $($.parseHTML('<img class="hover01" width="70" height="70" onclick="remove(this)">&nbsp;&nbsp;')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                  }
                  reader.readAsDataURL(input.files[i]);
              }
          }
      };

      $('#documentHolder').on('change', function() {
          imagesPreview(this, 'div.gallery');
      });
  });

  function remove(el) {
    var element = el;
    element.remove();
  }
///////////////////////

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
        $('#company_name').keyup(function(){
            let e = $('#company_name');
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
        $('#company_altername').keyup(function(){
            let e = $('#company_altername');
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
            if(l.length > 4){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
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
        $('#fix').keyup(function(){
            let e = $('#fix');
            let l = e.val();
            if(l.length > 7){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        /////
        $('#Fax').keyup(function(){
            let e = $('#Fax');
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
            if(l.length > 4){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
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

<script>
$(document).ready(function() {

  var codeClient = $('#codeClient');
  var codeSupplier = $('#codeSupplier');
  var isProspect = $('#is_prospect');
  var isClient = $('#is_client');
  var isSupplier = $('#is_fournisseur');
  var Particulier = $('#Particulier');
  var Entreprise =$('#Entreprise');
  var companyForm = $('#companyForm');
  var clientForm = $('#clientForm');
  var phonefax =$('#phonefax');
  var phonefix = $('#phonefix');
  Entreprise.prop('checked', true);
  companyForm.show();
  clientForm.hide();
  phonefax.show();
  phonefix.show();
  Particulier.on('click', function() {

isProspect.prop('disabled', false);
isClient.prop('disabled', false);
isSupplier.prop('disabled', true);

isProspect.prop('checked', false);
isClient.prop('checked', true);
isSupplier.prop('checked', false);

codeSupplier.hide();
codeClient.hide();

companyForm.hide();
clientForm.show();

  phonefax.hide();
  phonefix.hide();

})

Entreprise.on('click', function () {
  isProspect.prop('disabled', false);
  isClient.prop('disabled', false);
  isSupplier.prop('disabled', false);

  isProspect.prop('checked', false);
  isClient.prop('checked', false);
  isSupplier.prop('checked', true);

  codeSupplier.show();
  codeClient.hide();

  companyForm.show();
  clientForm.hide();

  phonefax.show();
phonefix.show();

})

isClient.on('change', function() {
  if ($(this).prop('checked') == true) {
    //isProspect.prop('checked', false);
    //isSupplier.prop('checked', false);
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
@endsection
