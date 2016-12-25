@extends('layouts.default')


@section('main-content')
    <section class="box new-item-wrapper">

        <section class="col-md-4">
            <section class="box-header"></section>
            <section class="box-body box" >
                {!! Form::open(['url' => 'templates/create/plans', 'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone','style'=>"min-height: 250px"]) !!}

                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="template_id" id="template_id" value="{!! session('template')->id !!}">
                {!! Form::close() !!}
            </section>
        </section>
<?php
            $catalogs = \App\Catalog::all();
            $levels = [
                'Basement','Ground Floor','1st Floor','2nd Floor','3rd Floor','4th Floor','5th Floor'
            ];
            ?>

        <section class="col-md-8">
            <section class="box-header"></section>
            <section class="box-body">
                @if($empty_form)
                    @foreach($templatesPlans as $templatesPlan)
                        <section class="row form-group">
                            <section class="col-md-6">

                                <a href="{!! url('templates/create/add-plans/'.$templatesPlan->id.'/canvas') !!}"><img src="{!! asset($templatesPlan->img) !!}" class="col-md-12"/>

                                </a>
                                @php
                                $model = "#modal_".$templatesPlan->id;
                                @endphp

                                <button class="btn btn-primary" data-target="{!! $model !!}" data-toggle="modal" >Crop / Rotate Plan</button>
                            </section>
                            <section class="col-md-6">
                                {!! Form::open(['url' => 'templates/create/plan-data','method'=>'POST']) !!}

                                {{Form::hidden('id',$templatesPlan->id)}}
                                <section class="row form-group">
                                    <section class="col-md-12"><h4>Save Template Plan</h4></section>
                                </section>
                                <section class="row form-group">
                                    <section class="col-md-4">Design</section>
                                    <section class="col-md-8">
                                        @if($templatesPlan->design != '')
                                            <input class="form-control required" id="design"
                                                   name="design" aria-required="true" type="text" placeholder="" value="{!! $templatesPlan->design !!}">
                                                   @else
                                                    <input class="form-control required" id="design"
                                            name="design" aria-required="true" type="text" placeholder="" value="">
                                        @endif
                                        </section>
                                </section>
                                <section class="row form-group">
                                    <section class="col-md-4">Level</section>
                                    <section class="col-md-8">
