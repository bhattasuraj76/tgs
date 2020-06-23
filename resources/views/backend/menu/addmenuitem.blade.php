<div id="menu-settings-column" class="metabox-holder  m-t-20 m-b-10">
    <h2>Add Submenu</h2>
    <div class="clear"></div>
    <form id="nav-menu-meta" action="" class="nav-menu-meta" method="post" enctype="multipart/form-data">
        <div id="side-sortables" class="accordion-container">
            <ul class="outer-border">
                <li class="control-section accordion-section  open add-page" id="add-page">
                    <h3 class="accordion-section-title hndle" tabindex="0"> Submenu <span class="screen-reader-text">Press return or enter to expand</span></h3>
                    <div class="accordion-section-content ">
                        <div class="inside">
                            <div class="customlinkdiv" id="customlinkdiv">
                                <div class="form-group row">
                                    <label class="howto col-lg-2" for="custom-menu-item-name"> <span>Submenu Title</span>&nbsp;
                                    </label>
                                    <div class="col-lg-10">
                                        <input id="custom-menu-item-name" name="label" type="text" class="form-control" placeholder="Submenu Title">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-lg-2 howto "> Select Module </label>
                                    <div class="col-lg-10">
                                        @php
                                        $modules = [
                                        '' => 'Chooose one',
                                        'blogcategory' => 'Blog Category',
                                        'blog' => 'Blog',
                                        'destination' => 'Destination',
                                        'region' => 'Region',
                                        'activity' => 'Activity',
                                        'package' => 'Package',
                                        'page' => 'Page'
                                        ];
                                        @endphp
                                        <select name="module" class="form-control select2" id="module">
                                            @foreach($modules as $slug => $title)
                                            <option value="{{ $slug }}">{{ $title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr>

                                <!-- sumodules  -->
                                <div class="submodules">
                                    <div class="module-destination">
                                        <div class="form-group row ">
                                            <label class="col-lg-2 howto ">Select Destination </label>
                                            <div class="col-lg-10">
                                                <select name="destination" class="form-control input-with-default-title select2" id="destination">
                                                    @foreach($destinations as $slug => $title)
                                                    <option value="{{ $slug }}">{{ $title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <hr>
                                    </div>

                                    <div class="module-region">
                                        <div class="form-group row">
                                            <label class="col-lg-2 howto ">Select Region </label>
                                            <div class="col-lg-10">
                                                <select name="region" class="form-control input-with-default-title select2" id="region">
                                                    @foreach($regions as $slug => $title)
                                                    <option value="{{ $slug }}">{{ $title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="module-activity">
                                        <div class="form-group row">
                                            <label class=" col-lg-2 howto">Select Activity</label>
                                            <div class=" col-lg-10">
                                                <select name="activity" class="form-control" id="activity" style="width:100%!important;">
                                                    @foreach($activities as $slug => $title)
                                                    <option value="{{ $slug }}">{{ $title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <hr>
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="module-package">
                                        <div class="form-group row">
                                            <label class=" col-lg-2 howto">Select Package</label>
                                            <div class=" col-lg-10">
                                                <select name="package" class="form-control" id="package" style="width:100%!important;">
                                                    @foreach($packages as $slug => $title)
                                                    <option value="{{ $slug }}">{{ $title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <hr>
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="module-blogcategory">
                                        <div class="form-group row">
                                            <label class="col-lg-2 howto"> Blog Category </label>
                                            <div class="col-lg-10">
                                                <select name="blogcategory" class="form-control select2" id="blogcategory">
                                                    @foreach($blogcategories as $slug => $title)
                                                    <option value="{{ $slug }}">{{ $title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="module-blog">
                                        <div class="form-group row">
                                            <label class=" col-lg-2 howto"> Select Blog</label>
                                            <div class=" col-lg-10">
                                                <select name="blog" class="form-control" id="blog" style="width:100%!important;">
                                                    @foreach($blogs as $slug => $title)
                                                    <option value="{{ $slug }}">{{ $title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="module-page">
                                        <div class="form-group row ">
                                            <label class=" col-lg-2 howto"> Select Page </label>
                                            <div class="col-lg-10">
                                                <select name="page" class="form-control select2" id="page">
                                                    @foreach($pages as $slug => $title)
                                                    <option value="{{ $slug }}">{{ $title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <!-- submodules -->

                                <div class="form-group row">
                                    <label class="howto col-lg-2" for="custom-menu-item-url"> <span>Submenu Url</span>&nbsp;&nbsp;&nbsp;
                                    </label>
                                    <div class="col-lg-10">
                                        <input id="custom-menu-item-url" name="url" type="text" class="form-control" placeholder="url">
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group row">
                                    <label class="howto col-lg-2" for="showthumbnail"> <span>Show Thumbnail</span>&nbsp;&nbsp;&nbsp;
                                    </label>
                                    <div class="col-lg-10">
                                        <label class="checkbox-inline m-t-5">
                                            <input type="checkbox" name="show_menu_thumbnail" id="showthumbnail" value="1">
                                        </label>
                                    </div>
                                </div>

                                <p class="button-controls">
                                    <a href="#" onclick="addcustommenu()" class="button-secondary submit-add-to-menu right">Add menu item</a>
                                    <span class="spinner" id="spincustomu"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </form>
</div>