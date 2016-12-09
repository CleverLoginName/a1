@extends('layouts.default')


@section('main-content')
    <section class="box new-item-wrapper">

        <section class="col-md-4">
            <section class="box-header"></section>
            <section class="box-body box" style="min-height: 250px">
                    {!! Form::open(array('url' => '/templates/'.$template->id.'/plans','files'=>'true','class'=>'dropzone')) !!}
                    <div class="fallback">
                        <input name="file" id="file" type="file" multiple/>
                    </div>
                {!! Form::close() !!}
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



        var myDropzone = new Dropzone("input#file");
        Dropzone.myDropzone.options = {
            url:'templates/create/plans'
        };
        myDropzone.on("sending", function(file, xhr, formData) {
            // Will send the filesize along with the file as POST data.
            formData.append("template_id", 100);
        });


    </script>
@stop