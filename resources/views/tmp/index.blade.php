

    {{ Html::style('css/draw-tool.css') }}
    {{ Html::style('css/tool-bar.css') }}
    {{ Html::style('css/left-menu.css') }}
    {{ Html::style('css/right-click-menu.css') }}

    <body onload="init();">
    <!--Tool bar started-->
    <div id="top-menu">
        <ul id="tool-items-ul">
            <li  >
                <a href="javascript:void(0)" id="save-button">
                    <img class="image-item" src="{{asset('img/tool-bar/icon_cloud-upload_alt.png')}}">
                </a>
                <span class="tooltiptext">Save</span>
            </li>

            <li   id="print-btn">
                <a href="javascript:void(0)">
                    <img class="image-item" src="{{asset('img/tool-bar/icon_printer.png')}}">
                </a>
                <span class="tooltiptext">Print</span>
            </li>

            <!--<li  >-->
            <!--<a href="javascript:print_pdf();" id="open-button">-->
            <!--<img class="image-item" src="{{asset('img/tool-bar/folder-7.png')}}">-->
            <!--</a>-->
            <!--<span class="tooltiptext">Open</span>-->
            <!--</li>-->

            <li>|</li>

            <li  >
                <a href="javascript:void(0);" id="undo">
                    <img class="image-item" src="{{asset('img/tool-bar/arrow_back.png')}}">
                </a>
                <span class="tooltiptext">Undo</span>
            </li>
            <li  >
                <a href="javascript:void(0);" id="redo">
                    <img class="image-item" src="{{asset('img/tool-bar/arrow_fow.png')}}">
                </a>
                <span class="tooltiptext">Redo</span>
            </li>

            <li> |</li>


            <li  >
                <a href="javascript:void(0);" id="drag">
                    <img class="image-item" src="{{asset('img/tool-bar/icon_cursor_alt.png')}}">
                </a>
                <span class="tooltiptext">Move</span>
            </li>

            <li  >
                <a href="javascript:void(0);" id="cwall">
                    <img class="image-item" src="{{asset('img/tool-bar/icon_pencil-edit.png')}}">
                </a>
                <span class="tooltiptext">Draw walls</span>
            </li>

            <li id="add-text"  >
                <a href="javascript:void(0)">
                    <img class="image-item" src="{{asset('img/tool-bar/13478.png')}}">
                </a>
                <span class="tooltiptext">Add Text</span>
            </li>
            <li  >
                <a href="javascript:void(0);" id="scale">
                    <img class="image-item" src="{{asset('img/tool-bar/add.png')}}">
                </a>
                <span class="tooltiptext">Scale</span>
            </li>
            <li  >
                <a href="javascript:void(0);" id="pan">
                    <img class="image-item" src="{{asset('img/tool-bar/hold.png')}}">
                </a>
                <span class="tooltiptext">Pan</span>
            </li>

            <li>|</li>

            <li  >
                <a href="javascript:void(0);" id="zoom-in" class="zoom-control" data-action="zoom-in">
                    <img class="image-item" src="{{asset('img/tool-bar/icon_zoom-in_alt.png')}}">
                </a>
                <span class="tooltiptext">Zoom in</span>
            </li>
            <li  >
                <a href="javascript:void(0);" id="zoom-out" class="zoom-control" data-action="zoom-out">
                    <img class="image-item" src="{{asset('img/tool-bar/icon_zoom-out_alt.png')}}">
                </a>
                <span class="tooltiptext">Zoom out</span>
            </li>
            <li  >
                <a href="javascript:void(0);" id="zoom-reset" class="zoom-control" data-action="zoom-reset">
                    <img class="image-item" src="{{asset('img/tool-bar/repeat.png')}}">
                </a>
                <span class="tooltiptext">Zoom reset</span>
            </li>


            <!--
                            <li  >
                                <a href="javascript:void(0);" id="scale-up" class="scale-item-control" data-action="scale-up"><img
                                        class="image-item"
                                        src="img/tool-bar/icon_plus_alt2.png"></a>
                                <span class="tooltiptext">Scale up</span>
                            </li>
                            <li  >
                                <a href="javascript:void(0);" id="scale-down" class="scale-item-control" data-action="scale-down"><img
                                        class="image-item"
                                        src="img/tool-bar/icon_minus_alt2.png"></a>
                                <span class="tooltiptext">Scale down</span>
                            </li>
                            <li  >
                                <a href="javascript:void(0);" id="scale-reset" class="scale-item-control" data-action="scale-reset"><img
                                        class="image-item"
                                        src="img/tool-bar/repeat.png"></a>
                                <span class="tooltiptext">Scale reset</span>
                            </li>
                             -->


            <li  >
                <a href="javascript:void(0);" id="rotate_tmp">
                    <img class="image-item" src="{{asset('img/tool-bar/rotate.png')}}">
                </a>
                <span class="tooltiptext">Load Latest</span>
            </li>

        </ul>
    </div>

    <hr>

    <!--Tool bar end-->

    <!-- wrapper start -->
    <div id="wrapper">

        <div id="container">

            <!--side bar started-->
            <div class="side-bar" id="menu-site-bar">
                <div class="main-lab">
                    <img class="pro-logo" src="{{asset('img/logo.png')}}">
                    <button type="button" class="btn-min-mini" id="minimize-btn">-</button>
                </div>

                <div id="menu-detail-col">
                    <div class="detail">
                        <div class="detail-title">
                            <span>Energy Rating:</span><br/>
                            <span>Sub Total:</span><br/>
                            <span>Project Status:</span><br/>
                            <span>Plan Scale ($):</span><br/>
                        </div>
                        <div class="detail-values">
                            <span>4.5</span><br/>
                            <span>2000.00</span><br/>
                            <span>Not Saved</span><br/>
                            <span>1:100</span><br/>
                        </div>

                        <input type="file" style="display:none;" id="open-file" name="open_file"/>

                    </div>

                    <div class="item-container">
                        <ul class="items-ul">
                            <li>
                                <div class="open">Electrical <span>Blubs</span>
                                    <button type="button" id="e-btn" class="btn-min-image">+</button>
                                </div>
                                <div class="e-item-cont">
                                    <div class="single-item-con" id="e-item-div">

                                        <div class="search-div">
                                            <div>
                                                <span>Search</span>
                                            </div>

                                            <div style="margin-top: 14px;">
                                                <input type="text" class="search-input" name="search"/>
                                                <button type="button" class="btn-min-search">Go</button>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="product-container" id="product-container">

                                        </div>
                                    </div>

                                    <br>
                                </div>


                            </li>

                            <li>
                                <div class="open">Electrical <span>Switch</span>
                                    <button type="button" id="btn-drw-switch" class="btn-min-image">+</button>
                                </div>

                                <div class="e-item-cont">

                                    <div class="single-item-con" id="switch-item-div">

                                        <div class="search-div">
                                            <div>
                                                <span>Search</span>
                                            </div>

                                            <div style="margin-top: 14px;">
                                                <input type="text" class="search-input" name="search_switch"/>
                                                <button type="button" class="btn-min-search">Go</button>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="product-container" id="product-container-switch">


                                        </div>
                                    </div><br>
                                </div>


                            </li>

                            <li>
                                <div class="open">Electrical <span>Prise</span>
                                    <button type="button" id="btn-drw-prise" class="btn-min-image">+</button>
                                </div>

                                <div class="e-item-cont">

                                    <div class="single-item-con" id="prise-item-div">

                                        <div class="search-div">
                                            <div>
                                                <span>Search</span>
                                            </div>

                                            <div style="margin-top: 14px;">
                                                <input type="text" class="search-input" name="search_prise"/>
                                                <button type="button" class="btn-min-search">Go</button>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="product-container" id="product-container-Prise">


                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>

                    <hr class="ht-horz">

                    <div class="property-div">
                        <!-- 						<table>
                                                        <thead>
                                                        <th>
                                                        <td>Name</td>
                                                        <td>Price</td>
                                                        <td>Discount</td>
                                                        <td>Weight</td>
                                                        <td>Visibility</td>
                                                        </th>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td colspan="6">No items yet</td>
                                                        </tr>
                                                        </tbody>
                                                    </table> -->
                    </div>
                </div>
            </div>
            <!--side bar ended-->





            <div style="height:50px; width:100%;"></div>

            <canvas id="ruler-canvas" style="border:1px solid #fff; position:absolute; top: 0;left: 0;"></canvas>
            <canvas id="draw-tool-canvas"></canvas>
            <!-- <div id="scale-ratio-display">&nbsp;</div>
            <div id="zoom-ratio-display">&nbsp;</div> -->
        </div>
    </div>


    <div id="switch-menu-container">
        <ul id="switch-menu" data-root-obj-id="">
        </ul>
    </div>

    <div id="mouse-action-container">
        <ul id="mouse-action-menu">
            <li id="cut" data-action="cut">Cut</li>
            <li id="copy" data-action="copy">Copy</li>
            <li id="paste" data-action="paste">Paste</li>
            <li id="delete" data-action="delete">Delete</li>
        </ul>
    </div>

    <div id="text-container">
        <input id="type-text" type="text" name="type-text" value="" placeholder="Enter your text here"/><br/>
        <input id="type-text-size" type="text" name="type-text-size" value="15" placeholder="Font size in pixels" size="3" maxlength="3"/>px<br/>
        <button id="text-ok">OK</button>
        <button id="text-cancel">Cancel</button>
    </div>

    <!--bulb pop up-->
    <div class="bulb-pop" id="bulb-prop">
        <div class="header">
            <h4>Bulb property</h4>
            <button class="btn-close" type="button" id="bulb-prop-close">X</button>
        </div>
        <div class="body">
            <div class="input-container">
                <div class="form-label">Name :</div>
                <input type="text" id="b-name"/>
            </div>

            <div class="input-container">
                <div class="form-label">X(m) :</div>
                <input type="number" id="b-x"/>
            </div>

            <div class="input-container">
                <div class="form-label">Y(m) :</div>
                <input type="number" id="b-y"/>
            </div>

            <div class="input-container">
                <div class="form-label">Elevation (m) :</div>
                <input type="number" id="elevation"/>
            </div>

            <div class="input-container">
                <div class="form-label">Angle (o) :</div>
                <input type="number" id="angle"/>
            </div>

            <div class="input-container">
                <div class="form-label">Light power (%) :</div>
                <input type="number" id="power"/>
            </div>


        </div>
        <div class="footer">
            <div class="f-buttons">
                <button type="button" id="bb-save" class="btn-info">Save</button>
                <!-- <button type="button" id="bb-cancel" class="btn-error">Cancel</button> -->
            </div>
        </div>
    </div>
    <!--bulb pop up end-->


    <!--switch pop up start-->
    <div class="switch-pop" id="switch-prop">
        <div class="header">
            <h4>Switch property</h4>
            <button class="btn-close" type="button" id="switch-prop-close">X</button>
        </div>
        <div class="body">

            <div>
                <div class="input-container">
                    <div class="form-label">Name :</div>
                    <input type="text" id="s-name"/>
                </div>

                <div class="input-container">
                    <div class="form-label">X(m) :</div>
                    <input type="number" id="s-x"/>
                </div>

                <div class="input-container">
                    <div class="form-label">Y(m) :</div>
                    <input type="number" id="s-y"/>
                </div>

                <div class="input-container">
                    <div class="form-label">Elevation (m) :</div>
                    <input type="number" id="s-elevation"/>
                </div>

                <div class="input-container">
                    <div class="form-label">Angle (o) :</div>
                    <input type="number" id="s-angle"/>
                </div>

                <fieldset>
                    <legend>Button and Lights</legend>
                    <div class="input-container">
                        <div class="form-label">Lights :</div>
                        <select id="switch-lig" data-root-obj-id="tel me something"></select>
                    </div>

                    <button type="button" id="add-s-buld" class="btn-info">Add</button>
                    <!--<button type="button" class="btn-error">Remove</button>-->
                </fieldset>

            </div>

            <div class="one-half">

            </div>
        </div>
        <div class="footer">
            <div class="f-buttons">
                <button type="button" id="b-save" class="btn-info">Save</button>
                <!-- <button type="button" id="b-cancel" class="btn-error">Cancel</button> -->
            </div>
        </div>
    </div>

		<span class="canvas-tooltip-span" id="span-tooltip-can">
			<img id="can-tool-image" alt="" src=""/>
		</span>
    </body>
    {{ Html::script('js/jquery.js') }}
    {{ Html::script('js/jquery-ui.min.js') }}
    {{ Html::script('js/draw-object.js') }}
    {{ Html::script('js/draw-tool.js') }}
    {{ Html::script('js/controllers.js') }}
    {{ Html::script('js/product-json.js') }}
    {{ Html::script('js/functions.js') }}
    {{ Html::script('js/rays/polyk.js') }}
    {{ Html::script('js/rays/ivank.js') }}
    {{ Html::script('js/left-menu.js') }}
    {{ Html::script('js/reports.js') }}

