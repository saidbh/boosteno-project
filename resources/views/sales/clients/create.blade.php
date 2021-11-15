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
        <form action="{{route('clients.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-lg-3">
              <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title w-100">
                    <div class="row">
                      <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="card-title m-0">Nouveau client</h4>
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
                  <div class="form-group">
                    <label for="third_type">Catégorie tier :</label>
                    <select id="third_type" name="third_type" class="form-control form-control-sm mb-3">
                      <option value="individual">Particulier</option>
                      <option selected value="company">Entreprise</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="code_client">Code client :</label>
                    <input type="text" disabled class="form-control" name="code_client" id="code_client" value="{{ (old('code_client'))?old('code_client'):'C'.rand(0,9999).'-'.rand(0, 99999)}}" placeholder="" />
                  </div>
                </div>
              </div>
            </div>

            <div id="companyInfo" class="col-lg-9 ml-auto">
              <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title w-100">
                    <div class="row">
                      <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="card-title m-0">Information entreprise</h4>
                        <a href="{{route('sales-clients')}}" class="btn btn-primary"><i class="ri-arrow-left-fill"></i> Retour</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="iq-card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_name">Nom du société :</label>
                      <input type="text" class="form-control" name="company_name" id="company_name" value="{{ old('company_name') }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_altername">Nom alternatif (commercial, marque, ...) :</label>
                      <input type="text" class="form-control" name="company_altername" id="company_altername" value="{{ old('company_altername') }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_address">Adresse :</label>
                      <input type="text" class="form-control" name="company_address" id="company_address" value="{{ old('company_address') }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_city">Ville :</label>
                      <input type="text" class="form-control" name="company_city" id="company_city" value="{{ old('company_city') }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_zip_code">Code postale :</label>
                      <input type="text" class="form-control" name="company_zip_code" id="company_zip_code" value="{{ old('company_zip_code') }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_country">Pays :</label>
                      <input type="text" class="form-control" name="company_country" id="company_country" value="{{ old('company_country') }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_phone">Téléphone :</label>
                      <input type="text" class="form-control" name="company_phone" id="company_phone" value="{{ old('company_phone') }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_email">Email :</label>
                      <input type="text" class="form-control" name="company_email" id="company_email" value="{{ old('company_email') }}" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="company_tax_number">Matricule fiscale :</label>
                      <input type="text" class="form-control" name="company_tax_number" id="company_tax_number" value="{{ old('company_tax_number') }}" />
                    </div>
                    <div class="col-lg-12 d-flex flex-row justify-content-end">
                      <button type="reset" class="btn mr-2 iq-bg-danger">Annuler</button>
                      <button type="submit" class="btn iq-bg-success">Ajouter</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div id="userInfo" class="col-lg-9 ml-auto">
              <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title w-100">
                    <div class="row">
                      <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="card-title m-0">Information client</h4>
                        <a href="{{route('sales-clients')}}" class="btn btn-primary"><i class="ri-arrow-left-fill"></i> Retour</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="iq-card-body">
                  <div class="row">
                    <div class="form-group col-md-2">
                      <label for="gender">Genre :</label>
                      <select id="gender" name="gender" class="form-control form-control-sm mb-3">
                        <option selected value="Male">Mr</option>
                        <option value="Female">Mme</option>
                      </select>
                    </div>
                    <div class="form-group col-md-5">
                      <label class="control-label" for="first_name">Nom :</label>
                      <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="" />
                    </div>
                    <div class="form-group col-md-5">
                      <label class="control-label" for="last_name">Prénom :</label>
                      <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="contact_address">Adresse :</label>
                      <input type="text" class="form-control" name="contact_address" id="contact_address" value="{{ old('contact_address') }}" placeholder="" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="contact_city">Ville :</label>
                      <input type="text" class="form-control" name="contact_city" id="contact_city" value="{{ old('contact_city') }}" placeholder="" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="contact_zip_code">Code postale :</label>
                      <input type="text" class="form-control" name="contact_zip_code" id="contact_zip_code" value="{{ old('contact_zip_code') }}" placeholder="" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="contact_country">Pays :</label>
                      <input type="text" class="form-control" name="contact_country" id="contact_country" value="{{ old('contact_country') }}" placeholder="" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="contact_phone">Téléphone :</label>
                      <input type="text" class="form-control" name="contact_phone" id="contact_phone" value="{{ old('contact_phone') }}" placeholder="" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="contact_email">Email :</label>
                      <input type="text" class="form-control" name="contact_email" id="contact_email" value="{{ old('contact_email') }}" placeholder="" />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="contact_birthday">Date naissance :</label>
                      <input type="date" class="form-control" name="contact_birthday" id="contact_birthday" value="{{ old('contact_email') }}" placeholder="" />
                    </div>
                    <div class="col-lg-12 d-flex flex-row justify-content-end">
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
<script>
  $(document).ready(function() {
    $('#userInfo').hide();
    $('#third_type').change(function(e) {
      if (e.target.value == "individual") {
        $('#companyInfo').hide();
        $('#userInfo').show();
      }
      if (e.target.value == "company") {
        $('#companyInfo').show();
        $('#userInfo').hide();
      }
    });
  });

</script>
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
@endsection
