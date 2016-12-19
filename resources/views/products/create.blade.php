@extends('layouts.default')


@section('main-content')
    <section id="vue">
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
                    <section class="col-md-2"><label>Catalog</label></section>
                    <section class="col-md-6">
                        <select class="form-control required"
                                id="prod-frm-sub-cat" name="catalog_id" aria-required="true" v-model="catalog" @change="catalogChange()"
                                aria-invalid="true">
                                <option v-for="catalog in catalog_options" value="@{{ catalog.id }}">
                                    @{{ catalog.name }}
                                </option>
                        </select>
                    </section>
                    <section class="col-md-2"><a href="{!! url('/catalogs/create') !!}">Can't find? Add New</a> </section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Category</label></section>
                    <section class="col-md-6">
                        <select class="form-control required"
                                id="prod-frm-sub-cat" name="category_id" aria-required="true" v-model="category" :disabled="category_disabled" @change="categoryChange()"
                                aria-invalid="true">
                            <option v-for="category in category_options" value="@{{ category.id }}  ">
                                @{{ category.name }}
                            </option>
                        </select>
                    </section>
                    <section class="col-md-2"><a href="{!! url('/categories/create') !!}">Can't find? Add New</a></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Sub-Category</label></section>
                    <section class="col-md-6">
                        <select class="form-control required"
                                id="prod-frm-sub-cat" name="sub_category_id" aria-required="true" v-model="sub_category" :disabled="sub_category_disabled" @change="subCategoryChange()"
                                aria-invalid="true">
                            <option v-for="sub_category in sub_category_options" value="@{{ sub_category.id }}  ">
                                @{{ sub_category.name }}
                            </option>
                        </select>
                    </section>
                    <section class="col-md-2"><a href="{!! url('/sub-categories/create') !!}">Can't find? Add New</a></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Name</label></section>
                    <section class="col-md-6"><input class="form-control required" id="name"
                                                     name="name" aria-required="true" type="text"></section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Description</label></section>
                    <section class="col-md-6"><input class="form-control required" id="description"
                                                     name="description" aria-required="true" type="text"></section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Manufacturing Product Code</label></section>
                    <section class="col-md-6"><input class="form-control required" id="manufacturing_product_code"
                                                     name="manufacturing_product_code" aria-required="true" type="text"></section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Builders Product Code</label></section>
                    <section class="col-md-6"><input class="form-control required" id="builder_code"
                                                     name="builder_code" aria-required="true" type="text"></section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Pronto Code</label></section>
                    <section class="col-md-6"><input class="form-control required" id="pronto_code"
                                                     name="pronto_code" aria-required="true" type="text"></section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Builders Price ($)</label></section>
                    <section class="col-md-6"><input class="form-control required" id="builders_price"
                                                     name="builders_price" aria-required="true" type="text"></section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Sales Price ($)</label></section>
                    <section class="col-md-6"><input class="form-control required" id="sales_price"
                                                     name="sales_price" aria-required="true" type="text"></section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Discount (%)</label></section>
                    <section class="col-md-6"><input class="form-control required" id="discount"
                                                     name="discount" aria-required="true" type="text"></section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Quantity</label></section>
                    <section class="col-md-6"><input class="form-control required" id="quantity"
                                                     name="quantity" aria-required="true" type="text"></section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Energy Consumption (W)</label></section>
                    <section class="col-md-6"><input class="form-control required" id="energy_consumption"
                                                     name="energy_consumption" aria-required="true" type="text"></section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Width</label></section>
                    <section class="col-md-6"><input class="form-control required" id="width"
                                                     name="width" aria-required="true" type="text"></section>
                    <section class="col-md-2"></section>
                </section>
                <section class="row form-group">
                    <section class="col-md-2"></section>
                    <section class="col-md-2"><label>Height</label></section>
                    <section class="col-md-6"><input class="form-control required" id="height"
                                                     name="height" aria-required="true" type="text"></section>
                    <section class="col-md-2"></section>
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


@section('post-js')
{{ Html::script('js/vue.js') }}
{{ Html::script('js/vue-resource.js') }}
<script>
    var global_data = {
        catalog: 1,
        category: 1,
        sub_category: 1,
        category_disabled: true,
        sub_category_disabled: true,
        fields_disabled: true,
        catalog_options: JSON.parse('{!! $catalogs !!}'),
        category_options: JSON.parse('{!! $categories !!}'),
        sub_category_options:'',
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

                        global_data.category_disabled = false;
                        global_data.sub_category_disabled = true;


                    });
            },
            categoryChange:function () {
                this.$http.get('/subcategories-by-category?id='+global_data.category )
                        .then(function(data){
                            global_data.sub_category_options= [];
                            global_data.sub_category_options = data.body;

                            global_data.sub_category_disabled = false;



                        });
            },
            subCategoryChange:function () {
                this.$http.get('/subcategories-by-category?id='+global_data.category )
                        .then(function(data){
                            global_data.sub_category_options= [];
                            global_data.sub_category_options = data.body;

                            global_data.sub_category_disabled = false;



                        });
            }
        }
    })

</script>
@stop