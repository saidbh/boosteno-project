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
                  <h4 class="card-title m-0">Liste des utilisateurs</h4>
                  <a href="{{route('system-assign-role.create')}}" class="btn btn-primary">Ajouter utilisateur</a>
                </div>
              </div>
            </div>
          </div>
          <div class="iq-card-body">
            <div class="table-responsive">
              <table id="assign-role-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                <thead>
                  <tr class="text-center">
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Rôle</th>
                    <th>Email</th>
                    <th>Numéro</th>
                    <th>Type</th>
                    <th>Activer</th>
                    <th>Blocker</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr class="text-center">
                    <td>{{$user->id}}</td>
                    <td>
                      @if($user->contact !=null || $user->employee != null)
                      {{($user->employee==null)?$user->contact->first_name.' '.$user->contact->last_name:$user->employee->first_name.' '.$user->employee->last_name}}
                      @else
                      --
                      @endif
                    </td>
                    <td>{{($user->userRole==null)?'--':$user->userRole->role->name}}</td>
                    <td>{{($user->employee==null)?$user->email:$user->employee->email}}</td>
                    <td>{{($user->employee==null)?$user->phone:$user->employee->phone}}</td>
                    <td><a class="text-dark" href="#" data-toggle="tooltip" data-placement="top" title="{{($user->contact !=null || $user->employee != null)?($user->contact==null)?($user->employee->teacher==null)?'Employer':'Enseignant':'Client':'--'}}"><span class="badge iq-bg-primary">{{($user->contact !=null || $user->employee != null)?($user->contact==null)?($user->employee->teacher==null)?'Employer':'Enseignant':'Client':'--'}}</span></a></td>
                    <td>
                      @if($user->activated)
                      <a data-toggle="tooltip" data-placement="top" title="Oui"><i class="text-success ri-checkbox-circle-line"></i></a>
                      @else
                      <a data-toggle="tooltip" data-placement="top" title="Non"><i class="text-danger ri-close-circle-line"></i></a>
                      @endif
                    </td>
                    <td>
                      @if($user->blocked)
                      <a data-toggle="tooltip" data-placement="top" title="Oui"><i class="text-danger ri-lock-line"></i></a>
                      @else
                      <a data-toggle="tooltip" data-placement="top" title="Non"><i class="text-success ri-lock-unlock-line"></i></a>
                      @endif
                    </td>
                    <td>
                      <div class="flex align-items-center list-user-action">
                        <a href="{{route('system-assign-role.edit',[$user->id])}}" data-toggle="tooltip" data-placement="top" title="Modifier utilisateur {{$user->email}}"><i class="ri-pencil-line"></i></a>
                        <a data-toggle="modal" data-target="#assign{{$user->id}}" data-placement="top" title="" data-original-title="Supprimer l'utilisateur {{$user->email}}" href="#"><i class="ri-delete-bin-line"></i></a>
                        <div class="modal fade" id="assign{{$user->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <form method="POST" action="{{route('system-assign-role.destroy',[$user->id])}}">
                              @csrf
                              @method('delete')
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="staticBackdropLabel">Supprimer l'utilisateur {{$user->email}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Vous êtes sûr de vouloir supprimer l'utilisateur {{$user->email}}
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                                  <button type="submit" class="btn btn-danger">Confirmer</button>
                                </div>
                              </div>
                            </form>
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

</style>
<script>
  $(document).ready(function() {
    $('#assign-role-table').DataTable({
      "columnDefs": [{
        "targets": [0, 5, 6, 7]
        , "orderable": false
      }]
      , language: {
        url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
      }
    });
  });

</script>
@endsection
