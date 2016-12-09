@extends('layouts.default')


@section('main-content')
    <section class="box new-item-wrapper">

        <section class="col-md-4">
            <section class="box-header"></section>
            <section class="box-body box" style="min-height: 250px">


                        <input id="filexx" type="file"/>
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="template_id" id="template_id" value="{!! $template->id !!}">

        </section>
        </section>


        <section class="col-md-8">
            <section class="box-header"></section>
            <section class="box-body">

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
                class="breadcrumb-text">{!! $template->name !!}</span></button>
    <i class="fa fa-chevron-right breadcrumb-icn font-blue" id="3-ic"></i>
@stop

@section('post-js')
    {{ Html::script('js/dropzone.js') }}
    <script>
        Dropzone.autoDiscover = false;
        jQuery(document).ready(function(){
        var myDropzone = new Dropzone("#filexx",{
            maxFiles: 1,
            uploadMultiple: false,
            sending : function(file, xhr, formData){
                formData.append('_token', $('#token').val()),
                formData.append('template_id', $('#template_id').val())
            },
            url: "{!! url('templates/create/plans') !!}",
            acceptedFiles: '.jpg, .jpeg, .png, .svg'
        });

        myDropzone.on("success", function(file,resp){
            location.reload();

        });
        });

    </script>
@stop