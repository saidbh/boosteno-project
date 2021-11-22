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
                <div class="col-3">
                    <div class="iq-card">
                        <div class="iq-card-body">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-Daily-attendance-tab" data-toggle="pill"
                                    href="#v-pills-Daily-attendance" role="tab" aria-controls="v-pills-Daily-attendance"
                                    aria-selected="true">Gestion de présence</a>
                                <a class="nav-link" id="v-pills-Timetable-tab" data-toggle="pill"
                                    href="#v-pills-Timetable" role="tab" aria-controls="v-pills-Timetable"
                                    aria-selected="false">Time Table</a>
                                <a class="nav-link" id="v-pills-Marks-tab" data-toggle="pill" href="#v-pills-Marks"
                                    role="tab" aria-controls="v-pills-Marks" aria-selected="false">Gestion des notes</a>
                                <a class="nav-link" id="v-pills-exams-tab" data-toggle="pill" href="#v-pills-exams"
                                    role="tab" aria-controls="v-pills-exams" aria-selected="false">Gestion des examens</a>
                                <a class="nav-link" id="v-pills-certifications-tab" data-toggle="pill"
                                    href="#v-pills-certifications" role="tab" aria-controls="v-pills-certifications"
                                    aria-selected="false">Gestion des certificats</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <!--content here-->
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-Daily-attendance" role="tabpanel"
                            aria-labelledby="v-pills-Daily-attendance-tab">
                            <!--Daily attendance-->
                            @include('academy.schooling.Daily-attendance')
                            <!--Daily attendance-->
                        </div>
                        <div class="tab-pane fade" id="v-pills-Timetable" role="tabpanel"
                            aria-labelledby="v-pills-Timetable-tab">
                            <!--Time table-->
                            @include('academy.schooling.Timetable')
                            <!--Time table-->
                        </div>
                        <div class="tab-pane fade" id="v-pills-Marks" role="tabpanel" aria-labelledby="v-pills-Marks-tab">
                            <!--Maks content start-->
                            @include('academy.schooling.Marks')
                            <!--Maks content end-->
                        </div>
                        <div class="tab-pane fade" id="v-pills-exams" role="tabpanel" aria-labelledby="v-pills-exams-tab">
                            <!--Exams content start here-->
                            @include('academy.schooling.Exams')
                            <!---Exams content end here -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-certifications" role="tabpanel"
                            aria-labelledby="v-pills-certifications-tab">
                            <!--Certificates-->
                            @include('academy.schooling.Certificates')
                            <!--CErtificates-->
                        </div>
                    </div>
                    <!--content end-->
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#daily-attendance-table').DataTable({
                "columnDefs": [{
                    "targets": [0, 6],
                    "orderable": false
                }],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
                }
            });
        });
    </script>
@endsection
