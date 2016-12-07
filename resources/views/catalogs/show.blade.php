@extends('layouts.default')

@section('main-menu')
    @parent

@endsection


@section('sub-menu')
    @parent

@endsection



@section('main-content')
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <h3>Catalogs <small>More details about the catalog</small></h3>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <a href="{!! url('catalogs/create') !!}" class="btn btn-success alignright">Add a New Catalog</a> </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{!! $catalog->name !!} <small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <h2>{!! $catalog->name !!} <small></small></h2>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <h2>{!! $catalog->description !!} <small></small></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>





@endsection

@section('sub-content')
    <p>This is my sub content.</p>
@endsection


@section('post-js')
    <!-- Datatables -->
    {{ Html::script('vendors/datatables.net/js/jquery.dataTables.min.js') }}
    {{ Html::script('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"') }}
    {{ Html::script('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}
    <script>


        $(document).ready(function(){
            $('#datatable').DataTable();
        });
    </script>


@endsection