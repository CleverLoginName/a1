@extends('layouts.default')


@section('main-content')
    <section class="box new-item-wrapper">
        <section class="box-header"></section>
        <section class="box-body">
            <form class="row new-item-from-wrapper" role="form" method="post" id="new-prod-form"
                  enctype="multipart/form-data" novalidate="novalidate" action="{!! url('/products') !!}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                        <select class="form-control required"
                                id="prod-frm-sub-cat" name="catalog_id" aria-required="true"
                                aria-invalid="true">
                        </select>
                    </section>
                    <section class="col-md-5"><input class="form-control required" id="name"
                                                     name="name" aria-required="true" type="text"></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Client Name 1</label></section>
                    <section class="col-md-2">
                        <select class="form-control required"
                                id="prod-frm-sub-cat" name="title_1" aria-required="true"
                                aria-invalid="true">
                            <option value="Mr.">Mr</option>
                            <option value="Miss.">Miss</option>
                            <option value="Mrs.">Mrs</option>
                        </select>
                    </section>
                    <section class="col-md-3"><input class="form-control required" id="first_name_1"
                                                      name="first_name_1" aria-required="true" type="text" placeholder="First Name"></section>
                    <section class="col-md-3"><input class="form-control required" id="last_name_1"
                                                     name="first_name_1" aria-required="true" type="text" placeholder="Last Name"></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"></section>
                    <section class="col-md-4">
                        <input class="form-control required" id="mobile_1"
                               name="first_name" aria-required="true" type="text" placeholder="Mobile">
                    </section>
                    <section class="col-md-4">
                        <input class="form-control required" id="email_1"
                               name="first_name" aria-required="true" type="text" placeholder="E-Mail">
                    </section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Client Name 2</label></section>
                    <section class="col-md-2">
                        <select class="form-control required"
                                id="prod-frm-sub-cat" name="title_2" aria-required="true"
                                aria-invalid="true">
                            <option value="Mr.">Mr</option>
                            <option value="Miss.">Miss</option>
                            <option value="Mrs.">Mrs</option>
                        </select>
                    </section>
                    <section class="col-md-3"><input class="form-control required" id="first_name_2"
                                                      name="first_name_1" aria-required="true" type="text" placeholder="First Name"></section>
                    <section class="col-md-3"><input class="form-control required" id="last_name_2"
                                                     name="first_name_1" aria-required="true" type="text" placeholder="Last Name"></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"></section>
                    <section class="col-md-4">
                        <input class="form-control required" id="mobile_2"
                               name="first_name" aria-required="true" type="text" placeholder="Mobile">
                    </section>
                    <section class="col-md-4">
                        <input class="form-control required" id="email_2"
                               name="first_name" aria-required="true" type="text" placeholder="E-Mail">
                    </section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Design Template</label></section>
                    <section class="col-md-6"><input class="form-control required" id="template"
                                                     name="template" aria-required="true" type="text"></section>
                    <section class="col-md-2"><input class="form-control required" id="scale"
                                                     name="scale" aria-required="true" type="text" placeholder="Scale"></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Build Address</label></section>
                    <section class="col-md-2"><input class="form-control required" id="lot"
                                                     name="lot" aria-required="true" type="text" placeholder="Lot#">
                    </section>
                    <section class="col-md-2"><input class="form-control required" id="no_unit"
                                                     name="no_unit" aria-required="true" type="text" placeholder="No/Unit">
                    </section>
                    <section class="col-md-4"><input class="form-control required" id="street_name"
                                                     name="street_name" aria-required="true" type="text" placeholder="Street Name">
                    </section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label></label></section>
                    <section class="col-md-4"><input class="form-control required" id="town" name="town" aria-required="true" type="text" placeholder="Suburb/Town">
                    </section>
                    <section class="col-md-2"><input class="form-control required" id="postal_code"
                                                     name="postal_code" aria-required="true" type="text" placeholder="Postal Code">
                    </section>
                    <section class="col-md-2"><input class="form-control required" id="state"
                                                     name="state" aria-required="true" type="text" placeholder="State">
                    </section>

                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Budget/Energy</label></section>
                    <section class="col-md-2"><input class="form-control required" id="lot"
                                                     name="lot" aria-required="true" type="text" placeholder="$ Budget(If App)">
                    </section>
                    <section class="col-md-2"><input class="form-control required" id="no_unit"
                                                     name="no_unit" aria-required="true" type="text" placeholder="Total Energy per SQM">
                    </section>
                    <section class="col-md-4"><input class="form-control required" id="rating"
                                                     name="rating" aria-required="true" type="text" placeholder="Rating">
                    </section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label></label></section>
                    <section class="col-md-1">
                        House
                    </section>
                    <section class="col-md-1">
                        <input class="form-control required" id="house" name="house" aria-required="true" type="text" placeholder="5w per SQM">
                    </section>

                    <section class="col-md-1"></section>

                    <section class="col-md-1">
                        Garage
                    </section>
                    <section class="col-md-1">
                        <input class="form-control required" id="garage" name="garage" aria-required="true" type="text" placeholder="3w per SQM">
                    </section>

                    <section class="col-md-1"></section>

                    <section class="col-md-1">
                        House
                    </section>
                    <section class="col-md-1">
                        <input class="form-control required" id="porch" name="porch" aria-required="true" type="text" placeholder="4w per SQM">
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
                class="breadcrumb-text">Products</span></button>
    <i class="fa fa-chevron-right breadcrumb-icn " id="1-ic"></i>

    <button data-ref="sub-menu-items" data-index="2" class="breadcrumb-btn font-blue" type="submit" id="2-bc"><span
                class="breadcrumb-text">New</span></button>
    <i class="fa fa-chevron-right breadcrumb-icn font-blue" id="3-ic"></i>
@stop