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
                  <h4 class="card-title m-0">Résevation</h4>
                  <div class="d-flex flex-row">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#Modaladd"><i class="ri-add-line"></i> Réserver</a>
                    <a href="#" class="btn mx-1 btn-primary">PDF</a>
                    <a href="#" class="btn btn-primary">Excel</a>
                    <a href="#" class="btn ml-1 btn-primary">Imprimer</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="iq-card-body">
              <!--Content start here-->
              <div class="table-responsive">
                <table id="reservation-table" class="table table-striped table-bordered mt-4" role="grid"
                    aria-describedby="user-list-page-info">
                    <thead>
                        <tr class="text-center">
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>N°CIN</th>
                            <th>Session</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>Mohammed</td>
                        <td>Amine</td>
                        <td>01234567</td>
                        <td>Decembre</td>
                        <td>
                            <div class="flex align-items-center list-user-action">
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Profil" href="{{ route('Client_profile') }}" ><i class="ri-user-line"></i></a>
                                <span data-toggle="modal" data-target="#Details">
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Détailles" href="#" ><i class="ri-eye-line"></i></a>
                                </span>
                                <span data-toggle="modal" data-target="#ModalEdit">
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier" href="#" ><i class="ri-pencil-line"></i></a>
                                </span>
                                <span data-toggle="modal" data-target="#Modaldel">
                                    <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer" href="#" ><i class="ri-delete-bin-line"></i></a>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <!--Modal details start-->
                    <div class="modal fade" id="Details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Détailles</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!--Form start-->
                                    <!--Content here start-->
                                    <div class="container2">

                                        <div class="table">
                                            <div class="table-header">
                                                <div class="header__item"><a id="name" class="filter__link" href="#">08h00 - 11h00</a></div>
                                                <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">11h00 - 14h00</a></div>
                                                <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">14h00 - 18h00 <br><span style="color:red;">Super-Intensif</span><br> (2 Semaines)</a></div>
                                                <div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">18h00 - 21h00 <br><span style="color:red;">Extensif </span><br> (Lun/Mer/Ven)</a></div>
                                                <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">19h00 - 22h00 <br><span style="color:red;">Online</span><br></a></div>
                                                <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">08h00 - 13h00 <br><span style="color:red;">Weekend </span><br></a></div>
                                                <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Commentaire</a></div>
                                            </div>
                                            <div class="table-content">
                                                <div class="table-row">
                                                    <div class="table-data"><i class="ri-checkbox-circle-fill" style="color:green;font-size:24px;margin-right:20px;"></i></div>
                                                    <div class="table-data"><i class="ri-checkbox-circle-fill" style="color:green;font-size:24px;margin-right:20px;"></i></div>
                                                    <div class="table-data"><i class="ri-checkbox-circle-fill" style="color:green;font-size:24px;margin-right:20px;"></i></div>
                                                    <div class="table-data"><i class="ri-close-circle-fill" style="color:red;font-size:24px;margin-right:20px;"></i></div>
                                                    <div class="table-data"><i class="ri-checkbox-circle-fill" style="color:green;font-size:24px;margin-right:20px;"></i></div>
                                                    <div class="table-data"><i class="ri-checkbox-circle-fill" style="color:green;font-size:24px;margin-right:20px;"></i></div>
                                                    <div class="table-data">commentaire ici ...</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Content here end-->
                                <!--Form end-->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn mr-2 iq-bg-info" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
                    <!--Modal details end-->
                    <!--Modal edit start-->
                    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mise a jour</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!--Form start-->
                                <div class="container">
                                    <form method="post" action="#" enctype="multipart/form-data">
                                        <!--form inputs here-->
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                              <label for="first_name">Nom</label>
                                              <input type="text" class="form-control" id="first_name_update" name="first_name"  required>
                                            </div>
                                            <div class="form-group col-md-3">
                                              <label for="inputPassword4">Prénom</label>
                                              <input type="text" class="form-control" id="last_name_update" name="last_name" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputPassword4">Numéro CIN</label>
                                                <input type="number" class="form-control" id="CIN_update" name="cin" required>
                                              </div>
                                              <div class="form-group col-md-3">
                                                <label for="Session">Session</label>
                                                <select id="Session" class="form-control">
                                                  <option value="">Veillez choisir une session ...</option>
                                                  <option>...</option>
                                                </select>
                                              </div>
                                          </div>
                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" id="gridCheck1_update" name="time1">
                                                  <label class="form-check-label" for="gridCheck1">
                                                    <b>
                                                        08H00 - 11H00
                                                    </b>
                                                  </label>
                                                </div>
                                              </div>
                                          </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" id="gridCheck2_update" name="time2">
                                                      <label class="form-check-label" for="gridCheck2">
                                                        <b>
                                                            11H00 - 14H00
                                                        </b>
                                                      </label>
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" id="gridCheck3_update" name="time3">
                                                      <label class="form-check-label" for="gridCheck3">
                                                          <b>
                                                            14H00 - 18H00
                                                            <span style="color:red;">Super-Intensif</span>
                                                             (2 SEMAINES)
                                                          </b>
                                                      </label>
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-lg-6">
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" id="gridCheck4_update" name="time4">
                                                      <label class="form-check-label" for="gridCheck4">
                                                          <b>
                                                            18H00 - 21H00
                                                            <span style="color:red;">Extensif </span>
                                                              (LUN/MER/VEN)
                                                          </b>
                                                      </label>
                                                    </div>
                                                  </div>
                                              </div>
                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" id="gridCheck_update" name="time4">
                                                  <label class="form-check-label" for="gridCheck">
                                                      <b>
                                                        19H00 - 22H00
                                                        <span style="color:red;">ONLINE </span>

                                                      </b>
                                                  </label>
                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-row">
                                              <div class="form-group col-md-6">
                                                    <label for="comment">Commentaire</label>
                                                    <input type="text" class="form-control" id="comment_update" name="comment" required>
                                              </div>
                                          </div>
                                        <!--form inputs end-->
                                </div>
                                <!--Form end-->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn mr-2 iq-bg-danger" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn iq-bg-success">modifier</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                    <!--Modal edit end-->
                    <!--Modal delete start-->
                    <div class="modal fade" id="Modaldel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                voulez vous vraiment supprimer ce ----- ?
                                <form method="post" action="#">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn mr-2 iq-bg-danger" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn iq-bg-success">valider</button>
                            </div>
                        </form>
                            </div>
                        </div>
                        </div>
                    <!--Modal delete end-->
                    </tbody>
                </table>
            </div>
              <!--content end here-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Modal add start here-->
