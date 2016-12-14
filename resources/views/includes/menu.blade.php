<style>
    .nav > li > a {
        padding: 10px 15px 15px 35px;
    }
</style>

<ul class="nav nav-list sidebar-menu">
    <li class=" dashboard">
        <a class="main-menu-item" id="Home" href="{!! url("/dashboard") !!}">
            <img class="main-menu-icon" src="{{ URL::asset('resources/images/home_ico_white.png') }}">
            <span class="main-menu-item-text">Home</span>
            <span class="menu-selected-item"></span></a>
    </li>
    <li class="projects">
        <a class="main-menu-item tree-toggle" id="Projects">
            <img class="main-menu-icon" src="{{ URL::asset('resources/images/project_ico_white.png') }}">
            <span class="main-menu-item-text">Projects</span>
            <span class="menu-selected-item"></span>
        </a>
        <ul class="nav nav-list tree">
                <li>
                    <a class="main-menu-item" id="Products" href="{!! url("/projects/create") !!}">
                        <img class="main-menu-icon" src="{{ URL::asset('resources/images/products_ico_white.png') }}">
                        <span class="main-menu-item-text">New</span>
                    </a>
                </li>
                <li>
                    <a class="main-menu-item" id="Products" href="{!! url("/projects") !!}">
                        <img class="main-menu-icon" src="{{ URL::asset('resources/images/products_ico_white.png') }}">
                        <span class="main-menu-item-text">View</span>
                    </a>
                </li>
        </ul>
    </li>
    <li class=" products">
        <a class="main-menu-item tree-toggle" id="Products">
            <img class="main-menu-icon" src="{{ URL::asset('resources/images/products_ico_white.png') }}">
            <span class="main-menu-item-text">Products</span>
            <span class="menu-selected-item"></span>
        </a>

        <ul class="nav nav-list tree">
            @if(Auth::user()->can('create-products'))
                <li>
                    <a class="main-menu-item" id="Products" href="{!! url("/products/create") !!}">
                        <img class="main-menu-icon" src="{{ URL::asset('resources/images/products_ico_white.png') }}">
                        <span class="main-menu-item-text">New</span>
                    </a>
                </li>
            @endif
            @if(Auth::user()->can('view-products'))
                <li>
                    <a class="main-menu-item" id="Products" href="{!! url("/products") !!}">
                        <img class="main-menu-icon" src="{{ URL::asset('resources/images/products_ico_white.png') }}">
                        <span class="main-menu-item-text">View</span>
                    </a>
                </li>@endif

            <li>
                <a class="main-menu-item" id="Products" href="{!! url("/packs") !!}">
                    <img class="main-menu-icon" src="{{ URL::asset('resources/images/products_ico_white.png') }}">
                    <span class="main-menu-item-text">Packs</span>
                </a>
            </li>
            <li>
                <a class="main-menu-item" id="Products" href="{!! url("/composite-products") !!}">
                    <img class="main-menu-icon" src="{{ URL::asset('resources/images/products_ico_white.png') }}">
                    <span class="main-menu-item-text">Composites</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="templates">
        <a class="main-menu-item tree-toggle" id="Templates">
            <img class="main-menu-icon" src="{{ URL::asset('resources/images/project_ico_white.png') }}">
            <span class="main-menu-item-text">Templates</span>
            <span class="menu-selected-item"></span>
        </a>


        <ul class="nav nav-list tree">
            <li>
                <a class="main-menu-item" id="Users" href="{!! url("/templates/create") !!}">
                    <img class="main-menu-icon" src="{{ URL::asset('resources/images/products_ico_white.png') }}">
                    <span class="main-menu-item-text">New</span>
                </a>
            </li>
            <li>
                <a class="main-menu-item" id="Users" href="{!! url("/templates") !!}">
                    <img class="main-menu-icon" src="{{ URL::asset('resources/images/products_ico_white.png') }}">
                    <span class="main-menu-item-text">View</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="users">
        <a class="main-menu-item tree-toggle" id="Users">
            <img class="main-menu-icon" src="{{ URL::asset('resources/images/project_ico_white.png') }}">
            <span class="main-menu-item-text">Users</span>
            <span class="menu-selected-item"></span>
        </a>


        <ul class="nav nav-list tree">
            <li>
                <a class="main-menu-item" id="Users" href="{!! url("/users/create") !!}">
                    <img class="main-menu-icon" src="{{ URL::asset('resources/images/products_ico_white.png') }}">
                    <span class="main-menu-item-text">New</span>
                </a>
            </li>
            <li>
                <a class="main-menu-item" id="Users" href="{!! url("/users") !!}">
                    <img class="main-menu-icon" src="{{ URL::asset('resources/images/products_ico_white.png') }}">
                    <span class="main-menu-item-text">View</span>
                </a>
            </li>
            <li>
                <a class="main-menu-item" id="Users" href="{!! url("/users/roles") !!}">
                    <img class="main-menu-icon" src="{{ URL::asset('resources/images/products_ico_white.png') }}">
                    <span class="main-menu-item-text">Roles</span>
                </a>
            </li>
        </ul>
    </li>


    <li class="profile">
        <a class="main-menu-item tree-toggle" id="profile" href="{!! url("/profile") !!}">
            <img class="main-menu-icon" src="{{ URL::asset('resources/images/prof_ico_white.png') }}">
            <span class="main-menu-item-text">Profile</span>
            <span class="menu-selected-item"></span>
        </a>
    </li>

</ul>