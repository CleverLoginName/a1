@extends('layouts.default')


@section('main-content')
    <section id="vue">
    <section class="box new-item-wrapper">
        <section class="box-header"></section>
        <section class="box-body">
            <form  files="true" class="row new-item-from-wrapper" role="form" method="post" id="new-prod-form"
                  enctype="multipart/form-data" novalidate="novalidate" action="{!! url('/products') !!}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="is_composite" value="{{ $is_composite }}">
              <!--<section class="row form-group">
                    <section class="col-md-12">
                        @if ($errors->has())
                            <div class="alert alert-danger">

                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif
                    </section>
                </section>-->
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Catalog</label></section>
                    <section class="col-md-6">
                        <select class="form-control required"
                                id="prod-frm-sub-cat" name="catalog_id" id="catalog_id" aria-required="true" v-model="catalog" @change="catalogChange()"
                                aria-invalid="true">
                        @if(session('catalog_id') === null)<option selected disabled>Please select a Catalog</option>@endif

                        <option v-for="catalog in catalog_options" value="@{{ catalog.id }}">
                                    @{{ catalog.name }}
                                </option>
                        </select>
                    </section>
                    <section class="col-md-2"><a id="addCatalog">Can't find? Add New</a> </section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Category</label></section>
                    <section class="col-md-6">
                        <select class="form-control required"
                                id="prod-frm-sub-cat" name="category_id" aria-required="true" v-model="category" :disabled="category_disabled" @change="categoryChange()"
                                aria-invalid="true">
                        @if(session('category_id') === null)<option value="" selected disabled>Please select a Category</option>@endif
                            <option v-for="category in category_options" value="@{{ category.id }}  ">
                                @{{ category.name }}
                            </option>
                        </select>
                    </section>
                    <section class="col-md-2"><a  id="addCategory">Can't find? Add New</a></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Sub-Category</label></section>
                    <section class="col-md-6">
                        <select class="form-control required"
                                id="prod-frm-sub-cat" name="sub_category_id" aria-required="true" v-model="sub_category" :disabled="sub_category_disabled" @change="subCategoryChange()"
                                aria-invalid="true">
                        @if(session('sub_category_id') === null)<option value="" selected>Please select a Sub-Category</option>@endif
                            <option v-for="sub_category in sub_category_options" value="@{{ sub_category.id }}  ">
                                @{{ sub_category.name }}
                            </option>
                        </select>
                    </section>
                    <section class="col-md-2"><a id="addsubCategory">Can't find? Add New</a></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Symbol</label></section>
                    <section class="col-md-6" style="max-height: 150px; overflow-y: auto">

                        <select class="image-picker show-html" id="symbol"
                                name="symbol">
                            @foreach(\App\ProductSymbol::all() as $symbol)
                                <option data-img-src="{!! $symbol->path !!}" value="{!! $symbol->id !!}">{!! $symbol->name !!}</option>
                            @endforeach
                        </select>

                    </section>
                    <section class="col-md-2"></section>
                </section>

                <section class="row form-group @if ($errors->has('name')) has-error @endif">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Name</label></section>
                    <section class="col-md-6">
                        {!! Form::text('name', null,['id'=>'name','class'=>"form-control"]) !!}
                        @if ($errors->has('name')) <p class="error_message">{{ $errors->first('name') }}</p> @endif
                    </section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Supplier Name</label></section>
                    <section class="col-md-6"><select class="form-control required" id="supplier_id"
                                                      name="supplier_id" :disabled="fields_disabled">
                            <option selected disabled>Please select a Supplier</option>
                            @foreach($suppliers as $supplier)

                                <option value="{!! $supplier->id !!}">{!! $supplier->name !!}</option>
                            @endforeach

                        </select></section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group @if ($errors->has('description')) has-error @endif">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Description</label></section>
                    <section class="col-md-6">
                        {!! Form::text('description', null,['id'=>'description','class'=>"form-control"]) !!}
                        @if ($errors->has('description')) <p class="error_message">{{ $errors->first('description') }}</p> @endif</section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group @if ($errors->has('manufacturing_product_code')) has-error @endif">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Manufacturing Product Code</label></section>
                    <section class="col-md-6">
                        {!! Form::text('manufacturing_product_code', null,['id'=>'manufacturing_product_code','class'=>"form-control"]) !!}
                        @if ($errors->has('manufacturing_product_code')) <p class="error_message">{{ $errors->first('manufacturing_product_code') }}</p> @endif</section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group @if ($errors->has('builder_code')) has-error @endif">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Builders Product Code</label></section>
                    <section class="col-md-6">
                        {!! Form::text('builder_code', null,['id'=>'builder_code','class'=>"form-control"]) !!}
                        @if ($errors->has('builder_code')) <p class="error_message">{{ $errors->first('builder_code') }}</p> @endif</section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group @if ($errors->has('pronto_code')) has-error @endif">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Contractor code</label></section>
                    <section class="col-md-6">
                        {!! Form::text('pronto_code', null,['id'=>'pronto_code','class'=>"form-control"]) !!}
                        @if ($errors->has('pronto_code')) <p class="error_message">{{ $errors->first('pronto_code') }}</p> @endif
                    </section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group @if ($errors->has('builders_price')) has-error @endif">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Builders Price inc GST ($)</label></section>
                    <section class="col-md-6">
                        {!! Form::text('builders_price', null,['id'=>'builders_price','class'=>"form-control"]) !!}

                        @if ($errors->has('builders_price')) <p class="error_message">{{ $errors->first('builders_price') }}</p> @endif
                    </section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group @if ($errors->has('sales_price')) has-error @endif">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Supplier Price inc GST ($)</label></section>
                    <section class="col-md-6">
                        {!! Form::text('sales_price', null,['id'=>'sales_price','class'=>"form-control"]) !!}
                        @if ($errors->has('sales_price')) <p class="error_message">{{ $errors->first('sales_price') }}</p> @endif
                    </section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group @if ($errors->has('discount')) has-error @endif">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Discount (%)</label></section>
                    <section class="col-md-6">
                        {!! Form::text('discount', null,['id'=>'discount','class'=>"form-control"]) !!}
                        @if ($errors->has('discount')) <p class="error_message">{{ $errors->first('discount') }}</p> @endif
                    </section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group @if ($errors->has('image')) has-error @endif">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Product Image</label></section>
                    <section class="col-md-6">
                        {!! Form::file('image',['id'=>'discount','class'=>"form-control"]) !!}
                        @if ($errors->has('image')) <p class="error_message">{{ $errors->first('image') }}</p> @endif
                    </section>
                    <section class="col-md-2"></section>
                </section>


                    @foreach($fields as $field)

                        <section class="row form-group @if ($errors->has($field['name'])) has-error @endif">
                            <section class="col-md-2"></section>
                            <section class="col-md-2"><label>{!! $field['name'] !!}</label></section>
                            <section class="col-md-6">

                                @if($field['type'] == 'text') {!! Form::text($field['name'], null,['id'=>$field['name'],'class'=>"form-control",':disabled'=>"fields_disabled"]) !!}
                                    @if ($errors->has($field['name'])) <p class="error_message">{{ $errors->first($field['name']) }}</p> @endif
                                @elseif($field['type'] == 'textarea')
                                    <textarea class="form-control required" id="{!! $field['id'] !!}" name="custom_field_{!! $field['id'] !!}" aria-required="true" :disabled="fields_disabled"> </textarea>
                                @elseif($field['type'] == 'select')
                                @elseif($field['type'] == 'radio')
                                @elseif($field['type'] == 'checkbox')
                                @endif

                            </section>
                            <section class="col-md-2"></section>
                        </section>

                    @endforeach






                <section class="row box-footer" id="form-footer">
                    <button type="submit"
                            class="btn add-item-btn">Add <img src="resources/images/spinning-circles.svg"
                                                              class="loading-img-btn" style="display:none;"
                                                              id="1bf1a6a6-757b-921f-0a96-f95ffc63c6bc-new-product-loading">
                    </button>
                    @if($is_composite)
                        <a id="prod-frm-reset" href="{!! url('products/create/composite-product') !!}" class="btn add-item-btn" style="margin-right:10px;">Reset</a>
                        @else
                        <a id="prod-frm-reset" href="{!! url('products/create/product') !!}" class="btn add-item-btn" style="margin-right:10px;">Reset</a>
                        @endif

                </section>
            </form>
        </section>
    </section>



    <!-- Modal -->
    <div class="modal fade common_popup new_Project_popup catalog_modal" id="catalogModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content clearfix">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Catalog:</h4>

                </div>


                <div class="modal-body" id="templates">
                    <form class="row new-item-from-wrapper" role="form" method="post" id="new-prod-form"
                                                             enctype="multipart/form-data" novalidate="novalidate" action="{!! url('/catalogs') !!}">
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="box new-item-wrapper">
                                <section class="box-header"></section>
                                <section class="box-body">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <section class="row form-group">
                                            <section class="col-md-2"></section>
                                            <section class="col-md-2"><label>Name</label></section>
                                            <section class="col-md-6"><input class="form-control required" id="catalog_name"
                                                                             name="catalog_name" aria-required="true" type="text"></section>
                                           <section class="col-md-2"></section>
                                        </section>
                                        <section class="row form-group">
                                            <section class="col-md-2"></section>
                                            <section class="col-md-2"><label>Description</label></section>
                                            <section class="col-md-6"><input class="form-control required" id="catalog_description"
                                                                             name="catalog_description" aria-required="true" type="text"></section>
                                            <section class="col-md-2"></section>
                                        </section>
                                        <!--<section class="row form-group">
                                            <section class="col-md-2"></section>
                                            <section class="col-md-2"><label>Type</label></section>
                                            <section class="col-md-6"><select class="form-control required" id="category_type"
                                                                              name="category_type">
                                                    @foreach($categoryTypes as $categoryType)
                                                        <option value="{!! $categoryType->id !!}">{!! $categoryType->name !!}</option>
                                                    @endforeach

                                                </select></section>
                                            <section class="col-md-2"></section>
                                        </section>
                                        <section class="row form-group">
                                            <section class="col-md-2"></section>
                                            <section class="col-md-2"><label>Colour</label></section>
                                            <section class="col-md-6"><input class="form-control required" id="category_colour"
                                                                             name="category_colour" aria-required="true" type="color"></section>
                                            <section class="col-md-2"></section>
                                        </section>-->


                                </section>
                            </section>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center btn_load">
                        <div class="form-group">
                            <div class="col-md-12 col-lg-2  pull-right clearfix">
                                <input name="Save" type="button" class="btn_save" @click="newCatalog()" value="Save">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade common_popup new_Project_popup category_modal" id="categoryModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content clearfix">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Category:</h4>

                </div>


                <div class="modal-body" id="templates">
                    <form class="row new-item-from-wrapper" role="form" method="post" id="new-prod-form"
                                                             enctype="multipart/form-data" novalidate="novalidate" action="{!! url('/categories') !!}">
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="box new-item-wrapper">
                                <section class="box-header"></section>
                                <section class="box-body">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <section class="row form-group">
                                        <section class="col-md-2"></section>
                                        <section class="col-md-2"><label>Catalog</label></section>
                                        <section class="col-md-6">
                                            <select class="form-control required" name="modal_catalog_id" id="modal_catalog_id" aria-required="true"
                                            aria-invalid="true">
                                            @if(session('catalog_id') === null)<option selected disabled>Please select a Catalog</option>@endif

                                            <option v-for="catalog in catalog_options" value="@{{ catalog.id }}">
                                                @{{ catalog.name }}
                                            </option>
                                            </select>
                                        </section>
                                        <section class="col-md-2"></section>
                                    </section>

                                        <section class="row form-group">
                                            <section class="col-md-2"></section>
                                            <section class="col-md-2"><label>Name</label></section>
                                            <section class="col-md-6"><input class="form-control required" id="category_name"
                                                                             name="category_name" aria-required="true" type="text"></section>
                                           <section class="col-md-2"></section>
                                        </section>
                                        <section class="row form-group">
                                            <section class="col-md-2"></section>
                                            <section class="col-md-2"><label>Description</label></section>
                                            <section class="col-md-6"><input class="form-control required" id="category_description"
                                                                             name="category_description" aria-required="true" type="text"></section>
                                            <section class="col-md-2"></section>
                                        </section>
                                        <section class="row form-group">
                                            <section class="col-md-2"></section>
                                            <section class="col-md-2"><label>Type</label></section>
                                            <section class="col-md-6"><select class="form-control required" id="category_type"
                                                                              name="category_type">
                                                    @foreach($categoryTypes as $categoryType)
                                                        <option value="{!! $categoryType->id !!}">{!! $categoryType->name !!}</option>
                                                    @endforeach

                                                </select></section>
                                            <section class="col-md-2"></section>
                                        </section>
                                        <section class="row form-group">
                                            <section class="col-md-2"></section>
                                            <section class="col-md-2"><label>Colour</label></section>
                                            <section class="col-md-6"><input class="form-control required" id="category_colour"
                                                                             name="category_colour" aria-required="true" type="color"></section>
                                            <section class="col-md-2"></section>
                                        </section>


                                </section>
                            </section>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center btn_load">
                        <div class="form-group">
                            <div class="col-md-12 col-lg-2  pull-right clearfix">
                                <input name="Save" type="button" class="btn_save" @click="newCategory()" value="Save">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

            </div>

        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade common_popup new_Project_popup subCategory_modal" id="subCategoryModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content clearfix">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Sub-Category:</h4>

                </div>


                <div class="modal-body" id="templates">
                    <form class="row new-item-from-wrapper" role="form" method="post" id="new-prod-form"
                                                             enctype="multipart/form-data" novalidate="novalidate" action="{!! url('/categories') !!}">
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="box new-item-wrapper">
                                <section class="box-header"></section>
                                <section class="box-body">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <section class="row form-group">
                                        <section class="col-md-2"></section>
                                        <section class="col-md-2"><label>Category</label></section>
                                        <section class="col-md-6">
                                            <select class="form-control required"
                                                    id="modal_category_id" name="modal_category_id" aria-required="true" v-model="category" :disabled="category_disabled" @change="categoryChange()"
                                            aria-invalid="true">
                                            @if(session('category_id') === null)<option value="" selected disabled>Please select a Category</option>@endif
                                            <option v-for="category in category_options" value="@{{ category.id }}  ">
                                                @{{ category.name }}
                                            </option>
                                            </select>
                                        </section>
                                    </section>

                                        <section class="row form-group">
                                            <section class="col-md-2"></section>
                                            <section class="col-md-2"><label>Name</label></section>
                                            <section class="col-md-6"><input class="form-control required" id="sub_category_name"
                                                                             name="sub_category_name" aria-required="true" type="text"></section>
                                           <section class="col-md-2"></section>
                                        </section>
                                        <section class="row form-group">
                                            <section class="col-md-2"></section>
                                            <section class="col-md-2"><label>Description</label></section>
                                            <section class="col-md-6"><input class="form-control required" id="sub_category_description"
                                                                             name="sub_category_description" aria-required="true" type="text"></section>
                                            <section class="col-md-2"></section>
                                        </section>
                                </section>
                            </section>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center btn_load">
                        <div class="form-group">
                            <div class="col-md-12 col-lg-2  pull-right clearfix">
                                <input name="Save" type="button" class="btn_save" @click="newSubCategory()" value="Save">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

            </div>

        </div>
    </div>


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

    <button data-ref="sub-menu-items" data-index="2" class="breadcrumb-btn cursor-normal" type="submit" id="2-bc"><span
                class="breadcrumb-text">New</span></button>
    <i class="fa fa-chevron-right breadcrumb-icn font-blue" id="3-ic"></i>
    @if($is_composite)
    <button data-ref="sub-menu-items" data-index="2" class="breadcrumb-btn font-blue" type="submit" id="2-bc"><span
                class="breadcrumb-text">Composite Product</span></button>
    <i class="fa fa-chevron-right breadcrumb-icn font-blue" id="3-ic"></i>
    @endif
