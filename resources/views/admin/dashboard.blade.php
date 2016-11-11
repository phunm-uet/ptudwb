@extends('admin.layouts')
@section('title')
    Dashboard
@stop
@section('style')
    
    <style type="text/css" media="screen">
        .panel-green {
            background-color: #2ecc71;
        }
        .panel-heading {
            color: white;
        }
        
        .panel-blue {
            background-color: #3498db;
        }
        .panel-yellow {
            background-color: #f1c40f;
        }

        .panel-carrot {
            background-color: #e67e22;
        }
        .huge {
            font-weight: bold;
            font-size: 36px;
        }
    </style>
@stop
@section('title')
    Dashboard
@stop
@section('content')

        <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
            <h2>Dashboard</h2>
            <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-3">
                            <div class="panel panel-blue">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                           <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{ $num_user }}</div>
                                            <div>Members</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('members') }}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- End of panel User --}}

                        <div class="col-md-3">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                           <i class="fa fa-file-o fa-4x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{ $num_doc }}</div>
                                            <div>Documents</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('documents') }}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                           <i class="fa fa-list fa-4x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{ $num_category }}</div>
                                            <div>Categorys</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('categorys') }}">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- End of panel User --}}

                        <div class="col-md-3">
                            <div class="panel panel-carrot">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                          <i class="fa fa-comments-o fa-4x" aria-hidden="true"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{ $num_com }}</div>
                                            <div>Comments</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- End of panel User --}}                    
                    </div>                    
                </div>
            {{-- End of class overview --}} 
            <hr>

        </div>
    </div>
@stop