<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title w-100">
            <div class="row">
                <div
                    class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="card-title m-0">Gestion de TimeTable</h4>
                    <div class="d-flex flex-row">
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#AddTimetable"><i class="ri-add-line"></i>
                            Ajouter</a>
                            <!--Modal add start-->
                            <div class="modal fade" id="AddTimetable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Ajouter Timetable</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <!--content start here-->
                                      <div class="container">
                                          <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="rooms">Salles</label>
                                                <select id="rooms" class="form-control" name="rooms" required>
                                                    <option value="">Veillez choisir une salle ...</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="lessons">Liste des cours</label>
                                                <select name="lessons" id="lessons"
                                                    class="form-control" required>
                                                    <option value="">Veillez choisir vos
                                                        cours ... </option>
                                                    <option value="1">A1.1 Intensiv </option>
                                                    <option value="2">A1.2 Sup-intensiv</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="teachers">Liste des Enseignants</label>
                                                <select name="teachers" id="teachers"
                                                    class="form-control" required>
                                                    <option value="">Veillez choisir vos
                                                        Enseignants ... </option>
                                                    <option value="1">Mohammed amine </option>
                                                    <option value="2">Amira be omor</option>
                                                </select>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="teachers">Jours</label>
                                                <select name="teachers" id="teachers"
                                                    class="form-control" required>
                                                    <option value="">Veillez choisir un
                                                        Jours ... </option>
                                                    <option value="Lundi">Lundi </option>
                                                    <option value="Mardi">Mardi</option>
                                                    <option value="Mercredi">Mercredi </option>
                                                    <option value="Jeudi">Jeudi</option>
                                                    <option value="Vendredi">Vendredi </option>
                                                    <option value="Samedi">Samedi</option>
                                                    <option value="Dimanche">Dimanche </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="start_time">Heure début</label>
                                                <input type="time" class="form-control" name="start_time" id="start_time"
                                                    autocomplete="off" required />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="end_time">Heure du fin</label>
                                                <input type="time" class="form-control" name="end_time" id="end_time"
                                                    autocomplete="off" required />
                                            </div>
                                          </div>
                                      </div>
                                      <!--Content end here-->
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                      <button type="button" class="btn btn-success">Valider</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <!--Modal add end-->
                        <a href="#" class="btn mx-1 btn-primary">PDF</a>
                        <a href="#" class="btn btn-primary">Excel</a>
                        <a href="#" class="btn ml-1 btn-primary">Imprimer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="iq-card-body">
        <!--Time table content start here-->
        <div class="container">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="rooms">Salles</label>
                    <select id="rooms" class="form-control" name="rooms" required>
                        <option value="">Veillez choisir une salle ...</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="timetable-img text-center">
                <img src="img/content/timetable.png" alt="">
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr class="bg-light-gray">
                            <th class="text-uppercase">Temps
                            </th>
                            <th class="text-uppercase">Lundi</th>
                            <th class="text-uppercase">Mardi</th>
                            <th class="text-uppercase">Mercredi</th>
                            <th class="text-uppercase">Jeudi</th>
                            <th class="text-uppercase">Vendredi</th>
                            <th class="text-uppercase">Samedi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle">09:00am</td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">A1.1Intensiv</span>
                                <div class="font-size13 text-light-gray">Ivana Wong</div>
                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.1Intensiv</span>
                                <div class="font-size13 text-light-gray">Marta Healy</div>
                            </td>

                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.1Intensiv</span>
                                <div class="font-size13 text-light-gray">Ivana Wong</div>
                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.1Intensiv</span>
                                <div class="font-size13 text-light-gray">Ivana Wong</div>
                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-purple padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.2 Sup-Intensiv</span>
                                <div class="font-size13 text-light-gray">Kate Alley</div>
                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.1Intensiv</span>
                                <div class="font-size13 text-light-gray">James Smith</div>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">10:00am</td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.2 Sup-Intensiv</span>
                                <div class="font-size13 text-light-gray">Ivana Wong</div>
                            </td>
                            <td class="bg-light-gray">

                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-purple padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.2 Sup-Intensiv</span>
                                <div class="font-size13 text-light-gray">Kate Alley</div>
                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.2 Sup-Intensiv</span>
                                <div class="font-size13 text-light-gray">Marta Healy</div>
                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.2 Sup-Intensiv</span>
                                <div class="font-size13 text-light-gray">James Smith</div>
                            </td>
                            <td class="bg-light-gray">

                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">11:00am</td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.1Intensiv</span>
                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.2 Sup-Intensiv</span>
                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.2 Sup-Intensiv</span>
                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.1Intensiv</span>
                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.1Intensiv</span>
                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.1Intensiv</span>

                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">12:00pm</td>
                            <td class="bg-light-gray">

                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-purple padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.1Extensiv</span>
                                <div class="font-size13 text-light-gray">Kate Alley</div>
                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.1Extensiv</span>
                                <div class="font-size13 text-light-gray">Ivana Wong</div>
                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.1Extensiv</span>
                                <div class="font-size13 text-light-gray">Ivana Wong</div>
                            </td>
                            <td class="bg-light-gray">

                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.1Extensiv</span>
                                <div class="font-size13 text-light-gray">Marta Healy</div>
                            </td>
                        </tr>

                        <tr>
                            <td class="align-middle">01:00pm</td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">A1.1Extensiv</span>
                                <div class="font-size13 text-light-gray">James Smith</div>
                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">B1.1Extensiv</span>
                                <div class="font-size13 text-light-gray">Ivana Wong</div>
                            </td>
                            <td class="bg-light-gray">

                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">B1.1Extensiv</span>
                                <div class="font-size13 text-light-gray">James Smith</div>
                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">B1.1Extensiv</span>
                                <div class="font-size13 text-light-gray">Marta Healy</div>
                            </td>
                            <td>
                                <div class="font-size13 text-light-gray">CL 1234</div>
                                <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">B1.1Extensiv</span>
                                <div class="font-size13 text-light-gray">Ivana Wong</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--Time table content end here-->
    </div>