@stop


@section('post-js')
{{ Html::script('js/vue.js') }}
{{ Html::script('js/vue-resource.js') }}
{{ Html::script('js/select2.full.js') }}
{{ Html::script('js/image-picker.js') }}
<script>
   /* function formatSymbols (symbol) {
        if (!symbol.id) { return symbol.text; }
        var $symbol = $(
                '<span><img src="/img/symbols/' + symbol.text + '.png" class="img-flag" /> ' + symbol.text + '</span>'
        );
        return $symbol;
    };
    $('#symbol').select2({ templateResult: formatSymbols});*/
   $("#symbol").imagepicker();

    var global_data = {

        catalog_options: JSON.parse('{!! $catalogs !!}'),

        @if(session('catalog_id') == null)
            catalog: 1,
        @else
            catalog: parseInt('{!! session('catalog_id') !!}'),
        @endif
        @if(session('category_id') == null)
            category: 1,
            category_disabled: true,
            category_options: '',
        @else
            category: parseInt('{!! session('category_id') !!}'),
            category_disabled: false,
            category_options: JSON.parse('{!! $categories !!}'),
        @endif
        @if(session('category_id') == null)
            sub_category: 1,
            sub_category_disabled: true,
            sub_category_options:'',
        @else
            sub_category_options:JSON.parse('{!! $subCategories !!}'),
            sub_category: parseInt('{!! session('sub_category_id') !!}'),
            sub_category_disabled: false,
        @endif

        fields_disabled: false

    }


    new Vue({
        el: '#vue',
        data: global_data,
        methods:{
            catalogChange:function () {
                this.$http.get('/categories-by-catalog?id='+global_data.catalog )
                    .then(function(data){
                        global_data.category_options= [];
                        global_data.category_options = data.body;
                        global_data.category = 0;
                        global_data.category_disabled = false;
                        global_data.sub_category_disabled = true;
                        global_data.fields_disabled= true;

                        global_data.sub_category_options= [];

                    });
            },
            categoryChange:function () {
                this.$http.get('/subcategories-by-category?id='+global_data.category )
                        .then(function(data){
                            global_data.sub_category_options= [];
                            global_data.sub_category_options = data.body;

                            global_data.sub_category_disabled = false;

                            global_data.fields_disabled= true;

                        });
            },
            subCategoryChange:function () {
                this.$http.get('/fields-by-subcategory?sub_category_id='+global_data.sub_category )
                        .then(function(data){
                            //global_data.sub_category_options= [];
                            //global_data.sub_category_options = data.body;

                            //global_data.sub_category_disabled = false;
                            global_data.fields_disabled= false;
                            location.reload();


                        });
            },
            newCatalog:function () {

                var formData = new FormData();
                formData.append('catalog_name', $("#catalog_name").val());
                formData.append('catalog_description',  $("#catalog_description").val());

                this.$http.post('/ajax/catalogs',formData)
                        .then(function(data) {
                            if (data.body.catalogs != null){
                                global_data.catalog_options = data.body.catalogs;
                            global_data.catalog = data.body.insert_id;
                            $('.catalog_modal').modal('hide');
                            global_data.category = 0;
                            global_data.category_disabled = false;
                            global_data.sub_category_disabled = true;
                            global_data.fields_disabled = true;

                            global_data.sub_category_options = [];

                                new PNotify({
                                    title: 'Catalog Saved',
                                    title_escape: false,
                                    text: 'Catalog Saved Successfully',
                                    text_escape: false,
                                    styling: "bootstrap3",
                                    type: "success",
                                    icon: true,
                                    addclass: "stack-bottomright",
                                    delay:1500
                                });

                        }else{
                                if(data.body.catalog_name != null)
                                new PNotify({
                                    title: 'Catalog Name',
                                    title_escape: false,
                                    text: data.body.catalog_name,
                                    text_escape: false,
                                    styling: "bootstrap3",
                                    type: "error",
                                    icon: true,
                                    addclass: "stack-bottomright",
                                    delay:1500
                                });
                                if(data.body.catalog_description != null)
                                new PNotify({
                                    title: 'Catalog Description',
                                    title_escape: false,
                                    text: data.body.catalog_description,
                                    text_escape: false,
                                    styling: "bootstrap3",
                                    type: "error",
                                    icon: true,
                                    addclass: "stack-bottomright",
                                    delay:1500
                                });
                            }
                        });
            },
            newCategory:function () {

                var formData = new FormData();
                formData.append('modal_catalog_id', $("#modal_catalog_id").val());
                formData.append('category_name', $("#category_name").val());
                formData.append('category_description',  $("#category_description").val());
                formData.append('category_type',  $("#category_type").val());
                formData.append('category_colour',  $("#category_colour").val());

                this.$http.post('/ajax/categories',formData)
                        .then(function(data) {
                            if (data.body.categories != null){
                                global_data.category_options = data.body.categories;
                            global_data.category = data.body.insert_id;
                            $('.category_modal').modal('hide');
                            global_data.sub_category_disabled = false;
                            global_data.category_disabled = false;
                            global_data.fields_disabled = true;

                            global_data.sub_category_options = [];

                                new PNotify({
                                    title: 'Category Saved',
                                    title_escape: false,
                                    text: 'Category Saved Successfully',
                                    text_escape: false,
                                    styling: "bootstrap3",
                                    type: "success",
                                    icon: true,
                                    addclass: "stack-bottomright",
                                    delay:1500
                                });

                        }else{
                                if(data.body.category_name != null)
                                new PNotify({
                                    title: 'Category Name',
                                    title_escape: false,
                                    text: data.body.category_name,
                                    text_escape: false,
                                    styling: "bootstrap3",
                                    type: "error",
                                    icon: true,
                                    addclass: "stack-bottomright",
                                    delay:1500
                                });
                                if(data.body.category_description != null)
                                new PNotify({
                                    title: 'Category Description',
                                    title_escape: false,
                                    text: data.body.category_description,
                                    text_escape: false,
                                    styling: "bootstrap3",
                                    type: "error",
                                    icon: true,
                                    addclass: "stack-bottomright",
                                    delay:1500
                                });
                            }
                        });
            },
            newSubCategory:function () {

                var formData = new FormData();
                formData.append('modal_category_id', $("#modal_category_id").val());
                formData.append('sub_category_name', $("#sub_category_name").val());
                formData.append('sub_category_description',  $("#sub_category_description").val());

                this.$http.post('/ajax/sub-categories',formData)
                        .then(function(data) {
                            if (data.body.sub_categories != null){
                                global_data.sub_category_options = data.body.sub_categories;
                            global_data.sub_category = data.body.insert_id;
                            $('.subCategory_modal').modal('hide');
                            global_data.fields_disabled = false;


                                new PNotify({
                                    title: 'Sub-Category Saved',
                                    title_escape: false,
                                    text: 'Sub-Category Saved Successfully',
                                    text_escape: false,
                                    styling: "bootstrap3",
                                    type: "success",
                                    icon: true,
                                    addclass: "stack-bottomright",
                                    delay:1500
                                });

                        }else{
                                if(data.body.sub_category_name != null)
                                new PNotify({
                                    title: 'Sub-Category Name',
                                    title_escape: false,
                                    text: data.body.sub_category_name,
                                    text_escape: false,
                                    styling: "bootstrap3",
                                    type: "error",
                                    icon: true,
                                    addclass: "stack-bottomright",
                                    delay:1500
                                });
                                if(data.body.sub_category_description != null)
                                new PNotify({
                                    title: 'Category Description',
                                    title_escape: false,
                                    text: data.body.sub_category_description,
                                    text_escape: false,
                                    styling: "bootstrap3",
                                    type: "error",
                                    icon: true,
                                    addclass: "stack-bottomright",
                                    delay:1500
                                });
                            }
                        });
            }
        }
    })

    $('#addCatalog').on('click', function () {
        $('.catalog_modal').modal('show');
    });
    $('#addCategory').on('click', function () {
        $('.category_modal').modal('show');
    });
    $('#addsubCategory').on('click', function () {
        $('.subCategory_modal').modal('show');
    });

</script>




@stop


@section('post-css')
    {{ Html::style('css/select2.css') }}
    {{ Html::style('css/image-picker.css') }}
    <style type="text/css">
        .img-flag {
            /*height: 70px;
            width: 70px;*/
        }
        ul.thumbnails.image_picker_selector li .thumbnail img{
            width: 50px;
            /*min-height: 50px;*/
        }
        ul.thumbnails.image_picker_selector li .thumbnail.selected{
            min-height: 50px;

           /* min-height: 50px;

            width: 50px;*/
        }
        ul.thumbnails.image_picker_selector li{
           /* margin: 0px 0px 0px 0px;*/
        }
        ul.thumbnails.image_picker_selector li .thumbnail{
            /*padding: 0px;*/
        }
        ul.thumbnails.image_picker_selector li .thumbnail{
            border-bottom:0px !important;
        }

    </style>
@stop