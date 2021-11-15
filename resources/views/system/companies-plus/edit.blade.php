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
        <form action="{{route('system-companies-plus.update',[$company->id])}}" method="post" enctype="multipart/form-data">
          @method('put')
          @csrf
          <div class="row">
            <div class="col-lg-3">
              <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title w-100">
                    <div class="row">
                      <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="card-title m-0">Modifier société</h4>
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
                      <input type="text" class="form-control" name="company_name" id="company_name" value="{{ $company->name }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_altername">Nom alternatif (commercial, marque, ...)</label>
                      <input type="text" class="form-control" name="company_altername" id="company_altername" value="{{ $company->alter_name }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_address">Adresse</label>
                      <input type="text" class="form-control" name="company_address" id="company_address" value="{{ $company->address_line }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_city">Ville</label>
                      <input type="text" class="form-control" name="company_city" id="company_city" value="{{ $company->city }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_zip_code">Code postale</label>
                      <input type="text" class="form-control" name="company_zip_code" id="company_zip_code" value="{{ $company->zip_code }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_country">Pays</label>
                      <input type="text" class="form-control" name="company_country" id="company_country" value="{{ $company->country }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_phone">Téléphone</label>
                      <input type="text" class="form-control" name="company_phone" id="company_phone" value="{{ $company->phone }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_email">Email</label>
                      <input type="text" class="form-control" name="company_email" id="company_email" value="{{ $company->email }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_tax_number">Matricule fiscale</label>
                      <input type="text" class="form-control" name="company_tax_number" id="company_tax_number" value="{{ $company->tax_number }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="bcPaint">Signature</label>
                      <div id="bcPaint"></div>
                    </div>
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

    if (isSupplier.prop('checked') == true) {
      codeSupplier.show();
    }

    if (isClient.prop('checked') == true) {
      codeClient.show();
    }

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
@endsection
