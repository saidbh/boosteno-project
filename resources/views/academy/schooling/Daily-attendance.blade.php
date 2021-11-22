<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title w-100">
            <div class="row">
                <div
                    class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="card-title m-0">Gestion de présences</h4>
                    <div class="d-flex flex-row">
                        <a href="#" class="btn btn-success" data-toggle="modal"
                            data-target="#DailyAttendance"><i class="ri-add-line"></i>
                            Prendre les présences</a>
                        <!--Modal take daily attendance-->
                        <div class="modal fade" id="DailyAttendance" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Prendre les présences</h5>
                                        <button type="button" class="close"
                                            data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!--content modal start here-->
                                        <div class="container">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="attendancy_date">Date</label>
                                                    <input type="date" class="form-control" id="attendancy_date" name="date" required/>
                                                  </div>
                                                <div class="form-group col-md-4">
                                                    <label for="rooms">Salle</label>
                                                    <select class="form-control" id="rooms">
                                                        <option>salle 1</option>
                                                        <option>salle 2</option>
                                                        <option>salle 3</option>
                                                      </select>
                                                  </div>
                                                  <div class="form-group col-md-4">
                                                    <label for="class">Cours</label>
                                                    <select class="form-control" id="class">
                                                        <option>Cour 1</option>
                                                        <option>Cour 2</option>
                                                        <option>Cour 3</option>
                                                      </select>
                                                  </div>
                                            </div>
                                            <div class="col">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-success">Tous présents</button>
                                                    <button type="button" class="btn btn-secondary">Tous absents</button>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <!--Presence table start here-->
                                            <div class="table-responsive">
                                                <table id="class-table" class="table table-striped table-bordered mt-4" role="grid"
                                                    aria-describedby="user-list-page-info">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>Nom</th>
                                                            <th>Prénom</th>
                                                            <th>Statut</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <td>Mohammed</td>
                                                        <td>Mohammed</td>
                                                        <td>
                                                            <!--checkbox presence start-->
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                                                                <label class="form-check-label" for="inlineRadio1">Present</label>
                                                              </div>
                                                              <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                                <label class="form-check-label" for="inlineRadio2">Absent</label>
                                                              </div>
                                                            <!--chekbox presence end-->
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--Presence table end here-->
                                        </div>
                                        <!--Content Modal end-->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn mr-2 iq-bg-danger"
                                            data-dismiss="modal">Annuler</button>
                                        <button type="submit"
                                            class="btn iq-bg-success">Valider</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Modal take daily attendance-->
                        <a href="#" class="btn mx-1 btn-primary">PDF</a>
                        <a href="#" class="btn btn-primary">Excel</a>
                        <a href="#" class="btn ml-1 btn-primary">Imprimer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="iq-card-body">
        <!--Daily attendance table start here-->
        <div class="table-responsive">
            <table id="daily-attendance-table" class="table table-striped table-bordered mt-4"
                role="grid" aria-describedby="user-list-page-info">
                <thead>
                    <tr class="text-center">
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Salle</th>
                        <th>Cours</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="flex align-items-center list-user-action">
                            <span data-toggle="modal" data-target="#ModalEdit">
                                <a data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Modifier" href="#"><i
                                        class="ri-pencil-line"></i></a>
                            </span>
                            <span data-toggle="modal" data-target="#Modaldel">
                                <a data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Supprimer" href="#"><i
                                        class="ri-delete-bin-line"></i></a>
                            </span>
                        </div>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--Daily attendance table end here-->
    </div>
</div>
