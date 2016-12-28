<!DOCTYPE html>
<html>
<head>

    {{ Html::style('canvas/css/draw-tool.css') }}
    {{ Html::style('canvas/css/tool-bar.css') }}
    {{ Html::style('canvas/css/left-menu.css') }}
    {{ Html::style('canvas/css/right-click-menu.css') }}
    {{ Html::style('canvas/css/address-bar.css') }}
    {{ Html::style('canvas/lib/jquery-ui.min.css') }}
    {{ Html::style('canvas/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('canvas/bootstrap/css/bootstrap.min.css') }}
    {{ Html::style('canvas/dist/css/lobipanel.min.css') }}
    {{ Html::style('canvas/lib/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('canvas/lib/highlight/github.css') }}
    {{ Html::style('canvas/demo/documentation.css') }}
    {{ Html::style('canvas/demo/demo.css') }}
    {{ Html::style('canvas/css/rating-stars.css') }}
    {{ Html::style('canvas/css/custom-css.css') }}
    {{ Html::style('canvas/css/lobipannel-styles.css') }}




</head>
<body>
<!--Tool bar started-->
<div id="parent" style="">
    <div id="sidebar" class="col-md-3 col-lg-3 col-sm-3 col-xs-3" style="background-color: #E7E7E7">
	<div style=" background-color:#E7E7E7; ">
		<div class="panel panel-default  body-main inside-body-pan" style="background-color: #51748c;"id="main-pnnel-drag" >
			<div class="panel-heading back-ground-colour-inner">
					<div class="panel-title back-ground-colour-inner row line-hight" style="padding-right: 10px;width: 280px">
						<div class="row left-align"  style="margin-top: 40px;margin-bottom: 3px">
							<div class="col-md-2=1 col-lg-2 col-sm-2 col-xs-2"   >
								<img class="pro-logo" src="{!! asset('img/logooo.png') !!}" align="center">
							</div>
							<div class="col-md-7 col-lg-7 col-sm-7 col-xs-7 title titel-text-size content_right_head span-new"  id="plan-name" data-toggle="tooltip" data-placement="left" title="Fist Floor:Electrical" style="margin-top: 5px">Fist Floor:Electrical</div>
						<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 title titel-text-size" id="scale1" align="right" style="margin-top: 5px">1:100</div>
						</div>
						<div class="row" style=" margin-bottom:2px; " >
							<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-in-side-menue title" >Energy Rated :</div>
							<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6" id="energy-reted" style="padding-left: 50px">
								<form class="acidjs-rating-stars">
									<input type="radio" name="group-1" id="group-1-0" value="5" /><label for="group-1-0"></label>
									<input type="radio" name="group-1" id="group-1-1" value="4" /><label for="group-1-1"></label>
									<input type="radio" name="group-1" id="group-1-2" value="3" /><label for="group-1-2"></label>
									<input type="radio" name="group-1" id="group-1-3" value="2" /><label for="group-1-3"></label>
									<input type="radio" name="group-1" id="group-1-4"  value="1" /><label for="group-1-4"></label>
									<input type="radio" name="group-1" id="group-1-5"  value="1" /><label for="group-1-4"></label>
								</form>
							</div>
						</div>
						<div class="row" style=" margin-bottom:2px; margin-top:2px;"  >
							<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-in-side-menue title">Max Energy :</div>
							<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-sub-cat" id="max-energy">XXX5</div>
						</div>
						<div class="row" style=" margin-bottom:2px; margin-top:2px;" >
							<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-in-side-menue title" >Design Energy :</div>
							<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-sub-cat" id="design-energy">XXX5</div>
						</div>
						<div class="row" style=" margin-bottom:2px; margin-top:2px;" >
							<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-in-side-menue title">Variation cost :</div>
							<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-sub-cat" id="variation-cost">XXX5</div>
						</div>
					</div>
				</div>
			<div class="panel-body back-ground-colour-inner main-body-tag inside-body-pan" id="main-pannel-body" style="padding:0px;overflow: auto" >
				<div class="panel panel-default inner-class cat-1 hide-catelog" id="main-0">
					<div class="panel-heading ">
						<div class="panel-title ading-left-padding title titel-text-size" >
							<div id="0">

							</div>

						</div>
					</div>
					<div class="panel-body back-ground-colour-inner inside-body-pan body-inner" style="overflow-x: hidden;overflow-y:auto;">
						<div class="row" style=" margin-bottom:4px; margin-top:4px;" >
							<ul class="level-2" style="" id="catlog-0">
							</ul>

						</div>
					</div>
				</div>
				<div class="panel panel-default inner-class cat-2 hide-catelog" id="main-1">
					<div class="panel-heading">
						<div class="panel-title ading-left-padding title titel-text-size">
							<div id="1">

							</div>
						</div>
					</div>
					<div class="panel-body back-ground-colour-inner inside-body-pan body-inner" style="overflow-x: hidden;overflow-y:auto;">
						<div class="row" style=" margin-bottom:4px; margin-top:4px;" id="catlog-2">
							<ul class="level-2" style="">

							</ul>

						</div>
					</div>
				</div>
				<div class="panel panel-default inner-class cat-3 hide-catelog" id="main-2">
					<div class="panel-heading">
						<div class="panel-title ading-left-padding title titel-text-size">
							<div id="2">

							</div>
						</div>
					</div>
					<div class="panel-body back-ground-colour-inner inside-body-pan body-inner" style="overflow-x: hidden;overflow-y:auto;">
						<div class="row" style=" margin-bottom:4px; margin-top:4px;" id="catlog-2">
							<ul class="level-2" style="">
							</ul>
						</div>
					</div>
				</div>
				<div class="panel panel-default inner-class cat-4 hide-catelog" id="main-3">
					<div class="panel-heading">
						<div class="panel-title ading-left-padding title titel-text-size">
							<div id="3">

							</div>
						</div>
					</div>
					<div class="panel-body back-ground-colour-inner inside-body-pan body-inner" style="overflow-x: hidden;overflow-y:auto;">
						<div class="row" style=" margin-bottom:4px; margin-top:4px;" id="catlog-3">
							<ul class="level-2" style="">
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div  style="background-color:green;  vertical-align: bottom;">
		<div class="panel panel-default bom-medder" id="bom-area1">
			<div class="panel-heading test1">
				<div class="panel-title ading-left-padding title titel-text-size" >
					BOM
				</div>
				</div>
				<div class="panel-body back-ground-colour-inner">
				<div class="side-bar2" id="bom-area">
					<div class="property-div" >
						<table id="productInfo" border="1" cellpadding="2">
							<tr>
								<td><b>Name</b></td>
								<td><b>Price</b></td>
								<td><b>Discount</b></td>
								<td><b>Energy(W)</b></td>
								<td><b>Visible</b></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div >

    <div id="design-area" class="col-md-9 col-lg-9 col-sm-9 col-xs-9">
    <div id="address-bar">
        <div class="headerDiv first border-left-add">
                Job #: PID0001
        </div>
        <div class="headerDiv second">
                Project: Street Adress/Lot No, Postcode, Sturb, State.
        </div>
        <div class="headerDiv third">
                <img src="/img/adopto.png" width="90"/>
        </div>
    </div>

	<div id="top-menu" >
		<div class="row">

		</div>
		<div class="col-md-10 col-lg-10 col-sm-10 col-xs-10 border-left-add">
			<ul id="tool-items-ul">
				<li class="tool-item">
					<a href="javascript:void(0)" id="home-button">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/home.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/home.png') !!}">
					</a>
					<span class="tooltiptext">Home</span>
				</li>

				<li class="tool-item">
					<a href="javascript:void(0)" id="save-button">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/saveIcon.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/saveIcon.png') !!}">
					</a>
					<span class="tooltiptext">Save</span>
				</li>

				<li class="tool-item" id="print-btn">
					<a href="javascript:void(0)">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/printIcon.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/printIcon.png') !!}">
					</a>
					<span class="tooltiptext">Print</span>
				</li>


				<li class="tool-item">
					<a href="javascript:void(0)" id="proj-comment-button">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/project_comment.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/project_comment.png') !!}">
					</a>
					<span class="tooltiptext">Project Comment</span>
				</li>

				<li>|</li>

				<li class="tool-item">
					<a href="javascript:void(0)" id="plans-button">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/plan.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/plan.png') !!}">
					</a>
					<span class="tooltiptext">Plans</span>
				</li>
				<li class="tool-item">
					<a href="javascript:void(0)" id="archived-plan-button">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/archived_plans.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/archived_plans.png') !!}">
					</a>
					<span class="tooltiptext">Archived Plans</span>
				</li>

				<li>|</li>

				<li class="tool-item">
					<a href="javascript:void(0);" id="undo">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/undo.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/undo.png') !!}">
					</a>
					<span class="tooltiptext">Undo</span>
				</li>
				<li class="tool-item">
					<a href="javascript:void(0);" id="redo">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/redo.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/redo.png') !!}">
					</a>
					<span class="tooltiptext">Redo</span>
				</li>

				<li> |</li>


				<li class="tool-item toggle-button">
					<a href="javascript:void(0);" id="drag">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/selectIcon.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/selectIcon.png') !!}">
					</a>
					<span class="tooltiptext">Move</span>
				</li>

				<li class="tool-item toggle-button">
					<a href="javascript:void(0);" id="cwall">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/NewWallIcon.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/NewWallIcon.png') !!}">
					</a>
					<span class="tooltiptext">Draw walls</span>
				</li>

				<li class="tool-item toggle-button">
					<a href="javascript:void(0);" id="eraser">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/eraser_icon.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/eraser_icon.png') !!}">
					</a>
					<span class="tooltiptext">Eraser</span>
				</li>

				<li id="add-text" class="tool-item toggle-button">
					<a href="javascript:void(0)">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/text.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/text.png') !!}">
					</a>
					<span class="tooltiptext">Add Text</span>
				</li>

				<li class="tool-item toggle-button">
					<a href="javascript:void(0);" id="scale">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/scale.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/scale.png') !!}">
					</a>
					<span class="tooltiptext">Scale</span>
				</li>

				<li class="tool-item toggle-button">
					<a href="javascript:void(0);" id="pan">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/handIcon.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/handIcon.png') !!}">
					</a>
					<span class="tooltiptext">Pan</span>
				</li>

				<li>|</li>

				<li class="tool-item">
					<a href="javascript:void(0);" id="zoom-in" class="zoom-control" data-action="zoom-in">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/zoom_in.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/zoom_in.png') !!}">
					</a>
					<span class="tooltiptext">Zoom in</span>
				</li>
				<li class="tool-item">
					<a href="javascript:void(0);" id="zoom-out" class="zoom-control" data-action="zoom-out">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/zoom_out.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/zoom_out.png') !!}">
					</a>
					<span class="tooltiptext">Zoom out</span>
				</li>
			</ul>
		</div>
		<div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
			<ul id="tool-items-ul1" style="float:right">
				<li class="tool-item">
					<a href="javascript:void(0)" id="help-button">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/infomationIcon.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/infomationIcon.png') !!}">
					</a>
					<span class="tooltiptext">Help</span>
				</li>
				<li class="tool-item">
					<a href="javascript:void(0)" id="logout-button">
						<img class="image-item" 		src="{!! asset('img/tool-bar/black/logOffIcon.png') !!}">
						<img class="image-item-hover" 	src="{!! asset('img/tool-bar/blue/logOffIcon.png') !!}">
					</a>
					<span class="tooltiptext">Settings/Logout</span>
				</li>
			</ul>
		</div>
	</div>

	<!--<hr>-->

	<!--Tool bar end-->

	<!-- wrapper start -->
	<div id="wrapper">

		<div id="container">
			<!--<div style="height:50px; width:100%;"></div>-->
			<canvas id="ruler-canvas" style="border:1px solid #fff; position:absolute; top: 0;left: 0;"></canvas>
			<canvas id="bg-canvas"></canvas>
			<canvas id="draw-tool-canvas" class="hide-canvas"></canvas>
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
	</div>
</div>

<span class="canvas-tooltip-span" id="span-tooltip-can">
	<table class="noborder">
		<tbody>
			<tr>
				<th id="can-tool-title"></th>
				<td rowspan="2" class="noborder">
					<img id="can-tool-image" alt="" src=""/>
				</td>
			</tr>
			<tr>
				<td id="can-tool-product-code" class="noborder"></td>
			</tr>
			<tr>
				<td class="noborder">Fit-Off Dimensions:
					<ul>
						<li id="can-tool-product-elevation"></li>
						<li id="can-tool-product-location"></li>
					</ul>
				</td>
				<td align="center" class="noborder"><h4 id="can-tool-product-power"></h4><h5>watts</h5></td>
			</tr>
			<tr>
				<td colspan="2" class="noborder">
					<input type="text" id="can-tool-product-note" style="color:black; width:100%;" placeholder="Notes"/>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right" class="noborder">
					<!--<button type="button" id="can-tool-btn-cancel" class="btn btn-primary">Edit</button>-->
					<button type="button" id="can-tool-btn-save" class="btn btn-primary">Save</button>
				</td>
			</tr>
		</tbody>
	</table>
</span>


{{ Html::script('canvas/js/jquery-3.1.1.js') }}
{{ Html::script('canvas/js/jquery-ui.js') }}
{{ Html::script('canvas/js/draw-object.js') }}
{{ Html::script('canvas/js/draw-tool.js') }}
{{ Html::script('canvas/js/controllers_template.js') }}
{{ Html::script('canvas/js/product-json.js') }}
{{ Html::script('canvas/js/functions.js') }}
{{ Html::script('canvas/js/rays/polyk.js') }}
{{ Html::script('canvas/js/rays/ivank.js') }}
{{ Html::script('canvas/js/left-menu.js') }}
{{ Html::script('canvas/js/reports.js') }}
{{ Html::script('canvas/js/scripts-expand.js') }}
{{ Html::script('canvas/lib/jquery.ui.touch-punch.min.js') }}
{{ Html::script('canvas/bootstrap/js/bootstrap.min.js') }}
{{ Html::script('canvas/dist/js/lobipanel.js') }}
{{ Html::script('canvas/lib/highlight/highlight.pack.js') }}
{{ Html::script('canvas/js/data-bind.js') }}
{{ Html::script('canvas/js/lobipannel-query.js') }}



<script>

	$(function() {
		init();
		setBackgroundImage('{!! url($bgImg) !!}');
	});
	$('#plans-button').on('click', function () {

		$('.template_modal').modal('show');
	});

</script>


<div class="modal fade template_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div id="templates">
                <!-- Child elements of container with class="list" becomes list items -->
                <ul class="list">
                    @foreach($plans as $plan)

                        <li>
                            <div class="row">
                                <div class="col-md-6"><img src="{!! asset($plan->img) !!}" class="col-md-12"></div>
                                <div class="col-md-6">
                                    <a href="{!! url('templates/create/add-plans/'.$plan->id.'/canvas') !!}">Open</a>
                                </div>
                            </div>

                            <h3 class="name_1 template-item"
                                data-template-id="{!! $plan->id !!}"
                                data-template-name="{!! $plan->design !!}"
                            >{!! $plan->design !!}</h3>

                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</div>
</body>

</html>
