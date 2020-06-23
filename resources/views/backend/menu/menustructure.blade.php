<div id="menu-management-liquid">
    <div id="menu-management">
        <form id="update-nav-menu" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" id="idmenu" value="@if(isset($menuData)){{$menuData->id}}@endif" />
            <div class="menu-edit ">
                <div id="nav-menu-header">
                    <div class="major-publishing-actions">
                        <div class="publishing-action">
                            <a onclick="getmenus()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Save menu</a>
                            <span class="spinner" id="spincustomu2"></span>
                        </div>
                    </div>
                </div>
                <div id="post-body">
                    <div id="post-body-content">
                        <h3>Menu Structure</h3>
                        <div class="drag-instructions post-body-plain" style="">
                            <p>
                                Place each item in the order you prefer. Click on the arrow to the right of the item to display more configuration options.
                            </p>
                        </div>
                        <ul class="menu ui-sortable" id="menu-to-edit">
                            @if(isset($menus))
                            @foreach($menus as $m)

                            <li id="menu-item-{{$m->id}}" class="menu-item menu-item-depth-{{$m->depth}} menu-item-page menu-item-edit-inactive pending" style="display: list-item;">
                                <dl class="menu-item-bar">
                                    <dt class="menu-item-handle">
                                        <span class="item-title"> <span class="menu-item-title"> <span id="menutitletemp_{{$m->id}}">{{$m->label}}</span> <span style="color: transparent;">|{{$m->id}}|</span> </span> <span class="is-submenu" style="@if($m->depth==0)display: none;@endif">{{""}}</span> </span>
                                        <span class="item-controls"> <span class="item-type">Detail</span> <span class="item-order hide-if-js"> <a href="{{ $currentUrl }}?action=move-up-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44" class="item-move-up"><abbr title="Move Up">↑</abbr></a> | <a href="{{ $currentUrl }}?action=move-down-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44" class="item-move-down"><abbr title="Move Down">↓</abbr></a> </span> <a class="item-edit" id="edit-{{$m->id}}" title=" " href="{{ $currentUrl }}?edit-menu-item={{$m->id}}#menu-item-settings-{{$m->id}}"> </a> </span>
                                    </dt>
                                </dl>

                                <div class="menu-item-settings" id="menu-item-settings-{{$m->id}}">
                                    <input type="hidden" class="edit-menu-item-id" name="menuid_{{$m->id}}" value="{{$m->id}}" />

                                    <div class="form-group row">
                                        <label for="edit-menu-item-title-{{$m->id}}" class="col-12"> Submenu Title </label>
                                        <div class="col-10">
                                            <input type="text" id="idlabelmenu_{{$m->id}}" class="widefat edit-menu-item-title form-control" name="idlabelmenu_{{$m->id}}" value="{{$m->label}}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="edit-menu-item-url-{{$m->id}}" class="col-12"> Submenu Url </label>
                                        <div class="col-10">
                                            <input type="text" id="url_menu_{{$m->id}}" class="widefat code edit-menu-item-url form-control form-control" id="url_menu_{{$m->id}}" value="{{$m->link}}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="edit-menu-item-showthumbnail-{{$m->id}}" class="col-12"> Show Menu Thumbnail </label>
                                        <div class="col-10">
                                            <label class="checkbox-inline m-t-5">
                                                <input type="checkbox" name="show_menu_thumbnail" class="edit-menu-item-showthumbnail " id="showthumbnail_menu_{{$m->id}}" id="url_menu_{{$m->id}}" value="1" @if($m->show_thumbnail == 1){{"checked"}}@endif>
                                            </label>
                                        </div>
                                    </div>
                                    <hr>
                                    @if($m->show_thumbnail)
                                    @php
                                    $imageUrl = empty($m->getThumbnail()) ? asset('public/backend/images/default/no-image.png') : asset($m->getThumbnail()) ;
                                    @endphp
                                    <img src="{{ $imageUrl }}" height="200" width="200" class="border-1">
                                    <hr>
                                    @endif

                                    <p class="field-move hide-if-no-js description description-wide">
                                        <label> <span>Move</span> <a href="{{ $currentUrl }}" class="menus-move-up" style="display: none;">Move up</a> <a href="{{ $currentUrl }}" class="menus-move-down" title="Mover uno abajo" style="display: inline;">Move Down</a> <a href="{{ $currentUrl }}" class="menus-move-left" style="display: none;"></a> <a href="{{ $currentUrl }}" class="menus-move-right" style="display: none;"></a> <a href="{{ $currentUrl }}" class="menus-move-top" style="display: none;">Top</a> </label>
                                    </p>

                                    <div class="menu-item-actions description-wide submitbox">

                                        <a class="item-delete submitdelete deletion" id="delete-{{$m->id}}" href="{{ $currentUrl }}?action=delete-menu-item&menu-item={{$m->id}}&_wpnonce=2844002501">Delete</a>
                                        <span class="meta-sep hide-if-no-js"> | </span>
                                        <a class="item-cancel submitcancel hide-if-no-js button-secondary" id="cancel-{{$m->id}}" href="{{ $currentUrl }}?edit-menu-item={{$m->id}}&cancel=1424297719#menu-item-settings-{{$m->id}}">Cancel</a>
                                        <span class="meta-sep hide-if-no-js"> | </span>
                                        <a onclick="getmenus()" class="button button-primary updatemenu" id="update-{{$m->id}}" href="javascript:void(0)">Update item</a>

                                    </div>

                                </div>
                                <ul class="menu-item-transport"></ul>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                        <div class="menu-settings">

                        </div>
                    </div>
                </div>
                <div id="nav-menu-footer">
                    <div class="major-publishing-actions">
                        <span class="delete-action"> <a class="submitdelete deletion menu-delete" onclick="deletemenu()" href="javascript:void(9)">Delete menu</a> </span>
                        <div class="publishing-action">

                            <a onclick="getmenus()" name="save_menu" id="save_menu_header" class="button button-primary menu-save">Save menu</a>
                            <span class="spinner" id="spincustomu2"></span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>