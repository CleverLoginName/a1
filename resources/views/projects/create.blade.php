@extends('layouts.default')


@section('main-content')
    <section class="box new-item-wrapper">
        <section class="box-header"></section>
        <section class="box-body">
            <form class="row new-item-from-wrapper" role="form" method="post" id="new-prod-form"
                  enctype="multipart/form-data" novalidate="novalidate" action="{!! url('/projects') !!}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="consultant_id" id="consultant_id" value="">
                <input type="hidden" name="template_id" id="template_id" value="">
                <section class="row form-group">
                    <section class="col-md-12">
                        @if ($errors->has())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif
                    </section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Job# / Consultant</label></section>
                    <section class="col-md-3">

                        {!! Form::text('job',null,['class'=>'form-control required','placeholder'=>"Job#",'id'=>'job']) !!}
                    </section>
                    <section class="col-md-5">
                        {!! Form::text('consultant',null,['class'=>'form-control required','placeholder'=>"Consultant",'id'=>'consultant']) !!}
                    </section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Client Name 1</label></section>
                    <section class="col-md-2">

                        {!! Form::select('title_1', ['Mr.' => 'Mr', 'Miss.' => 'Miss', 'Mrs.' => 'Mrs'],null,['id'=>'title_1','class'=>'form-control required']) !!}
                    </section>
                    <section class="col-md-3">
                        {!! Form::text('first_name_1',null,['class'=>'form-control required','placeholder'=>"First Name",'id'=>'first_name_1']) !!}
                    </section>
                    <section class="col-md-3">
                        {!! Form::text('last_name_1',null,['class'=>'form-control required','placeholder'=>"Last Name",'id'=>'last_name_1']) !!}
                    </section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"></section>
                    <section class="col-md-4">
                        {!! Form::text('mobile_1',null,['class'=>'form-control required','placeholder'=>"Mobile",'id'=>'mobile_1']) !!}
                    </section>
                    <section class="col-md-4">
                        {!! Form::email('email_1',null,['class'=>'form-control required','placeholder'=>"E-Mail",'id'=>'email_1']) !!}
                    </section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Client Name 2</label></section>
                    <section class="col-md-2">
                        {!! Form::select('title_2', ['Mr.' => 'Mr', 'Miss.' => 'Miss', 'Mrs.' => 'Mrs'],null,['id'=>'title_2','class'=>'form-control required']) !!}
                    </section>
                    <section class="col-md-3">
                        {!! Form::text('first_name_2',null,['class'=>'form-control required','placeholder'=>"First Name",'id'=>'first_name_2']) !!}
                    </section>
                    <section class="col-md-3">
                        {!! Form::text('last_name_2',null,['class'=>'form-control required','placeholder'=>"Last Name",'id'=>'last_name_2']) !!}
                    </section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"></section>
                    <section class="col-md-4">
                        {!! Form::text('mobile_2',null,['class'=>'form-control required','placeholder'=>"Mobile",'id'=>'mobile_2']) !!}
                    </section>
                    <section class="col-md-4">
                        {!! Form::email('email_2',null,['class'=>'form-control required','placeholder'=>"E-Mail",'id'=>'email_2']) !!}
                    </section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Design Template</label></section>
                    <section class="col-md-6">
                        {!! Form::text('template',null,['class'=>'form-control required','placeholder'=>"Template",'id'=>'template']) !!}
                    </section>
                    <section class="col-md-2">
                        {!! Form::text('scale',null,['class'=>'form-control required','placeholder'=>"Scale",'id'=>'scale', 'disabled'=>'disabled']) !!}
                    </section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Build Address</label></section>
                    <section class="col-md-2">
                        {!! Form::text('lot',null,['class'=>'form-control required','placeholder'=>"Lot#",'id'=>'lot']) !!}
                    </section>
                    <section class="col-md-2">
                        {!! Form::text('no_unit',null,['class'=>'form-control required','placeholder'=>"No/Unit",'id'=>'no_unit']) !!}
                    </section>
                    <section class="col-md-4">
                        {!! Form::text('street_name',null,['class'=>'form-control required','placeholder'=>"Street Name",'id'=>'street_name']) !!}
                    </section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label></label></section>
                    <section class="col-md-4">
                        {!! Form::text('town',null,['class'=>'form-control required','placeholder'=>"Suburb/Town",'id'=>'town']) !!}
                    </section>
                    <section class="col-md-2">
                        {!! Form::text('postal_code',null,['class'=>'form-control required','placeholder'=>"Postal Code",'id'=>'postal_code']) !!}
                    </section>
                    <section class="col-md-2">
                        {!! Form::text('state',null,['class'=>'form-control required','placeholder'=>"State",'id'=>'state']) !!}
                    </section>

                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Budget/Energy</label></section>
                    <section class="col-md-2">
                        {!! Form::text('budget',null,['class'=>'form-control required','placeholder'=>"$ Budget(If App)",'id'=>'budget']) !!}
                    </section>
                    <section class="col-md-2">
                        {!! Form::text('energy_consumption',null,['class'=>'form-control required','placeholder'=>"Total Energy per SQM",'id'=>'energy_consumption']) !!}
                    </section>
                    <section class="col-md-4">
                        {!! Form::text('rating',null,['class'=>'form-control required','placeholder'=>"Rating",'id'=>'rating', 'disabled'=>'disabled']) !!}
                    </section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label></label></section>
                    <section class="col-md-1">
                        House
                    </section>
                    <section class="col-md-1">
                        {!! Form::text('house',null,['class'=>'form-control required','placeholder'=>"5w per SQM",'id'=>'house', 'disabled'=>'disabled']) !!}
                    </section>

                    <section class="col-md-1"></section>

                    <section class="col-md-1">
                        Garage
                    </section>
                    <section class="col-md-1">
                        {!! Form::text('garage',null,['class'=>'form-control required','placeholder'=>"3w per SQM",'id'=>'garage', 'disabled'=>'disabled']) !!}
                    </section>

                    <section class="col-md-1"></section>

                    <section class="col-md-1">
                        House
                    </section>
                    <section class="col-md-1">
                        {!! Form::text('porch',null,['class'=>'form-control required','placeholder'=>"4w per SQM",'id'=>'porch', 'disabled'=>'disabled']) !!}
                    </section>


                </section>
                <section class="row box-footer" id="form-footer">
                    <button type="submit"
                            class="btn add-item-btn">Add <img src="resources/images/spinning-circles.svg"
                                                              class="loading-img-btn" style="display:none;"
                                                              id="1bf1a6a6-757b-921f-0a96-f95ffc63c6bc-new-product-loading">
                    </button>
                    <a id="prod-frm-reset" href="{!! url('products') !!}" class="btn add-item-btn" style="margin-right:10px;">Reset</a>
                </section>
            </form>
        </section>
    </section>

    <div class="modal fade consultant_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div id="consultants">

                    <!-- class="search" automagically makes an input a search field. -->
                    <input class="search" placeholder="Search" />
                    <!-- class="sort" automagically makes an element a sort buttons. The date-sort value decides what to sort by. -->
                    <button class="sort" data-sort="name">
                        Sort
                    </button>

                    <!-- Child elements of container with class="list" becomes list items -->
                    <ul class="list">
                        @foreach($consultants as $consultant)

                        <li>
                            <div class="row form-group">
                                <section class="col-md-4">
                                    <div class="row">
                                        IMG
                                    </div>
                                    <div class="row">
                                        <button class="assign" data-consultant-id="{!! $consultant->id !!}" data-consultant-name="{!! $consultant->first_name.' '.$consultant->first_name !!}">Assign</button>
                                    </div>
                                </section>
                                <section class="col-md-8">
                                    <div class="row">
                                    <h3 class="name">{!! $consultant->first_name.' '.$consultant->first_name !!}</h3>
                                        </div>
                                    <div class="row">
                                    test
                                        </div>
                                </section>
                            </div>

                        </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade template_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div id="templates">

                    <!-- class="search" automagically makes an input a search field. -->
                    <input class="search" placeholder="Search" />
                    <!-- class="sort" automagically makes an element a sort buttons. The date-sort value decides what to sort by. -->
                    <button class="sort" data-sort="name_1">
                        Sort
                    </button>

                    <!-- Child elements of container with class="list" becomes list items -->
                    <ul class="list">
                        @foreach($templates as $template)

                        <li>

                            <h3 class="name_1 template-item"
                                data-template-id="{!! $template->id !!}"
                                data-template-name="{!! $template->name !!}"
                                data-template-scale="{!! $template->scale !!}"
                                data-template-energy-rating="{!! $template->energy_rating !!}"
                                data-template-sqm-house="{!! $template->sqm_house !!}"
                                data-template-sqm-porch="{!! $template->sqm_porch !!}"
                                data-template-sqm-garage="{!! $template->sqm_garage !!}"
                            >{!! $template->name !!}</h3>

                        </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
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
                class="breadcrumb-text">Projects</span></button>
    <i class="fa fa-chevron-right breadcrumb-icn " id="1-ic"></i>

    <button data-ref="sub-menu-items" data-index="2" class="breadcrumb-btn font-blue" type="submit" id="2-bc"><span
                class="breadcrumb-text">New</span></button>
    <i class="fa fa-chevron-right breadcrumb-icn font-blue" id="3-ic"></i>
