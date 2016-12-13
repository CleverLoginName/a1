@extends('layouts.default')


@section('main-content')
    <section class="box new-item-wrapper">

        <section class="col-md-4">
            <section class="box-header"></section>
            <section class="box-body box" style="min-height: 250px">
                {!! Form::open(['url' => 'templates/create/plans', 'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone']) !!}

                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="template_id" id="template_id" value="{!! session('template')->id !!}">
                {!! Form::close() !!}
            </section>
        </section>


        <section class="col-md-8">
            <section class="box-header"></section>
            <section class="box-body">
                @if($empty_form)
                    @foreach($templatesPlans as $templatesPlan)
                        <section class="row form-group">
                            <section class="col-md-6">

                                <img src="{!! asset($templatesPlan->img) !!}" class="col-md-12"/>

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
                @else
                    @foreach($templatesPlans as $templatesPlan)
                        <section class="row form-group">
                            <section class="col-md-6">

                                <img src="{!! asset($templatesPlan->img) !!}"/>

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
    <script>
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
            acceptedFiles: '.jpg, .jpeg, .png, .svg'
        });

        myDropzone.on("success", function (file, resp) {
            window.location.href = '{!! url('templates/create/add-plans') !!}';
//console.log('test');
        });


    </script>
@stop