</div>
<style>
    .bg-light-gray {
    background-color: #f7f7f7;
}
.table-bordered thead td, .table-bordered thead th {
    border-bottom-width: 2px;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6;
}


.bg-sky.box-shadow {
    box-shadow: 0px 5px 0px 0px #00a2a7
}

.bg-orange.box-shadow {
    box-shadow: 0px 5px 0px 0px #af4305
}

.bg-green.box-shadow {
    box-shadow: 0px 5px 0px 0px #4ca520
}

.bg-yellow.box-shadow {
    box-shadow: 0px 5px 0px 0px #dcbf02
}

.bg-pink.box-shadow {
    box-shadow: 0px 5px 0px 0px #e82d8b
}

.bg-purple.box-shadow {
    box-shadow: 0px 5px 0px 0px #8343e8
}

.bg-lightred.box-shadow {
    box-shadow: 0px 5px 0px 0px #d84213
}


.bg-sky {
    background-color: #02c2c7
}

.bg-orange {
    background-color: #e95601
}

.bg-green {
    background-color: #5bbd2a
}

.bg-yellow {
    background-color: #f0d001
}

.bg-pink {
    background-color: #ff48a4
}

.bg-purple {
    background-color: #9d60ff
}

.bg-lightred {
    background-color: #ff5722
}

.padding-15px-lr {
    padding-left: 15px;
    padding-right: 15px;
}
.padding-5px-tb {
    padding-top: 5px;
    padding-bottom: 5px;
}
.margin-10px-bottom {
    margin-bottom: 10px;
}
.border-radius-5 {
    border-radius: 5px;
}

.margin-10px-top {
    margin-top: 10px;
}
.font-size14 {
    font-size: 14px;
}

.text-light-gray {
    color: #d6d5d5;
}
.font-size13 {
    font-size: 13px;
}

.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
    </style>