<div class="modal fade" id="Modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!--Form start-->
            <div class="container">
                <form method="post" action="#" enctype="multipart/form-data">
                    <!--form inputs here-->
                    <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="first_name">Nom</label>
                          <input type="text" class="form-control" id="first_name" name="first_name"  required>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="inputPassword4">Prénom</label>
                          <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Numéro CIN</label>
                            <input type="number" class="form-control" id="CIN" name="cin" required>
                          </div>
                          <div class="form-group col-md-3">
                            <label for="Session">Session</label>
                            <select id="Session" class="form-control">
                              <option value="">Veillez choisir une session ...</option>
                              <option>...</option>
                            </select>
                          </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="gridCheck1" name="time1">
                              <label class="form-check-label" for="gridCheck1">
                                <b>
                                    08H00 - 11H00
                                </b>
                              </label>
                            </div>
                          </div>
                      </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="gridCheck2" name="time2">
                                  <label class="form-check-label" for="gridCheck2">
                                    <b>
                                        11H00 - 14H00
                                    </b>
                                  </label>
                                </div>
                              </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-lg-6">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="gridCheck3" name="time3">
                                  <label class="form-check-label" for="gridCheck3">
                                      <b>
                                        14H00 - 18H00
                                        <span style="color:red;">Super-Intensif</span>
                                         (2 SEMAINES)
                                      </b>
                                  </label>
                                </div>
                              </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-lg-6">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="gridCheck4" name="time4">
                                  <label class="form-check-label" for="gridCheck4">
                                      <b>
                                        18H00 - 21H00
                                        <span style="color:red;">Extensif </span>
                                          (LUN/MER/VEN)
                                      </b>
                                  </label>
                                </div>
                              </div>
                          </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="gridCheck" name="time4">
                              <label class="form-check-label" for="gridCheck">
                                  <b>
                                    19H00 - 22H00
                                    <span style="color:red;">Onligne </span>

                                  </b>
                              </label>
                            </div>
                          </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="gridCheck" name="time5">
                              <label class="form-check-label" for="gridCheck">
                                  <b>
                                    08H00 - 13H00
                                    <span style="color:red;">Weekend </span>

                                  </b>
                              </label>
                            </div>
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-6">
                                <label for="comment">Commentaire</label>
                                <input type="text" class="form-control" id="comment" name="comment" required>
                          </div>
                      </div>
                    <!--form inputs end-->
            </div>
            <!--Form end-->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn mr-2 iq-bg-danger" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn iq-bg-success">Valider</button>
        </div>
        </form>
    </div>
</div>
</div>
<!--Modal add end here-->
<style>
    .container2 {
	max-width: auto;
	margin-right:auto;
	margin-left:auto;
	display:flex;
	justify-content:center;
	align-items:center;
}

.table {
	width:100%;
	border:1px solid $color-form-highlight;
}

.table-header {
	display:flex;
	width:100%;
	background:rgb(158, 157, 157);
	padding:($half-spacing-unit * 1.5) 0;
}

.table-row {
	display:flex;
	width:100%;
	padding:($half-spacing-unit * 1.5) 0;

	&:nth-of-type(odd) {
		background:$color-form-highlight;
	}
}

.table-data, .header__item {
	flex: 1 1 20%;
	text-align:center;
}

.header__item {
	text-transform:uppercase;
}

.filter__link {
	color:white;
	text-decoration: none;
	position:relative;
	display:inline-block;
	padding-left:$base-spacing-unit;
	padding-right:$base-spacing-unit;

	&::after {
		content:'';
		position:absolute;
		right:-($half-spacing-unit * 1.5);
		color:white;
		font-size:$half-spacing-unit;
		top: 50%;
		transform: translateY(-50%);
	}

	&.desc::after {
		content: '(desc)';
	}

	&.asc::after {
		content: '(asc)';
	}
    </style>
<script>
    $(document).ready(function() {
        $('#reservation-table').DataTable({
            "columnDefs": [{
                "targets": [0, 4],
                "orderable": false
            }],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
            }
        });
        ////////////////
                //////////////////////////////////////////////
                $(document).ready(function() {
              //
              $('#first_name').keyup(function(){
            let e = $('#first_name');
            let l = e.val();
            if(l.length > 2){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        $('#last_name').keyup(function(){
            let e = $('#last_name');
            let l = e.val();
            if(l.length > 2){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        $('#CIN').keyup(function(){
            let e = $('#CIN');
            let l = e.val();
            if(l.length > 7){
                e.removeClass('is-invalid');
                e.addClass('is-valid');
            }else{
                e.removeClass('is-valid');
                e.addClass('is-invalid');
            }
        });
        $('#comment').keyup(function(){
            let e = $('#comment');
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
    });
    </script>
@endsection
