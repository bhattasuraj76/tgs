@extends('backend.master.master')
@section('activeMenu', 'active')
@section('title', $pageTitle)
@section('content')
<header class="page-header">
    <div class="d-flex justify-content-between">
        <div>
            <h1 class="separator">{{ $pageTitle }}</h1>
            <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">Menu</a></li>
                    <li class="breadcrumb-item active">Manage Submenu</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.menu.edit', $menuData->id) }}" class="btn btn-primary" aria-expanded="false">
                Edit Menu
            </a>
        </div>
</header>
<section class="page-content container-fluid">
    <div class="card">
        @include('errors.errors')
        <div class="card-body">
            <div class="add-menu-item">
                <?php
                $currentUrl = url()->current();
                ?>
                <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
                <link href="{{asset('public/backend/menu/style.css')}}" rel="stylesheet">
                <div id="hwpwrap">
                    <div class="custom-wp-admin wp-admin wp-core-ui js   menu-max-depth-0 nav-menus-php auto-fold admin-bar">
                        <div id="wpwrap">
                            <div id="wpcontent">
                                <div id="wpbody">
                                    <div id="wpbody-content">
                                        <div class="wrap">
                                            <div id="nav-menus-frame">
                                                <!-- add menu item  -->
                                                @include('backend.menu.addmenuitem')
                                                <!-- add menu item  -->

                                                <!--menu structure  -->
                                                @include('backend.menu.menustructure')
                                                <!-- menu structure -->
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('after-scripts')
<script>
    var menus = {
        "oneThemeLocationNoMenus": "",
        "moveUp": "Move up",
        "moveDown": "Mover down",
        "moveToTop": "Move top",
        "moveUnder": "Move under of %s",
        "moveOutFrom": "Out from under  %s",
        "under": "Under %s",
        "outFrom": "Out from %s",
        "menuFocus": "%1$s. Element menu %2$d of %3$d.",
        "subMenuFocus": "%1$s. Menu of subelement %2$d of %3$s."
    };
    var arraydata = [];

    var addMenuItemUrl = '{{ route("admin.addMenuItem") }}'; //adds new menu item
    var updateMenuItemUrl = '{{ route("admin.updateMenuItem")}}'; //updates menu item or all items
    var menuStructureControllerUrl = '{{ route("admin.menuStructureController") }}'; //updates menu structure (depth and parent)
    var deleteMenuItemUrl = '{{ route("admin.deleteMenuItem") }}'; //delete child menu item
    var deleteMenuUrl = '{{ route("admin.deleteMenu") }}'; //delete menu(root)
    var csrftoken = "{{ csrf_token() }}";
    var menuwr = "{{ url()->current() }}";
</script>
<script type="text/javascript" src="{{asset('public/backend/menu/scripts.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backend/menu/scripts2.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backend/menu/menu.js')}}"></script>


<script>
    var module = null; //stores chosen module

    //show modules div based on chosen module
    $('#module').on('change', function() {
        $('div[class*="module-"]').hide(); //hide all modules
        module = $(this).val();
        if (!!module) {
            $('.module-' + module).show(); //show chosen module div
        }
    });

    //genereate url in response to change in module value
    $('div[class*="module-"] select').change(function() {
        let url = generateUrl();
        console.log(url);
        $('#custom-menu-item-url').val(url);
    });

    //function to generate url
    function generateUrl(url = '') {
        var moduleVal = module;
        var slugVal = $('#' + moduleVal).val();
        switch (moduleVal) {
            case 'destination':
            case 'region':
            case 'activity':
                url = (!!destination) ? url + '/' + slugVal : url;
                break;
            case 'package':
                url = (!!package) ? url + '/trips/' + slugVal : url;
                break;
            case 'blogcategory':
                url = (!!blogcategory) ? url + '/news-and-updates/' + slugVal : url;
                break;
            case 'blog':
                url = (!!blog) ? url + '/news-and-updates/' + slugVal : url;
                break;
            case 'page':
                url = (!!page) ? url + '/' + slugVal : url;
                break;
        }

        return url;
    }
</script>
@endsection

@section('after-styles')
<style>
    div[class*="module-"] {
        display: none;
    }
</style>
@endsection