<?php  $i = 0;$j = 0; ?>
                                        <select class="form-control required"
                                                id="prod-frm-sub-cat" name="level" aria-required="true"
                                                aria-invalid="true">
                                            @foreach($levels as $level)
                                                <?php ++$i; ?>

                                                    @if($templatesPlan->level == $i)
                                                        <option value="{!! $i !!}" selected="selected">{!! $level !!}</option>
                                                        @else
                                                        <option value="{!! $i !!}">{!! $level !!}</option>
                                                        @endif
                                            @endforeach
                                        </select>


                                    </section>
                                </section>
                                <section class="row form-group">
                                    <section class="col-md-4">Catalog</section>
                                    <section class="col-md-8">
                                        <select class="form-control required"
                                                id="catalog_id" name="catalog_id" aria-required="true"
                                                aria-invalid="true">
                                        @foreach($catalogs as $catalog)
                                            <?php ++$j; ?>

                                            @if($templatesPlan->catalog_id == $j)
                                                <option value="{!! $catalog->id !!}" selected="selected">{!! $catalog->name !!}</option>
                                            @else
                                                <option value="{!! $catalog->id !!}">{!! $catalog->name !!}</option>
                                            @endif
                                        @endforeach
                                            </select>
                                    </section>
                                </section>
                                <section class="row form-group">
                                    <section class="col-md-12">
                                        <section class="col-md-6">
                                        <button type="submit" style="float: right"
                                                class="btn add-item-btn">Save <img
                                                    src="resources/images/spinning-circles.svg"
                                                    class="loading-img-btn" style="display:none;"
                                                    id="1bf1a6a6-757b-921f-0a96-f95ffc63c6bc-new-product-loading">
                                        </button></section>
                                            <section class="col-md-6" ><a style="float: left"class="btn add-item-btn" href="{!! url('templates/create/add-plans/'.$templatesPlan->id.'/delete') !!}">Delete <img
                                                    src="resources/images/spinning-circles.svg"
                                                    class="loading-img-btn" style="display:none;">
                                        </a></section>
                                    </section>
                                </section>
                                {!! Form::close() !!}
                            </section>
                        </section>
                    @endforeach
                @else
                    @foreach($templatesPlans as $templatesPlan)
                        <section class="row form-group">
                            <section class="col-md-6">

                                <img src="{!! asset($templatesPlan->img_300x200) !!}"/>

                            </section>
                            <section class="col-md-6">
                                {!! Form::open(['url' => 'templates/create/plan-data','method'=>'POST']) !!}

                                {{Form::hidden('id',$templatesPlan->id)}}
                                <section class="row form-group">
                                    <section class="col-md-4">Design</section>
                                    <section class="col-md-8">
                                        <input class="form-control required" id="design"
                                               name="design" aria-required="true" type="text" placeholder="" value="{!! $templatesPlan->design !!}"></section>
                                </section>
                                <section class="row form-group">
                                    <section class="col-md-4">Level</section>
                                    <section class="col-md-8"><input class="form-control required" id="level"
                                                                     name="level" aria-required="true" type="text"
                                                                     placeholder="" value="{!! $templatesPlan->level !!}"></section>
                                </section>
                                <section class="row form-group">
                                    <section class="col-md-4">Catalog</section>
                                    <section class="col-md-8"><input class="form-control required" id="catalog_id"
                                                                     name="catalog_id" aria-required="true" type="text"
                                                                     placeholder="" value="{!! $templatesPlan->catalog_id !!}"></section>
                                </section>
                                <section class="row form-group">
                                    <section class="col-md-12">
                                        <button type="submit"
                                                class="btn add-item-btn">Add <img
                                                    src="resources/images/spinning-circles.svg"
                                                    class="loading-img-btn" style="display:none;"
                                                    id="1bf1a6a6-757b-921f-0a96-f95ffc63c6bc-new-product-loading">
                                        </button>
                                    </section>
                                </section>
                                {!! Form::close() !!}
                            </section>
                        </section>
                    @endforeach
                @endif
            </section>
        </section>


    </section>

    @if($empty_form)
        @foreach($templatesPlans as $templatesPlan)
            @php
                $model = "modal_".$templatesPlan->id;
            @endphp

    <div class="modal fade" id="{!! $model !!}" role="dialog" aria-labelledby="modalLabel" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">Cropper</h4>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <img id="image_{!! $templatesPlan->id !!}" src="{!! asset($templatesPlan->img) !!}" alt="Picture">
                    </div>
                    <button onclick="rotate_left_{!! $templatesPlan->id !!}()">Rotate Clockwise</button>
                    <button onclick="rotate_right_{!! $templatesPlan->id !!}()">Rotate Anti-clockwisw</button>
                </div>
                <div class="modal-footer">
                    {!! Form::open(['url' => 'templates/create/add-plans/'.$templatesPlan->id.'/crop', 'method' => 'post']) !!}
                    <input type="hidden" name="width" id="width_{!! $templatesPlan->id !!}" value="">
                    <input type="hidden" name="height" id="height_{!! $templatesPlan->id !!}" value="">
                    <input type="hidden" name="x" id="x_{!! $templatesPlan->id !!}" value="">
                    <input type="hidden" name="y" id="y_{!! $templatesPlan->id !!}" value="">
                    <input type="hidden" name="rotate" id="rotate_{!! $templatesPlan->id !!}" value="">
                    {!! Form::submit('Save & Exit') !!}
                    {!! Form::close() !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif


@stop


@section('sub-content')
    <section class="details-outer-wrapper">
        <section class="details-inner-wrapper">
            <div class="info-img-wrapper"><img src="{{ URL::asset('resources/images/home.jpg') }}"
                                               class="img-responsive"/>
            </div>
            <div class="info-img-wrapper">
                <h3><img src="{{ URL::asset('resources/images/cus_logo.png') }}" class="img-responsive"
                         style="width:60%;margin:0 auto;"/></h3>
            </div>
        </section>
    </section>
@stop

@section('bread-crumb')
    <a href="{!! url('/logout') !!}" class="custom-login-button">
        <span>Logout</span>
    </a>
    <button data-ref="sub-menu-items" data-index="1" class="breadcrumb-btn cursor-normal" type="submit" id="1-bc">
            <span class="bc-img-wrap"><img class="breadcrumb-main-icon"
                                           src="{{ URL::asset('resources/images/home_ico_black.png') }}"></span><span
                class="breadcrumb-text">Templates</span></button>
    <i class="fa fa-chevron-right breadcrumb-icn " id="1-ic"></i>

    <button data-ref="sub-menu-items" data-index="2" class="breadcrumb-btn cursor-normal" type="submit" id="2-bc"><span
                class="breadcrumb-text">New</span></button>
    <i class="fa fa-chevron-right breadcrumb-icn font-blue" id="3-ic"></i>
    <button data-ref="sub-menu-items" data-index="2" class="breadcrumb-btn font-blue" type="submit" id="2-bc"><span
                class="breadcrumb-text">{!! session('template')->name !!}</span></button>
    <i class="fa fa-chevron-right breadcrumb-icn font-blue" id="3-ic"></i>
@stop

@section('post-js')
    {{ Html::script('js/dropzone.js') }}
    {{ Html::script('js/cropper.js') }}
    {{ Html::script('js/spin.min.js') }}
    <script>

        var opts = {
            lines: 11 // The number of lines to draw
            , length: 18 // The length of each line
            , width: 14 // The line thickness
            , radius: 42 // The radius of the inner circle
            , scale: 1 // Scales overall size of the spinner
            , corners: 1 // Corner roundness (0..1)
            , color: '#000' // #rgb or #rrggbb or array of colors
            , opacity: 0.25 // Opacity of the lines
            , rotate: 0 // The rotation offset
            , direction: 1 // 1: clockwise, -1: counterclockwise
            , speed: 1 // Rounds per second
            , trail: 44 // Afterglow percentage
            , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
            , zIndex: 2e9 // The z-index (defaults to 2000000000)
            , className: 'spinner' // The CSS class to assign to the spinner
            , top: '44%' // Top position relative to parent
            , left: '50%' // Left position relative to parent
            , shadow: false // Whether to render a shadow
            , hwaccel: false // Whether to use hardware acceleration
            , position: 'absolute' // Element positioning
        }

        Dropzone.autoDiscover = false;
        /* var myDropzone = new Dropzone("#filexx",{ url: "{!! url('templates/create/plans') !!}"});*/

        var myDropzone = new Dropzone("#real-dropzone", {
            maxFiles: 1,
            uploadMultiple: false,
            sending: function (file, xhr, formData) {
                formData.append('_token', $('#token').val()),
                        formData.append('template_id', $('#template_id').val())
            },
            url: "{!! url('templates/create/plan-image') !!}",
            acceptedFiles: '.jpg, .jpeg, .png, .svg, .pdf'
        });

        myDropzone.on("success", function (file, resp) {
           window.location.href = '{!! url('templates/create/add-plans') !!}';
//console.log('test');
        });
        myDropzone.on("addedfile", function(file) {
            var target = document.getElementById('real-dropzone')
            var spinner = new Spinner(opts).spin(target);
        });


    </script>


    <script>
        @if($empty_form)
           @foreach($templatesPlans as $templatesPlan)

        var cropBoxData_{!! $templatesPlan->id !!};
        var canvasData_{!! $templatesPlan->id !!};
        var cropper_{!! $templatesPlan->id !!};


        function rotate_left_{!! $templatesPlan->id !!}() {
            cropper_{!! $templatesPlan->id !!}.rotate(45);
        }
        function rotate_right_{!! $templatesPlan->id !!}() {
            cropper_{!! $templatesPlan->id !!}.rotate(-45);
        }

           @endforeach
           @endif
       window.addEventListener('DOMContentLoaded', function () {

            @if($empty_form)
            @foreach($templatesPlans as $templatesPlan)
            @php
                $model = "modal_".$templatesPlan->id;
            @endphp

            var image_{!! $templatesPlan->id !!} = document.getElementById('image_{!! $templatesPlan->id !!}');
            $('#modal_{!! $templatesPlan->id !!}').on('shown.bs.modal', function () {
                cropper_{!! $templatesPlan->id !!} = new Cropper(image_{!! $templatesPlan->id !!}, {
                    autoCropArea: 0.5,
                    ready: function () {

                        // Strict mode: set crop box data first
                        cropper_{!! $templatesPlan->id !!}.setCropBoxData(cropBoxData_{!! $templatesPlan->id !!}).setCanvasData(canvasData_{!! $templatesPlan->id !!});
                    },
                    crop: function(e) {

                        $('#x_{!! $templatesPlan->id !!}').val(e.detail.x);
                        $('#y_{!! $templatesPlan->id !!}').val(e.detail.y);
                        $('#width_{!! $templatesPlan->id !!}').val(e.detail.width);
                        $('#height_{!! $templatesPlan->id !!}').val(e.detail.height);
                        $('#rotate_{!! $templatesPlan->id !!}').val(e.detail.rotate);

                    }
                });
            }).on('hidden.bs.modal', function () {
                cropBoxData_{!! $templatesPlan->id !!} = cropper_{!! $templatesPlan->id !!}.getCropBoxData();
                canvasData_{!! $templatesPlan->id !!} = cropper_{!! $templatesPlan->id !!}.getCanvasData();
                cropper_{!! $templatesPlan->id !!}.destroy();
            });


            @endforeach
            @endif

        });
    </script>


@stop
@section('post-css')

    {{ Html::style('css/cropper.css') }}
    <style>
        .dz-success-mark{
            display: none !important;
        }
        .dz-error-mark{
            display: none !important;
        }
    </style>
@stop