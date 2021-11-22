<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title w-100">
            <div class="row">
                <div
                    class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="card-title m-0">Gestion des notes</h4>
                    <div class="d-flex flex-row">
                        <a href="#" class="btn btn-success"><i class="ri-add-line"></i>
                            Gérer</a>
                        <a href="#" class="btn mx-1 btn-primary">PDF</a>
                        <a href="#" class="btn btn-primary">Excel</a>
                        <a href="#" class="btn ml-1 btn-primary">Imprimer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="iq-card-body">
        <!--Marks content start-->
        <div class="container">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="exams">Examen</label>
                    <select class="form-control" name="exams" id="exams" required>
                      <option value="">Veillez choisir une examen ...</option>
                      <option>examen 1</option>
                      <option>examen 2</option>
                    </select>
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
                    <label for="lessons">Cours</label>
                    <select class="form-control" name="lessons" id="lessons" required>
                      <option value="">Veillez choisir une salle ...</option>
                      <option>A1.2 intensiv</option>
                      <option>A2.2 intensiv</option>
                      <option>B1.2 intensiv</option>
                    </select>
                  </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="class-table" class="table table-striped table-bordered mt-4" role="grid"
                aria-describedby="user-list-page-info">
                <thead>
                    <tr class="text-center">
                        <th>Nom </th>
                        <th>Prénom </th>
                        <th>Notes</th>
                        <th>Commentaire</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>walid</td>
                    <td>youssfi</td>
                    <td><input type="number" class="form-control" id="marks" name="marks" value="16,5" required></td>
                    <td>Trés bien</td>
                    <td>
                        <button type="button" class="btn btn-success"><i class="ri-checkbox-circle-fill" style="font-size:16px"></i></button>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--Marks content end-->
    </div>
</div>