@stop


@section('post-js')
    {{ Html::script('js/list.min.js') }}
<script>

    var options = {
        valueNames: [ 'name' ]
    };

    var userList = new List('consultants', options);
    var templateList = new List('templates', options);


    $('#consultant').on('click', function () {
        $('.consultant_modal').modal('show');
    });
    $('#template').on('click', function () {
        $('.template_modal').modal('show');
    });

    $('.assign').on('click', function () {
        var consultant_id = $(this).data('consultant-id');
        var consultant_name = $(this).data('consultant-name');
        $('#consultant').val(consultant_name);
        $('#consultant_id').val(consultant_id);
        $('.consultant_modal').modal('hide');
    });

    $('.template-item').on('click', function () {console.log($(this).data('template-id'));
        var template_name = $(this).data('template-name');
        var template_id = $(this).data('template-id');
        var scale = $(this).data('template-scale');
        var energy_rating = $(this).data('template-energy-rating');
        var house = $(this).data('template-sqm-house');
        var porch = $(this).data('template-sqm-porch');
        var garage = $(this).data('template-sqm-garage');
        $('#template_id').val(template_id);
        $('#template').val(template_name);
        $('#scale').val('1 : '+scale);
        $('#rating').val(energy_rating);
        $('#house').val(house);
        $('#garage').val(garage);
        $('#porch').val(porch);



        $('.template_modal').modal('hide');
    });
</script>
@stop