@extends('layouts.master')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row row-eq-height">
          <div class="col-md-3">
             <div class="iq-card calender-small">
                <div class="iq-card-body">
                   <input type="hidden" class="displayCalendar d-none">
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title ">Classification</h4>
                   </div>

                   <div class="iq-card-header-toolbar d-flex align-items-center">
                      <a href="#"><i class="fa fa-plus  mr-0" aria-hidden="true"></i></a>
                   </div>
                </div>
                <div class="iq-card-body">
                   <ul class="m-0 p-0 job-classification">
                      <li class=""><i class="ri-check-line bg-danger"></i>Meeting</li>
                      <li class=""><i class="ri-check-line bg-success"></i>Business travel</li>
                      <li class=""><i class="ri-check-line bg-warning"></i>Personal Work</li>
                      <li class=""><i class="ri-check-line bg-info"></i>Team Project</li>
                   </ul>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Today's Schedule</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <ul class="m-0 p-0 today-schedule">
                      <li class="d-flex">
                         <div class="schedule-icon"><i class="ri-checkbox-blank-circle-fill text-primary"></i></div>
                         <div class="schedule-text"> <span>Web Design</span>
                         <span>09:00 to 12:00</span></div>
                      </li>
                      <li class="d-flex">
                         <div class="schedule-icon"><i class="ri-checkbox-blank-circle-fill text-success"></i></div>
                         <div class="schedule-text"> <span>Participate in Design</span>
                         <span>09:00 to 12:00</span></div>
                      </li>
                   </ul>
                </div>
             </div>
          </div>
          <div class="col-md-9">
             <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Calendrier</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                   <a href="#" class="btn btn-success"><i class="ri-add-line mr-2"></i>Evénements</a>
                </div>
             </div>
             <div class="iq-card-body">
                <div id='calendar'></div>
             </div>
          </div>
          </div>
       </div>
    </div>
 </div>
 <script>
    $(document).ready(function () {

    var SITEURL = "{{ url('/') }}";

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    var calendar = $('#calendar').fullCalendar({
                        editable: true,
                        events: SITEURL + "/fullcalender",
                        displayEventTime: false,
                        editable: true,
                        eventRender: function (event, element, view) {
                            if (event.allDay === 'true') {
                                    event.allDay = true;
                            } else {
                                    event.allDay = false;
                            }
                        },
                        selectable: true,
                        selectHelper: true,
                        select: function (start, end, allDay) {
                            var title = prompt('Nom de l\'évenement:');
                            if (title) {
                                var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                                var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                                $.ajax({
                                    url: "{{ route('calendar-events.ajax')}}",
                                    data: {
                                        title: title,
                                        start: start,
                                        end: end,
                                        type: 'add'
                                    },
                                    type: "POST",
                                    success: function (data) {
                                        displayMessage("Evenement creér avec succès");

                                        calendar.fullCalendar('renderEvent',
                                            {
                                                id: data.id,
                                                title: title,
                                                start: start,
                                                end: end,
                                                allDay: allDay
                                            },true);

                                        calendar.fullCalendar('unselect');
                                    }
                                });
                            }
                        },
                        eventDrop: function (event, delta) {
                            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                            $.ajax({
                                url: "{{ route('calendar-events.ajax')}}",
                                data: {
                                    title: event.title,
                                    start: start,
                                    end: end,
                                    id: event.id,
                                    type: 'update'
                                },
                                type: "POST",
                                success: function (response) {
                                    displayMessage("Evenement mis a jour !");
                                }
                            });
                        },
                        eventClick: function (event) {
                            var deleteMsg = confirm("Vous étes sur de vouloir supprimer cet événement?");
                            if (deleteMsg) {
                                $.ajax({
                                    type: "POST",
                                    url: "{{ route('calendar-events.ajax')}}",
                                    data: {
                                            id: event.id,
                                            type: 'delete'
                                    },
                                    success: function (response) {
                                        calendar.fullCalendar('removeEvents', event.id);
                                        displayMessage("Evenement supprimer !");
                                    }
                                });
                            }
                        }

                    });

    });

    function displayMessage(message) {
        toastr.success(message, 'Event');
    }

    </script>

@endsection
