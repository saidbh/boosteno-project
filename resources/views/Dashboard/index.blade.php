@extends('layouts.master')

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <a href="{{ route('sales-estimates') }}">
                        <div class="iq-card overflow-hidden" style="cursor: pointer;" >
                            <div class="iq-card-body pb-0">
                                <div class="rounded-circle iq-card-icon iq-bg-primary"><i class="ri-exchange-dollar-fill"></i></div>
                                <span class="float-right line-height-6">Devis</span>
                                <div class="clearfix"></div>
                                <div class="text-center">
                                    <h2 class="mb-0"><span class="counter">1500</span></h2>
                                </div>
                            </div>
                            <div id="chart-1"></div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="{{ route('academy-clients') }}">
                        <div class="iq-card overflow-hidden" >
                            <div class="iq-card-body pb-0" style="cursor: pointer;">
                                <div class="rounded-circle iq-card-icon iq-bg-warning"><i class="ri-bar-chart-grouped-line"></i></div>
                                <span class="float-right line-height-6">Clients</span>
                                <div class="clearfix"></div>
                                <div class="text-center">
                                    <h2 class="mb-0"><span class="counter">4500</span></h2>
                                </div>
                            </div>
                            <div id="chart-2"></div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="{{ route('academy-reservation') }}">
                        <div class="iq-card overflow-hidden">
                            <div class="iq-card-body pb-0" style="cursor: pointer;">
                                <div class="rounded-circle iq-card-icon iq-bg-success"><i class="ri-group-line"></i></div>
                                <span class="float-right line-height-6">Clients confirmer</span>
                                <div class="clearfix"></div>
                                <div class="text-center">
                                    <h2 class="mb-0"><span class="counter">1500</span></h2>
                                </div>
                            </div>
                            <div id="chart-3"></div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="{{ route('sales-invoices') }}">
                        <div class="iq-card overflow-hidden">
                            <div class="iq-card-body pb-0" style="cursor: pointer;">
                                <div class="rounded-circle iq-card-icon iq-bg-danger"><i class="ri-shopping-cart-line"></i></div>
                                <span class="float-right line-height-6">Factures</span>
                                <div class="clearfix"></div>
                                <div class="text-center">
                                    <h2 class="mb-0"><span class="counter">1450</span></h2>
                                </div>
                            </div>
                            <div id="chart-4"></div>
                        </div>
                    </a>
                </div>
                <!--New chart-->
{{--                 <div class="col-sm-6 col-lg-2">
                    <div class="iq-card overflow-hidden">
                        <div class="iq-card-body pb-0">
                            <div class="rounded-circle iq-card-icon iq-bg-danger"><i class="ri-shopping-cart-line"></i></div>
                            <span class="float-right line-height-6">Factures Non payeés</span>
                            <div class="clearfix"></div>
                            <div class="text-center">
                                <h2 class="mb-0"><span class="counter">350</span></h2>
                            </div>
                        </div>
                        <div id="apexcharts40kuoeiyj" class="apexcharts-canvas apexcharts40kuoeiyj light" style="width: 372px; height: 80px;"><svg id="SvgjsSvg24627" width="372" height="80" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG24629" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs24628"><clipPath id="gridRectMask40kuoeiyj"><rect id="SvgjsRect24641" width="375" height="83" x="-1.5" y="-1.5" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMask40kuoeiyj"><rect id="SvgjsRect24642" width="374" height="82" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient24648" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop24649" stop-opacity="0.5" stop-color="rgba(255,212,0,0.5)" offset="0"></stop><stop id="SvgjsStop24650" stop-opacity="0" stop-color="rgba(255,255,255,0)" offset="1"></stop><stop id="SvgjsStop24651" stop-opacity="0" stop-color="rgba(255,255,255,0)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine24632" x1="280.1026275379628" y1="0" x2="280.1026275379628" y2="80" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="280.1026275379628" y="0" width="1" height="80" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG24654" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG24655" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG24658" class="apexcharts-grid"><line id="SvgjsLine24660" x1="0" y1="80" x2="372" y2="80" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine24659" x1="0" y1="1" x2="0" y2="80" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG24644" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG24645" class="apexcharts-series" seriesName="series1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath24652" d="M 0 80L 0 13.333333333333343C 33.12202695785702 13.333333333333343 61.51233577887733 53.333333333333336 94.63436273673435 53.333333333333336C 126.66787237672753 53.333333333333336 154.12516635386453 26.66666666666667 186.1586759938577 26.66666666666667C 219.2140590342945 26.66666666666667 247.54724449752604 66.66666666666667 280.6026275379628 66.66666666666667C 312.59170789967584 66.66666666666667 340.01091963828696 26.66666666666667 372 26.66666666666667C 372 26.66666666666667 372 26.66666666666667 372 80M 372 26.66666666666667z" fill="url(#SvgjsLinearGradient24648)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask40kuoeiyj)" pathTo="M 0 80L 0 13.333333333333343C 33.12202695785702 13.333333333333343 61.51233577887733 53.333333333333336 94.63436273673435 53.333333333333336C 126.66787237672753 53.333333333333336 154.12516635386453 26.66666666666667 186.1586759938577 26.66666666666667C 219.2140590342945 26.66666666666667 247.54724449752604 66.66666666666667 280.6026275379628 66.66666666666667C 312.59170789967584 66.66666666666667 340.01091963828696 26.66666666666667 372 26.66666666666667C 372 26.66666666666667 372 26.66666666666667 372 80M 372 26.66666666666667z" pathFrom="M -1 106.66666666666667L -1 106.66666666666667L 94.63436273673435 106.66666666666667L 186.1586759938577 106.66666666666667L 280.6026275379628 106.66666666666667L 372 106.66666666666667"></path><path id="SvgjsPath24653" d="M 0 13.333333333333343C 33.12202695785702 13.333333333333343 61.51233577887733 53.333333333333336 94.63436273673435 53.333333333333336C 126.66787237672753 53.333333333333336 154.12516635386453 26.66666666666667 186.1586759938577 26.66666666666667C 219.2140590342945 26.66666666666667 247.54724449752604 66.66666666666667 280.6026275379628 66.66666666666667C 312.59170789967584 66.66666666666667 340.01091963828696 26.66666666666667 372 26.66666666666667" fill="none" fill-opacity="1" stroke="#ffd400" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask40kuoeiyj)" pathTo="M 0 13.333333333333343C 33.12202695785702 13.333333333333343 61.51233577887733 53.333333333333336 94.63436273673435 53.333333333333336C 126.66787237672753 53.333333333333336 154.12516635386453 26.66666666666667 186.1586759938577 26.66666666666667C 219.2140590342945 26.66666666666667 247.54724449752604 66.66666666666667 280.6026275379628 66.66666666666667C 312.59170789967584 66.66666666666667 340.01091963828696 26.66666666666667 372 26.66666666666667" pathFrom="M -1 106.66666666666667L -1 106.66666666666667L 94.63436273673435 106.66666666666667L 186.1586759938577 106.66666666666667L 280.6026275379628 106.66666666666667L 372 106.66666666666667"></path><g id="SvgjsG24646" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle24666" r="0" cx="280.6026275379628" cy="66.66666666666667" class="apexcharts-marker w5fz1a0g no-pointer-events" stroke="#ffffff" fill="#ffd400" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG24647" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine24661" x1="0" y1="0" x2="372" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine24662" x1="0" y1="0" x2="372" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG24663" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG24664" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG24665" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect24631" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG24656" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG24657" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip light" style="left: 162.884px; top: 2.8125px;"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">19/11/18 01:30</div><div class="apexcharts-tooltip-series-group active" style="display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 212, 0);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label">series1: </span><span class="apexcharts-tooltip-text-value">30</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div>
                    </div>
                </div> --}}

                <!--New chart end-->
                <div class="col-lg-8">
                    <div class="iq-card overflow-hidden">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Clients par Session </h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link active">Dérniére</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Caurante</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Prochaine</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="d-flex justify-content-around">
                                <div class="price-week-box mr-5">
                                    <span>Catte semaine</span>
                                    <h2><span class="counter">1000</span> <i class="ri-funds-line text-success font-size-18"></i></h2>
                                </div>
                                <div class="price-week-box">
                                    <span>Semaine dérniére </span>
                                    <h2><span class="counter">850</span><i class="ri-funds-line text-danger font-size-18"></i></h2>
                                </div>
                            </div>
                        </div>
                        <div id="chart-5"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="iq-card animation-card">
                        <div class="iq-card-body p-0">
                            <div class="an-text">
                                <span>Objectif clients</span>
                                <h2 class="display-4 font-weight-bold"><span>3000</span></h2>
                            </div>
                            <div class="an-img">
                                <div class="bodymovin" data-bm-path={{asset('assets/images/small/data.json')}} data-bm-renderer="svg" data-bm-loop="true"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Top Produit</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown">
                                 <span class="dropdown-toggle" id="dropdownMenuButton1" data-toggle="dropdown">
                                 <i class="ri-more-2-fill"></i>
                                 </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>Voir</a>
                                        <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                        <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                        <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                        <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="media-sellers">
                                        <div class="media-sellers-img">
                                            <img src={{asset("assets/images/page-img/01.jpg")}} class="mr-3 rounded" alt="">
                                        </div>
                                        <div class="media-sellers-media-info">
                                            <h5 class="mb-0"><a class="text-dark" href="#">Livre 1</a></h5>
                                            <p class="mb-1">{{-- Android 10 supported tablet with best features. --}}</p>
                                            <div class="sellers-dt">
{{--                                                 <span class="font-size-12">Vendor: <a href="#"> iqonicdesign</a></span>
 --}}                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 text-center mt-3">
                                    <h5 class="mb-0">20</h5>
                                    <span>Vendu</span>
                                </div>
{{--                                 <div class="col-sm-2 text-center mt-3">
                                    <ul class="list-inline mb-0 list-star">
                                        <li class="list-inline-item text-warning"><i class="ri-star-fill"></i></li>
                                        <li class="list-inline-item text-warning"><i class="ri-star-fill"></i></li>
                                        <li class="list-inline-item text-warning"><i class="ri-star-fill"></i></li>
                                        <li class="list-inline-item text-warning"><i class="ri-star-fill"></i></li>
                                        <li class="list-inline-item text-warning"><i class="ri-star-fill"></i></li>
                                    </ul>
                                    <span>Rating</span>
                                </div> --}}
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-8">
                                    <div class="media-sellers">
                                        <div class="media-sellers-img">
                                            <img src={{asset("assets/images/page-img/02.jpg")}} class="mr-3 rounded" alt="">
                                        </div>
                                        <div class="media-sellers-media-info">
                                            <h5 class="mb-0"><a class="text-dark" href="#">Livre 2</a></h5>
                                            <p class="mb-1">{{-- Latest model of apple watch for productivity. --}}</p>
                        {{--                     <div class="sellers-dt">
                                                <span class="font-size-12">Vendor: <a href="#">Apple</a></span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 text-center mt-3">
                                    <h5 class="mb-0">200</h5>
                                    <span>Vendu</span>
                                </div>
{{--                                 <div class="col-sm-2 text-center mt-3">
                                    <ul class="list-inline mb-0 list-star">
                                        <li class="list-inline-item text-warning"><i class="ri-star-fill"></i></li>
                                        <li class="list-inline-item text-warning"><i class="ri-star-fill"></i></li>
                                        <li class="list-inline-item text-warning"><i class="ri-star-fill"></i></li>
                                        <li class="list-inline-item text-warning"><i class="ri-star-fill"></i></li>
                                        <li class="list-inline-item text-warning"><i class="ri-star-fill"></i></li>
                                    </ul>
                                    <span>Rating</span>
                                </div> --}}
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-8">
                                    <div class="media-sellers">
                                        <div class="media-sellers-img">
                                            <img src={{asset("assets/images/page-img/03.jpg")}} class="mr-3 rounded" alt="">
                                        </div>
                                        <div class="media-sellers-media-info">
                                            <h5 class="mb-0"><a class="text-dark" href="#">Livre 3</a></h5>
                                            <p class="mb-1">{{-- Best ever combo package for work and personal use. --}}</p>
                                       {{--      <div class="sellers-dt">
                                                <span class="font-size-12">Vendor: <a href="#"> Iqonic devices</a></span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 text-center mt-3">
                                    <h5 class="mb-0">160</h5>
                                    <span>Vendu</span>
                                </div>
                      {{--           <div class="col-sm-2 text-center mt-3">
                                    <ul class="list-inline mb-0 list-star">
                                        <li class="list-inline-item text-warning"><i class="ri-star-fill"></i></li>
                                        <li class="list-inline-item text-warning"><i class="ri-star-fill"></i></li>
                                        <li class="list-inline-item text-warning"><i class="ri-star-fill"></i></li>
                                        <li class="list-inline-item text-warning"><i class="ri-star-fill"></i></li>
                                        <li class="list-inline-item text-warning"><i class="ri-star-fill"></i></li>
                                    </ul>
                                    <span>Rating</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="iq-card">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Support clients</h4>
                                    </div>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle dropdown-bg" id="dropdownMenuButton2" data-toggle="dropdown">View all</span>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div class="media-support">
                                        <div class="media-support-header mb-2">
                                            <div class="media-support-user-img mr-3">
                                                <img class="rounded-circle" src={{asset("assets/images/user/1.jpg")}} alt="">
                                            </div>
                                            <div class="media-support-info mt-2">
                                                <h6 class="mb-0"><a href="#" class="">Amine ben ali</a></h6>
                                                <small>2 jours avant</small>
                                            </div>
                                            <div class="mt-3">
                                                <span class="badge badge-success">Payé</span>
                                            </div>
                                        </div>
                                        <div class="media-support-body">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        </div>
                                    </div>
                                    <hr class="mt-4 mb-4">
                                    <div class="media-support">
                                        <div class="media-support-header mb-2">
                                            <div class="media-support-user-img mr-3">
                                                <img class="rounded-circle" src={{asset('assets/images/user/02.jpg')}} alt="">
                                            </div>
                                            <div class="media-support-info mt-2">
                                                <h6 class="mb-0"><a href="#" class="">Marwa ben salah</a></h6>
                                                <small>2 jours avant</small>
                                            </div>
                                            <div class="mt-3">
                                                <span class="badge badge-warning text-white">Payments partiel</span>
                                            </div>
                                        </div>
                                        <div class="media-support-body">
                                            <p class="mb-0">It is a long established fact that a reader will be distracted by the readable layout.</p>
                                        </div>
                                    </div>
                                    <hr class="mt-4 mb-4">
                                    <div class="media-support">
                                        <div class="media-support-header mb-2">
                                            <div class="media-support-user-img mr-3">
                                                <img class="rounded-circle" src={{asset("assets/images/user/03.jpg")}} alt="">
                                            </div>
                                            <div class="media-support-info mt-2">
                                                <h6 class="mb-0"><a href="#" class="">Ahmed landolsi</a></h6>
                                                <small>3 jours avant </small>
                                            </div>
                                            <div class="mt-3">
                                                <span class="badge badge-danger">Non payé</span>
                                            </div>
                                        </div>
                                        <div class="media-support-body">
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        </div>
                                    </div>
                                    <hr class="mt-4 mb-4">
                                    <div class="media-support">
                                        <div class="media-support-header mb-2">
                                            <div class="media-support-user-img mr-3">
                                                <img class="rounded-circle" src={{asset('assets/images/user/04.jpg')}} alt="">
                                            </div>
                                            <div class="media-support-info mt-2">
                                                <h6 class="mb-0"><a href="#" class="">Amira ben abdallah</a></h6>
                                                <small>1 hier</small>
                                            </div>
                                            <div class="mt-3">
                                                <span class="badge badge-danger">Non payé</span>
                                            </div>
                                        </div>
                                        <div class="media-support-body">
                                            <p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="iq-card">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Statistiques des payements</h4>
                                    </div>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                        <div class="dropdown">
                                       <span class="dropdown-toggle text-primary" id="dropdownMenuButton3" data-toggle="dropdown">
                                       <i class="ri-more-2-fill"></i>
                                       </span>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                                <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                                <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="bar-chart-6"></div>
                            </div>
                            <div class="iq-card">
                                <div class="iq-card-body p-0">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-lg-6">
                                            <div class="p-4">
                                                <div class=" d-flex align-items-center">
                                                    <a href="#" class="iq-icon-box rounded-circle iq-bg-primary">
                                                        <i class="ri-facebook-fill"></i>
                                                    </a>
                                                    <h4 class="mb-0"><span class="counter">200</span>k<small class="d-block font-size-14">Posts</small></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div id="wave-chart-7"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="iq-card">
                                <div class="iq-card-body p-0">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-lg-6">
                                            <div class="p-4">
                                                <div class=" d-flex align-items-center">
                                                    <a href="#" class="iq-icon-box rounded-circle iq-bg-success">
                                                        <i class="ri-twitter-fill"></i>
                                                    </a>
                                                    <h4 class="mb-0"><span class="counter">400</span>k<small class="d-block font-size-14">Tweets</small></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div id="wave-chart-8"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Activités</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown">
                                 <span class="dropdown-toggle text-primary" id="dropdownMenuButton4" data-toggle="dropdown">
                                 Voir tout
                                 </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>Voir</a>
                                        <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Supprimer</a>
                                        <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Modifier</a>
                                        <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Imprimer</a>
                                        <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Télécharger</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <ul class="iq-timeline">
                                <li>
                                    <div class="timeline-dots"></div>
                                    <h6 class="float-left mb-1">Clients actifs</h6>
                                    <small class="float-right mt-1">24 November 2021</small>
                                    <div class="d-inline-block w-100">
                                        <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-dots border-success"></div>
                                    <h6 class="float-left mb-1">Enseignants actifs</h6>
                                    <small class="float-right mt-1">23 November 2021</small>
                                    <div class="d-inline-block w-100">
                                        <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-dots border-danger"></div>
                                    <h6 class="float-left mb-1">Cours actuelle</h6>
                                    <small class="float-right mt-1">20 November 2021</small>
                                    <div class="d-inline-block w-100">
                                        <p>Bonbon macaroon jelly beans <a href="#">gummi bears</a>gummi bears jelly lollipop apple</p>
                                        <div class="iq-media-group">
                                            <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/05.jpg') }}" alt="">
                                            </a>
                                            <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/06.jpg') }}" alt="">
                                            </a>
                                            <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/07.jpg') }}" alt="">
                                            </a>
                                            <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/08.jpg') }}" alt="">
                                            </a>
                                            <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/09.jpg') }}" alt="">
                                            </a>
                                            <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/10.jpg') }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-dots border-primary"></div>
                                    <h6 class="float-left mb-1">Call center</h6>
                                    <small class="float-right mt-1">19 November 2021</small>
                                    <div class="d-inline-block w-100">
                                        <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-dots border-warning"></div>
                                    <h6 class="float-left mb-1">Evénements</h6>
                                    <small class="float-right mt-1">15 November 2021</small>
                                    <div class="d-inline-block w-100">
                                        <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="iq-card">
                        <img src="{{ asset('assets/images/small/img-1.jpg') }}" class="img-fluid w-100 rounded" alt="#">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Notifications</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown">
                                 <span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                                 <i class="ri-settings-5-fill"></i>
                                 </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                        <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                        <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <span class="font-size-16">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                            <small class="text-muted mt-3 d-inline-block w-100">Saturday, 7 December 2021</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Liste des agences</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown">
                                 <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                 <i class="ri-more-2-fill"></i>
                                 </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>Voir</a>
{{--                                         <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                        <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                        <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                        <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 table-borderless">
                                    <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Société</th>
                                        <th scope="col">Adresse</th>
                                        <th scope="col">Téléphone</th>
                                        <th scope="col">Region</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Agence Lac 1</td>
                                        <td>Boosteno</td>
                                        <td>Tunis lac 1</td>
                                        <td>
                                            70 111 222
                                        </td>
                                        <td>
                                           Tunis
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
