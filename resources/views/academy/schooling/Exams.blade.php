<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title w-100">
            <div class="row">
                <div
                    class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="card-title m-0">Gestion des examens</h4>
                    <div class="d-flex flex-row">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#Addexams"><i class="ri-add-line"></i>
                            Ajouter</a>
                            <!--Modal add exams start-->
                            <div class="modal fade" id="Addexams" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Ajouter examen</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <!--content add exams start here-->
                                      <div class="container">
                                          <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="exam_name">Nom d'examen</label>
                                                <input type="text" class="form-control" name="exam_name" id="exam_name" autocomplete="off" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="rooms">type d'examen</label>
                                                <select class="form-control" name="rooms" id="rooms" required>
                                                  <option value="">Veillez choisir un type d'examen ...</option>
                                                  <option>Oral </option>
                                                  <option>Ecrit </option>
                                                  <option>Lecture </option>
                                                </select>
                                              </div>
                                            <div class="form-group col-md-4">
                                                <label for="rooms">Salles</label>
                                                <select class="form-control" name="rooms" id="rooms" required>
                                                  <option value="">Veillez choisir une salle ...</option>
                                                  <option>Salle 1</option>
                                                  <option>Salle 2</option>
                                                  <option>Salle 3</option>
                                                </select>
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label for="lessons">Cours</label>
                                                <select class="form-control" name="lessons" id="lessons" required>
                                                  <option value="">Veillez choisir une salle ...</option>
                                                  <option>A1.2 intensiv</option>
                                                  <option>A2.2 intensiv</option>
                                                  <option>B1.2 intensiv</option>
                                                </select>
                                              </div>
                                              <div class="form-group col-md-4">
                                                <label for="date_exam">Date d'examen</label>
                                                <input type="date" class="form-control" name="date_exam" id="date_exam" autocomplete="off" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="start_time_exam">Heure début</label>
                                                <input type="time" class="form-control" name="start_time_exam" id="start_time_exam" autocomplete="off" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="end_time_exam">Heure Fin</label>
                                                <input type="time" class="form-control" name="end_time_exam" id="end_time_exam" autocomplete="off" required>
                                            </div>
                                          </div>
                                      </div>
                                      <!--Content add exams end here-->
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-info" data-dismiss="modal">Fermer</button>
                                      <button type="submit" class="btn btn-success">Valider</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <!--Modal add exams end-->
                        <a href="#" class="btn mx-1 btn-primary">PDF</a>
                        <a href="#" class="btn btn-primary">Excel</a>
                        <a href="#" class="btn ml-1 btn-primary">Imprimer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="iq-card-body">
        <!--Exams content start-->
        <div class="table-responsive">
            <table id="class-table" class="table table-striped table-bordered mt-4" role="grid"
                aria-describedby="user-list-page-info">
                <thead>
                    <tr class="text-center">
                        <th>Examen</th>
                        <th>Type d'examen</th>
                        <th>Salle</th>
                        <th>Cour</th>
                        <th>Date de l'examen</th>
                        <th>Heure début</th>
                        <th>Heure de fin</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Langue</td>
                    <td>Ecrit</td>
                    <td>salle 1</td>
                    <td>19/12/2021</td>
                    <td>09:00</td>
                    <td>12:00</td>
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
        <!--Exams content end-->
    </div>
</div>
