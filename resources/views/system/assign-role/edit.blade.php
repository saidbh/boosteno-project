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
        <form action="{{route('system-assign-role.update',[$user->id])}}" method="post">
          @method('put')
          @csrf
          <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
              <div class="iq-header-title w-100">
                <div class="row">
                  <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="card-title m-0">Modifier utilisateur</h4>
                    <a href="{{route('system-assign-role')}}" class="btn btn-primary"><i class="ri-arrow-left-fill"></i> Retour</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="iq-card-body">
              <div class="row">
                <div class="form-group col-md-12 d-flex justify-content-center">
                  <div class="form-wrapper">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="is_client" type="checkbox" id="isClient" value="true" @if($user->contact) checked @endif>
                      <label class="form-check-label" for="is_client">Client</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="is_employee" type="checkbox" id="isEmployee" value="true" @if($user->employee!=null && $user->employee->teacher==null) checked @endif>
                      <label class="form-check-label" for="is_employee">employé</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="is_teacher" type="checkbox" id="isTeacher" value="true" @if($user->employee!=null && $user->employee->teacher!=null) checked @endif>
                      <label class="form-check-label" for="is_teacher">Enseignant</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div id="clientForm" class="row">
                    <div class="form-group col-md-6">
                      <label class="control-label" for="firstname">Prénom</label>
                      <input type="text" class="form-control" name="firstname" id="firstname" @if($user->contact !=null || $user->employee != null)
                      value="{{($user->contact)?$user->contact->first_name:$user->employee->first_name}}"
                      @endif  />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="lastname">Nom</label>
                      <input type="text" class="form-control" name="lastname" id="lastname" @if($user->contact !=null || $user->employee != null)
                      value="{{($user->contact)?$user->contact->last_name:$user->employee->last_name}}"
                      @endif  />
                    </div>
                    <div class="form-group col-md-6">
                      <label for="gender">Genre</label>
                      <select id="gender" name="gender" class="form-control form-control-sm mb-3">
                        <option @if(($user->contact!=null && $user->contact->gender == 'Male') || ($user->employee!=null && $user->employee->gender == 'Male')) selected @endif value="Male">Mr</option>
                        <option @if(($user->contact!=null && $user->contact->gender == 'Female') || ($user->employee!=null && $user->employee->gender == 'Female')) selected @endif value="Female">Mme</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="birthday">Date naissance</label>
                      <input type="date" class="form-control" name="birthday" id="birthday" 
                        @if($user->contact !=null || $user->employee != null)
                        value="{{($user->contact)?$user->contact->birthday:$user->employee->birthday}}"
                        @endif  />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="email">Email</label>
                      <input type="text" name="email" class="form-control mb-0" id="email"
                        @if($user->contact !=null || $user->employee != null)
                        value="{{$user->email}}"
                        @endif  />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="phone">Téléphone</label>
                      <input type="text" name="phone" class="form-control mb-0" id="phone" @if($user->contact !=null || $user->employee != null)
                      value="{{$user->phone}}"
                      @endif  />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="address">Adresse</label>
                      <input type="text" class="form-control" name="address" id="address" @if($user->contact !=null || $user->employee != null)
                      value="{{($user->contact)?$user->contact->address_line:$user->employee->address_line}}"
                      @endif  />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="city">Ville</label>
                      <input type="text" class="form-control" name="city" id="city" @if($user->contact !=null || $user->employee != null)
                      value="{{($user->contact)?$user->contact->city:$user->employee->city}}"
                      @endif  />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="zip_code">Code postale</label>
                      <input type="text" class="form-control" name="zip_code" id="zip_code" @if($user->contact !=null || $user->employee != null)
                      value="{{($user->contact)?$user->contact->zip_code:$user->employee->zip_code}}"
                      @endif  />
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="country">Pays</label>
                      <input type="text" class="form-control" name="country" id="country" @if($user->contact !=null || $user->employee != null)
                      value="{{($user->contact)?$user->contact->country:$user->employee->country}}"
                      @endif  />
                    </div>
                  </div>
                </div>
              </div>
              <h5 class="mb-3">Sécurité</h5>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="control-label" for="password">Mot de passe</label>
                  <input type="password" name="password" class="form-control mb-0" id="password" value="{{ old('password') }}">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label" for="confPassword">Confirmer mot de passe</label>
                  <input type="password" name="confPassword" class="form-control mb-0" id="confPassword" value="{{ old('confPassword') }}">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label" for="assignRole">Assigné Rôle</label>
                  <select class="form-control" id="assignRole" name="assignRole">
                    <option selected disabled>Choisir un rôle...</option>
                    @foreach($roles as $role)
                    <option @if($user->userRole != null && $user->userRole->roles_id == $role->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <h5 class="mb-3">Compte</h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-check">
                    <input type="hidden" name="activated" value="0">
                    <input class="form-check-input" type="checkbox" name="activated" id="activated" value="1" @if($user->activated) checked @endif>
                    <label class="form-check-label" for="activated">Activé</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-check">
                    <input type="hidden" name="blocked" value="0">
                    <input class="form-check-input" type="checkbox" name="blocked" id="blocked" value="1" @if($user->blocked) checked @endif>
                    <label class="form-check-label" for="blocked">Bloqué</label>
                  </div>
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
        </form>
      </div>

    </div>
  </div>
</div>
@endsection
