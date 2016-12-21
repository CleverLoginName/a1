@extends('layouts.default')


@section('main-content')
    <section id="vue">
    <section class="box new-item-wrapper">
        <section class="box-header"></section>
        <section class="box-body">
            <form class="row new-item-from-wrapper" role="form" method="post" id="new-prod-form"
                  enctype="multipart/form-data" novalidate="novalidate" action="{!! url('/products/packs') !!}">
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

        catalog_options: JSON.parse('{!! $catalogs !!}'),

        @if(session('catalog_id') == null)
            catalog: 1,
        @else
            catalog: parseInt('{!! session('catalog_id') !!}}'),
        @endif
        @if(session('category_id') == null)
            category: 1,
            category_disabled: true,
            category_options: '',
        @else
            category: parseInt('{!! session('category_id') !!}}'),
            category_disabled: false,
            category_options: JSON.parse('{!! $categories !!}'),
        @endif


        fields_disabled: false,


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
                        global_data.category = 1;
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
            }
        }
    })

</script>
@stop