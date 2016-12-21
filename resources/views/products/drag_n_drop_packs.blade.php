@extends('layouts.default')


@section('main-content')
    <style>
        .gu-mirror {
            position: fixed !important;
            margin: 0 !important;
            z-index: 9999 !important;
            opacity: 0.8;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
            filter: alpha(opacity=80);
        }
        .gu-hide {
            display: none !important;
        }
        .gu-unselectable {
            -webkit-user-select: none !important;
            -moz-user-select: none !important;
            -ms-user-select: none !important;
            user-select: none !important;
        }
        .gu-transit {
            opacity: 0.2;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=20)";
            filter: alpha(opacity=20);
        }
    </style>

    <section id="vue">
    <section class="box new-item-wrapper">
        <section class="box-header"></section>
        <section class="box-body">
            <input type="hidden" name="pack_id" value="{!! $pack_id !!}">
            <div class='wrapper row' id="x">
                <div class="row">
                <div class="col-md-12">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                </div>
                </div>
                <ul class="container1 col-md-6" id='left-events' style="background-color: lightgray;min-height: 500px;max-height: 500px;overflow: auto">
                    @foreach($products as $product)
                        <li id="{!! $product->id !!}" parent_id="{!! $pack_id !!}">
                            <h3 class="name">{!! $product->name !!}</h3>
                        </li>
                    @endforeach
                </ul>

            <ul id='right-events' class='container2 col-md-6'style="background-color: lightgray;min-height: 500px">
                </ul>



                <section class="row box-footer" id="form-footer">
                    <a id="prod-frm-reset" href="{!! url('products/create/pack') !!}" class="btn add-item-btn" style="margin-right:10px;">Add Another Pack</a>

                    <a id="prod-frm-reset" href="{!! url('packs/'.$pack_id) !!}" class="btn add-item-btn" style="margin-right:10px;">View Pack</a>
                </section>

            </div>
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

    {{ Html::script('js/dragula.js') }}
<script>

    $(function() {
        // Handler for .ready() called.


        dragula([document.getElementById('left-events'), document.getElementById('right-events')], {
            removeOnSpill:  function (el) {
                console.log(el);
            },
            copy: function (el, source) {
                return source != document.getElementById('right-events')
            },
            accepts: function (el, target) {
                return target == document.getElementById('right-events')
            },
        }).on('drop', function (el) {
            var x = el.getAttribute("parent_id");
            $.post( "/packs/selected", { child: el.id,parent:x } );
        }).on('remove', function (el) {
            //console.log(el.id);
            var x = el.getAttribute("parent_id");
            $.post( "/packs/remove", { child: el.id,parent:x } );
        });

    });


    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("left-events");
        tr = table.getElementsByTagName("li");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

</script>
@stop