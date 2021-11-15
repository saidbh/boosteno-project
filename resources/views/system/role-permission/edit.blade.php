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
                  <h4 class="card-title m-0">Modifier Rôle {{$role->name}}</h4>
                  <a href="{{route('system-role-permission')}}" class="btn btn-primary"><i class="ri-arrow-left-fill"></i> Retour</a>
                </div>
              </div>
            </div>
          </div>
          <div class="iq-card-body">
            <form method="POST" action="{{route('system-role-permission.update',[$role->id])}}">
              @csrf
              @method('put')
              <div class="row">
                <div class="form-group col-sm-12">
                  <label for="rolename">Nom du rôle</label>
                  <input type="text" class="form-control" name="rolename" id="rolename" value="{{$role->name}}" />
                </div>
                <div class="form-group col-sm-12">
                  <label for="roledesc">Description du rôle</label>
                  <textarea type="text" class="form-control" name="roledesc" id="roledesc">{{$role->description}}</textarea>
                </div>
                <div class="col-sm-12 permissions">
                  <label for="Access" class="col-form-label">Access et permission</label>
                  <div class="accordion" id="Access">
                    @foreach($cats as $cat)
                    <div class="iq-card shadow-none m-0">
                      <div class="iq-card-header d-flex" id="_{{$cat['link']}}">
                        <div class="row w-100 align-items-center justify-content-between">
                          <div class="col-auto">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#_{{$cat['link']}}" aria-expanded="true" aria-controls="_{{$cat['link']}}">
                              {{$cat['title']}}
                            </button>
                          </div>
                          <div class="col-auto">
                            <div class="form-group form-check m-0">
                              <input type="hidden" name="access[{{$cat['link']}}]" value="0" id="access_{{$cat['link']}}">
                              <input type="checkbox" {{($cat['able'])?'checked':null}} class="form-check-input" value="1" name="access[{{$cat['link']}}]" id="access_{{$cat['link']}}">
                              <label class="form-check-label" for="access_{{$cat['link']}}">Accés</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="_{{$cat['link']}}" class="collapse" aria-labelledby="_{{$cat['link']}}" data-parent="#_{{$cat['link']}}">
                        <div class="iq-card-body">
                          <table class="table table-striped table-bordered m-0" role="grid">
                            <thead>
                              <tr>
                                <th>Module</th>
                                <th>Lire</th>
                                <th>Ajouter</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                                <th>Accéss</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($subcats as $subcat)
                              @if($subcat['cid'] == $cat['cid'])
                              <tr>
                                <td>{{$subcat['title']}}</td>

                                <td class="text-center">
                                  <input type="hidden" value="0" name="permissions[{{$subcat['link']}}][can_read]">
                                  <input type="checkbox" value="1" {{($subcat['can_read'])?'checked':null}} name="permissions[{{$subcat['link']}}][can_read]">
                                </td>

                                <td class="text-center">
                                  <input type="hidden" value="0" name="permissions[{{$subcat['link']}}][can_create]">
                                  <input type="checkbox" value="1" {{($subcat['can_create'])?'checked':null}} name="permissions[{{$subcat['link']}}][can_create]">
                                </td>

                                <td class="text-center">
                                  <input type="hidden" value="0" name="permissions[{{$subcat['link']}}][can_update]">
                                  <input type="checkbox" value="1" {{($subcat['can_update'])?'checked':null}} name="permissions[{{$subcat['link']}}][can_update]">
                                </td>

                                <td class="text-center">
                                  <input type="hidden" value="0" name="permissions[{{$subcat['link']}}][can_delete]">
                                  <input type="checkbox" value="1" {{($subcat['can_delete'])?'checked':null}} name="permissions[{{$subcat['link']}}][can_delete]">
                                </td>

                                <td class="text-center">
                                  <input type="hidden" value="0" name="permissions[{{$subcat['link']}}][access]">
                                  <input type="checkbox" value="1" {{($subcat['access'])?'checked':null}} name="permissions[{{$subcat['link']}}][access]">
                                </td>
                              </tr>
                              @endif
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
                <div class="col-sm-12 d-flex flex-row justify-content-end">
                  <button type="reset" class="btn mr-2 iq-bg-danger">Annuler</button>
                  <button type="submit" class="btn iq-bg-success">Modifier</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
