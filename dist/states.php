
<?php 
include ('header.php');
?>

			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
				<!--begin::Content-->
				<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
					<!--begin::Subheader-->
<div class="subheader py-3 py-lg-8  subheader-transparent " id="kt_subheader">
    <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">

			<!--begin::Page Heading-->
			<div class="d-flex align-items-baseline flex-wrap mr-5">
				<!--begin::Page Title-->
	            <h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">
	                Validation States
	                	            </h2>
				<!--end::Page Title-->

	            					<!--begin::Breadcrumb-->
	                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
	                    							<li class="breadcrumb-item">
	                        	<a href="" class="text-muted">
	                            	Forms	                        	</a>
							</li>
	                    							<li class="breadcrumb-item">
	                        	<a href="" class="text-muted">
	                            	Form Validation	                        	</a>
							</li>
	                    							<li class="breadcrumb-item">
	                        	<a href="" class="text-muted">
	                            	Validation States	                        	</a>
							</li>
	                    	                </ul>
					<!--end::Breadcrumb-->
	            			</div>
			<!--end::Page Heading-->
        </div>
		<!--end::Info-->

		<!--begin::Toolbar-->
        <div class="d-flex align-items-center">
			<!--begin::Button-->
			<a href="#" class="btn btn-fixed-height btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
				<span class="svg-icon svg-icon-success svg-icon-lg"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span> New Member
			</a>
			<!--end::Button-->

			<!--begin::Dropdown-->
            <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                <a href="#" class="btn btn-fixed-height btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-success svg-icon-lg"><!--begin::Svg Icon | path:assets/media/svg/icons/Files/File.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
        <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
    </g>
</svg><!--end::Svg Icon--></span> New Report
                </a>
                <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                    <!--begin::Navigation-->
<ul class="navi navi-hover">
    <li class="navi-header font-weight-bold py-4">
        <span class="font-size-lg">Choose Label:</span>
        <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
    </li>
    <li class="navi-separator mb-3 opacity-70"></li>
    <li class="navi-item">
        <a href="#" class="navi-link">
            <span class="navi-text">
                <span class="label label-xl label-inline label-light-success">Customer</span>
            </span>
        </a>
    </li>
    <li class="navi-item">
        <a href="#" class="navi-link">
            <span class="navi-text">
                <span class="label label-xl label-inline label-light-danger">Partner</span>
            </span>
        </a>
    </li>
    <li class="navi-item">
        <a href="#" class="navi-link">
            <span class="navi-text">
                <span class="label label-xl label-inline label-light-warning">Suplier</span>
            </span>
        </a>
    </li>
    <li class="navi-item">
        <a href="#" class="navi-link">
            <span class="navi-text">
                <span class="label label-xl label-inline label-light-primary">Member</span>
            </span>
        </a>
    </li>
    <li class="navi-item">
        <a href="#" class="navi-link">
            <span class="navi-text">
                <span class="label label-xl label-inline label-light-dark">Staff</span>
            </span>
        </a>
    </li>
    <li class="navi-separator mt-3 opacity-70"></li>
    <li class="navi-footer py-4">
        <a class="btn btn-clean font-weight-bold btn-sm" href="#">
            <i class="ki ki-plus icon-sm"></i>
            Add new
        </a>
    </li>
</ul>
<!--end::Navigation-->
                </div>
            </div>
			<!--end::Dropdown-->

			<!--begin::Button-->
			<a href="#" class="btn btn-success btn-icon font-weight-bold" data-toggle="modal" data-target="#kt_chat_modal">
				<span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"/>
        <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span>			</a>
			<!--end::Button-->
        </div>
		<!--end::Toolbar-->
    </div>
</div>
<!--end::Subheader-->

					<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class=" container ">
			<div class="row">
	<div class="col-lg-6">
		<!--begin::Card-->
		<div class="card card-custom gutter-b example example-compact">
			<div class="card-header">
				<h3 class="card-title">
					Default Form Validation States
				</h3>
				<div class="card-toolbar">
					<div class="example-tools justify-content-center">
						<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
						<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			<form class="form">
				<div class="card-body">
					<div class="form-group">
						<label class="form-control-label" >Input with success <span class="text-danger">*</span></label>
						<input type="text" class="form-control is-valid" />
						<div class="valid-feedback">Success! You've done it.</div>
						<span class="form-text text-muted">Example help text that remains unchanged.</span>
					</div>
					<div class="form-group">
						<label class="form-control-label" >Input with error <span class="text-danger">*</span></label>
						<input type="text" class="form-control is-invalid" />
						<div class="invalid-feedback">Shucks, check the formatting of that and try again.</div>
						<span class="form-text text-muted">Example help text that remains unchanged.</span>
					</div>
					<!--begin::Code example-->
					<div class="example-code mt-10">
						<div class="example-highlight"><pre style="height:300px"><code class="language-html">
							&lt;form class=&quot;form&quot;&gt;
							&lt;div class=&quot;card-body&quot;&gt;
								&lt;div class=&quot;form-group&quot;&gt;
									&lt;label class=&quot;form-control-label&quot; &gt;Input with success &lt;span class=&quot;text-danger&quot;&gt;*&lt;/span&gt;&lt;/label&gt;
									&lt;input type=&quot;text&quot; class=&quot;form-control is-valid&quot; /&gt;
									&lt;div class=&quot;valid-feedback&quot;&gt;Success! You've done it.&lt;/div&gt;
									&lt;span class=&quot;form-text text-muted&quot;&gt;Example help text that remains unchanged.&lt;/span&gt;
								&lt;/div&gt;
								&lt;div class=&quot;form-group&quot;&gt;
									&lt;label class=&quot;form-control-label&quot; &gt;Input with error &lt;span class=&quot;text-danger&quot;&gt;*&lt;/span&gt;&lt;/label&gt;
									&lt;input type=&quot;text&quot; class=&quot;form-control is-invalid&quot; /&gt;
									&lt;div class=&quot;invalid-feedback&quot;&gt;Shucks, check the formatting of that and try again.&lt;/div&gt;
									&lt;span class=&quot;form-text text-muted&quot;&gt;Example help text that remains unchanged.&lt;/span&gt;
								&lt;/div&gt;
							&lt;/div&gt;
							&lt;div class=&quot;card-footer&quot;&gt;
								&lt;button type=&quot;submit&quot; class=&quot;btn btn-success font-weight-bold mr-2&quot;&gt;Submit&lt;/button&gt;
								&lt;button type=&quot;submit&quot; class=&quot;btn btn-light-success font-weight-bold&quot;&gt;Cancel&lt;/button&gt;
							&lt;/div&gt;
						&lt;/form&gt;
						</code></pre></div>					</div>
					<!--end::Code example-->
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-success font-weight-bold mr-2">Submit</button>
					<button type="submit" class="btn btn-light-success font-weight-bold">Cancel</button>
				</div>
			</form>
			<!--end::Form-->
		</div>
		<!--end::Card-->

		<!--begin::Card-->
		<div class="card card-custom gutter-b example example-compact">
			<div class="card-header">
				<h3 class="card-title">
					Horizontal Form Validation States
				</h3>
				<div class="card-toolbar">
					<div class="example-tools justify-content-center">
						<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
						<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			<form class="form">
				<div class="card-body">
					<div class="form-group row ">
						<label class="col-form-label col-lg-3" >Input with success&nbsp;<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" class="form-control is-valid" />
							<div class="valid-feedback">Success! You've done it.</div>
							<span class="form-text text-muted">Example help text that remains unchanged.</span>
						</div>
					</div>
					<div class="form-group row ">
						<label class="col-form-label col-lg-3" >Input with error <span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" class="form-control is-invalid" />
							<div class="invalid-feedback">Shucks, check the formatting of that and try again.</div>
							<span class="form-text text-muted">Example help text that remains unchanged.</span>
						</div>
					</div>
					<!--begin::Code example-->
					<div class="example-code mt-10">
						<div class="example-highlight"><pre style="height:300px"><code class="language-html">
						&lt;form class=&quot;form&quot;&gt;
						&lt;div class=&quot;card-body&quot;&gt;
							&lt;div class=&quot;form-group row &quot;&gt;
								&lt;label class=&quot;col-form-label col-lg-3&quot; &gt;Input with success &lt;span class=&quot;text-danger&quot;&gt;*&lt;/span&gt;&lt;/label&gt;
								&lt;div class=&quot;col-lg-9&quot;&gt;
									&lt;input type=&quot;text&quot; class=&quot;form-control is-valid&quot; /&gt;
									&lt;div class=&quot;valid-feedback&quot;&gt;Success! You've done it.&lt;/div&gt;
									&lt;span class=&quot;form-text text-muted&quot;&gt;Example help text that remains unchanged.&lt;/span&gt;
								&lt;/div&gt;
							&lt;/div&gt;
							&lt;div class=&quot;form-group row &quot;&gt;
								&lt;label class=&quot;col-form-label col-lg-3&quot; &gt;Input with error &lt;span class=&quot;text-danger&quot;&gt;*&lt;/span&gt;&lt;/label&gt;
								&lt;div class=&quot;col-lg-9&quot;&gt;
									&lt;input type=&quot;text&quot; class=&quot;form-control is-invalid&quot; /&gt;
									&lt;div class=&quot;invalid-feedback&quot;&gt;Shucks, check the formatting of that and try again.&lt;/div&gt;
									&lt;span class=&quot;form-text text-muted&quot;&gt;Example help text that remains unchanged.&lt;/span&gt;
								&lt;/div&gt;
							&lt;/div&gt;
						&lt;/div&gt;
						&lt;div class=&quot;card-footer&quot;&gt;
							&lt;div class=&quot;row&quot;&gt;
								&lt;div class=&quot;col-lg-9 ml-lg-auto&quot;&gt;
									&lt;button type=&quot;submit&quot; class=&quot;btn btn-primary font-weight-bold mr-2&quot;&gt;Submit&lt;/button&gt;
									&lt;button type=&quot;submit&quot; class=&quot;btn btn-light-primary font-weight-bold&quot;&gt;Cancel&lt;/button&gt;
								&lt;/div&gt;
							&lt;/div&gt;
						&lt;/div&gt;
					&lt;/form&gt;
					</code></pre></div>					</div>
					<!--end::Code example-->
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-lg-9 ml-lg-auto">
							<button type="submit" class="btn btn-primary font-weight-bold mr-2">Submit</button>
							<button type="submit" class="btn btn-light-primary font-weight-bold">Cancel</button>
						</div>
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>
		<!--end::Card-->

		<!--begin::Card-->
		<div class="card card-custom example example-compact">
			<div class="card-header">
				<h3 class="card-title">
					Input Group Validation States
				</h3>
				<div class="card-toolbar">
					<div class="example-tools justify-content-center">
						<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
						<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			<form class="form">
				<div class="card-body">
					<div class="form-group validated">
						<label class="form-control-label" >Left Addon</label>
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text" ><i class="la la-bar-chart "></i></span></div>
							<input type="text" class="form-control is-valid" placeholder="Email" />
						</div>

						<div class="valid-feedback">Success! You've done it.</div>
						<span class="form-text text-muted">Example help text that remains unchanged.</span>
					</div>
					<div class="form-group validated">
						<label class="form-control-label" >Right Addon</label>
						<div class="input-group">
							<input type="text" class="form-control is-invalid" value="4444a" placeholder="Email" />
							<div class="input-group-append"><span class="input-group-text" >USD</span></div>
						</div>

						<div class="invalid-feedback">Shucks, check the formatting of that and try again.</div>
						<span class="form-text text-muted">Example help text that remains unchanged.</span>
					</div>
					<!--begin::Code example-->
					<div class="example-code mt-10">
						<div class="example-highlight"><pre style="height:300px"><code class="language-html">
						&lt;form class=&quot;form&quot;&gt;
							&lt;div class=&quot;card-body&quot;&gt;
								&lt;div class=&quot;form-group validated&quot;&gt;
									&lt;label class=&quot;form-control-label&quot; &gt;Left Addon&lt;/label&gt;
									&lt;div class=&quot;input-group&quot;&gt;
										&lt;div class=&quot;input-group-prepend&quot;&gt;&lt;span class=&quot;input-group-text&quot; &gt;&lt;i class=&quot;la la-bar-chart &quot;&gt;&lt;/i&gt;&lt;/span&gt;&lt;/div&gt;
										&lt;input type=&quot;text&quot; class=&quot;form-control is-valid&quot; placeholder=&quot;Email&quot; /&gt;
									&lt;/div&gt;

									&lt;div class=&quot;valid-feedback&quot;&gt;Success! You've done it.&lt;/div&gt;
									&lt;span class=&quot;form-text text-muted&quot;&gt;Example help text that remains unchanged.&lt;/span&gt;
								&lt;/div&gt;
								&lt;div class=&quot;form-group validated&quot;&gt;
									&lt;label class=&quot;form-control-label&quot; &gt;Right Addon&lt;/label&gt;
									&lt;div class=&quot;input-group&quot;&gt;
										&lt;input type=&quot;text&quot; class=&quot;form-control is-invalid&quot; value=&quot;4444a&quot; placeholder=&quot;Email&quot; /&gt;
										&lt;div class=&quot;input-group-append&quot;&gt;&lt;span class=&quot;input-group-text&quot; &gt;USD&lt;/span&gt;&lt;/div&gt;
									&lt;/div&gt;

									&lt;div class=&quot;invalid-feedback&quot;&gt;Shucks, check the formatting of that and try again.&lt;/div&gt;
									&lt;span class=&quot;form-text text-muted&quot;&gt;Example help text that remains unchanged.&lt;/span&gt;
								&lt;/div&gt;
							&lt;/div&gt;
							&lt;div class=&quot;card-footer&quot;&gt;
								&lt;button type=&quot;submit&quot; class=&quot;btn btn-success font-weight-bold mr-2&quot;&gt;Submit&lt;/button&gt;
								&lt;button type=&quot;submit&quot; class=&quot;btn btn-light-success font-weight-bold&quot;&gt;Cancel&lt;/button&gt;
							&lt;/div&gt;
						&lt;/form&gt;
						</code></pre></div>					</div>
					<!--end::Code example-->
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-success font-weight-bold mr-2">Submit</button>
					<button type="submit" class="btn btn-light-success font-weight-bold">Cancel</button>
				</div>
			</form>
			<!--end::Form-->
		</div>
		<!--end::Card-->
	</div>
	<div class="col-lg-6">
		<!--begin::Card-->
		<div class="card card-custom gutter-b example example-compact">
			<div class="card-header">
				<h3 class="card-title">
					Checkbox & Radio Validation States
				</h3>
				<div class="card-toolbar">
					<div class="example-tools justify-content-center">
						<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
						<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			<form class="form">
				<div class="card-body">
					<div class="form-group validated">
						<label class="form-control-label" >Checkboxes</label>
						<div class="checkbox-list">
							<label class="checkbox">
								<input type="checkbox"/>
								<span></span>
								Option 1
							</label>
							<label class="checkbox">
								<input type="checkbox"/>
								<span></span>
								Option 2
							</label>
							<label class="checkbox">
								<input type="checkbox"/>
								<span></span>
								Option 3
							</label>
						</div>
						<div class="valid-feedback">Success! You've done it.</div>
						<span class="form-text text-muted">Example help text that remains unchanged.</span>
					</div>
					<div class="form-group validated">
						<label class="form-control-label" >Inline Checkboxes</label>
						<div class="checkbox-inline">
							<label class="checkbox checkbox-outline">
								<input type="checkbox"/>
								<span></span>
								Option 1
							</label>
							<label class="checkbox checkbox-outline">
								<input type="checkbox"/>
								<span></span>
								Option 2
							</label>
							<label class="checkbox checkbox-outline">
								<input type="checkbox"/>
								<span></span>
								Option 3
							</label>
						</div>
						<div class="invalid-feedback">Success! You've done it.</div>
						<span class="form-text text-muted">Example help text that remains unchanged.</span>
					</div>
					<div class="form-group validated">
						<label class="form-control-label" >Radios</label>
						<div class="radio-list">
							<label class="radio radio-outline">
								<input type="radio"/>
								<span></span>
								Option 1
							</label>
							<label class="radio radio-outline">
								<input type="radio"/>
								<span></span>
								Option 2
							</label>
							<label class="radio radio-outline">
								<input type="radio"/>
								<span></span>
								Option 3
							</label>
						</div>
						<div class="valid-feedback">Success! You've done it.</div>
						<span class="form-text text-muted">Example help text that remains unchanged.</span>
					</div>
					<div class="form-group validated">
						<label class="form-control-label" >Inline Radios</label>
						<div class="radio-inline">
							<label class="radio">
								<input type="radio"/>
								<span></span>
								Option 1
							</label>
							<label class="radio">
								<input type="radio"/>
								<span></span>
								Option 2
							</label>
							<label class="radio">
								<input type="radio"/>
								<span></span>
								Option 3
							</label>
						</div>
						<div class="invalid-feedback">Success! You've done it.</div>
						<span class="form-text text-muted">Example help text that remains unchanged.</span>
					</div>
					<!--begin::Code example-->
					<div class="example-code mt-10">
						<div class="example-highlight"><pre style="height:300px"><code class="language-html">
						&lt;form class=&quot;form&quot;&gt;
							&lt;div class=&quot;card-body&quot;&gt;
								&lt;div class=&quot;form-group validated&quot;&gt;
									&lt;label class=&quot;form-control-label&quot; &gt;Checkboxes&lt;/label&gt;
									&lt;div class=&quot;checkbox-list&quot;&gt;
										&lt;label class=&quot;checkbox&quot;&gt;
											&lt;input type=&quot;checkbox&quot;/&gt;
											&lt;span&gt;&lt;/span&gt;
											Option 1
										&lt;/label&gt;
										&lt;label class=&quot;checkbox&quot;&gt;
											&lt;input type=&quot;checkbox&quot;/&gt;
											&lt;span&gt;&lt;/span&gt;
											Option 2
										&lt;/label&gt;
										&lt;label class=&quot;checkbox&quot;&gt;
											&lt;input type=&quot;checkbox&quot;/&gt;
											&lt;span&gt;&lt;/span&gt;
											Option 3
										&lt;/label&gt;
									&lt;/div&gt;
									&lt;div class=&quot;valid-feedback&quot;&gt;Success! You've done it.&lt;/div&gt;
									&lt;span class=&quot;form-text text-muted&quot;&gt;Example help text that remains unchanged.&lt;/span&gt;
								&lt;/div&gt;
								&lt;div class=&quot;form-group validated&quot;&gt;
									&lt;label class=&quot;form-control-label&quot; &gt;Inline Checkboxes&lt;/label&gt;
									&lt;div class=&quot;checkbox-inline&quot;&gt;
										&lt;label class=&quot;checkbox checkbox-outline&quot;&gt;
											&lt;input type=&quot;checkbox&quot;/&gt;
											&lt;span&gt;&lt;/span&gt;
											Option 1
										&lt;/label&gt;
										&lt;label class=&quot;checkbox checkbox-outline&quot;&gt;
											&lt;input type=&quot;checkbox&quot;/&gt;
											&lt;span&gt;&lt;/span&gt;
											Option 2
										&lt;/label&gt;
										&lt;label class=&quot;checkbox checkbox-outline&quot;&gt;
											&lt;input type=&quot;checkbox&quot;/&gt;
											&lt;span&gt;&lt;/span&gt;
											Option 3
										&lt;/label&gt;
									&lt;/div&gt;
									&lt;div class=&quot;invalid-feedback&quot;&gt;Success! You've done it.&lt;/div&gt;
									&lt;span class=&quot;form-text text-muted&quot;&gt;Example help text that remains unchanged.&lt;/span&gt;
								&lt;/div&gt;
								&lt;div class=&quot;form-group validated&quot;&gt;
									&lt;label class=&quot;form-control-label&quot; &gt;Radios&lt;/label&gt;
									&lt;div class=&quot;radio-list&quot;&gt;
										&lt;label class=&quot;radio radio-outline&quot;&gt;
											&lt;input type=&quot;radio&quot;/&gt;
											&lt;span&gt;&lt;/span&gt;
											Option 1
										&lt;/label&gt;
										&lt;label class=&quot;radio radio-outline&quot;&gt;
											&lt;input type=&quot;radio&quot;/&gt;
											&lt;span&gt;&lt;/span&gt;
											Option 2
										&lt;/label&gt;
										&lt;label class=&quot;radio radio-outline&quot;&gt;
											&lt;input type=&quot;radio&quot;/&gt;
											&lt;span&gt;&lt;/span&gt;
											Option 3
										&lt;/label&gt;
									&lt;/div&gt;
									&lt;div class=&quot;valid-feedback&quot;&gt;Success! You've done it.&lt;/div&gt;
									&lt;span class=&quot;form-text text-muted&quot;&gt;Example help text that remains unchanged.&lt;/span&gt;
								&lt;/div&gt;
								&lt;div class=&quot;form-group validated&quot;&gt;
									&lt;label class=&quot;form-control-label&quot; &gt;Inline Radios&lt;/label&gt;
									&lt;div class=&quot;radio-inline&quot;&gt;
										&lt;label class=&quot;radio&quot;&gt;
											&lt;input type=&quot;radio&quot;/&gt;
											&lt;span&gt;&lt;/span&gt;
											Option 1
										&lt;/label&gt;
										&lt;label class=&quot;radio&quot;&gt;
											&lt;input type=&quot;radio&quot;/&gt;
											&lt;span&gt;&lt;/span&gt;
											Option 2
										&lt;/label&gt;
										&lt;label class=&quot;radio&quot;&gt;
											&lt;input type=&quot;radio&quot;/&gt;
											&lt;span&gt;&lt;/span&gt;
											Option 3
										&lt;/label&gt;
									&lt;/div&gt;
									&lt;div class=&quot;invalid-feedback&quot;&gt;Success! You've done it.&lt;/div&gt;
									&lt;span class=&quot;form-text text-muted&quot;&gt;Example help text that remains unchanged.&lt;/span&gt;
								&lt;/div&gt;
							&lt;/div&gt;
							&lt;div class=&quot;card-footer&quot;&gt;
								&lt;button type=&quot;submit&quot; class=&quot;btn btn-success font-weight-bold mr-2&quot;&gt;Submit&lt;/button&gt;
								&lt;button type=&quot;submit&quot; class=&quot;btn btn-light-success font-weight-bold&quot;&gt;Cancel&lt;/button&gt;
							&lt;/div&gt;
						&lt;/form&gt;
						</code></pre></div>					</div>
					<!--end::Code example-->
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-success font-weight-bold mr-2">Submit</button>
					<button type="submit" class="btn btn-light-success font-weight-bold">Cancel</button>
				</div>
			</form>
			<!--end::Form-->
		</div>
		<!--end::Card-->

		<!--begin::Card-->
		<div class="card card-custom example example-compact">
			<div class="card-header">
				<h3 class="card-title">
					Icon Input Validation States
				</h3>
				<div class="card-toolbar">
					<div class="example-tools justify-content-center">
						<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
						<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			<form class="form">
				<div class="card-body">
					<div class="form-group validated">
						<label class="form-control-label" >Left Icon</label>
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text" ><i class="la la-map-marker "></i></span></div>
							<input type="text" class="form-control is-valid" placeholder="Email"/>
						</div>
						<div class="valid-feedback">Success! You've done it.</div>
						<span class="form-text text-muted">Example help text that remains unchanged.</span>
					</div>
					<div class="form-group validated">
						<label class="form-control-label" >Right Icon</label>
						<div class="input-group">
							<input type="text" class="form-control is-invalid" placeholder="Email"/>
							<div class="input-group-append"><span class="input-group-text" ><i class="la la-unlock-alt "></i></span></div>
						</div>
						<div class="invalid-feedback">Shucks, check the formatting of that and try again.</div>
						<span class="form-text text-muted">Example help text that remains unchanged.</span>
					</div>
					<!--begin::Code example-->
					<div class="example-code mt-10">
						<div class="example-highlight"><pre style="height:300px"><code class="language-html">
						&lt;form class=&quot;form&quot;&gt;
							&lt;div class=&quot;card-body&quot;&gt;
								&lt;div class=&quot;form-group validated&quot;&gt;
									&lt;label class=&quot;form-control-label&quot; &gt;Left Icon&lt;/label&gt;
									&lt;div class=&quot;input-group&quot;&gt;
										&lt;div class=&quot;input-group-prepend&quot;&gt;&lt;span class=&quot;input-group-text&quot; &gt;&lt;i class=&quot;la la-map-marker &quot;&gt;&lt;/i&gt;&lt;/span&gt;&lt;/div&gt;
										&lt;input type=&quot;text&quot; class=&quot;form-control is-valid&quot; placeholder=&quot;Email&quot;/&gt;
									&lt;/div&gt;
									&lt;div class=&quot;valid-feedback&quot;&gt;Success! You've done it.&lt;/div&gt;
									&lt;span class=&quot;form-text text-muted&quot;&gt;Example help text that remains unchanged.&lt;/span&gt;
								&lt;/div&gt;
								&lt;div class=&quot;form-group validated&quot;&gt;
									&lt;label class=&quot;form-control-label&quot; &gt;Right Icon&lt;/label&gt;
									&lt;div class=&quot;input-group&quot;&gt;
										&lt;input type=&quot;text&quot; class=&quot;form-control is-invalid&quot; placeholder=&quot;Email&quot;/&gt;
										&lt;div class=&quot;input-group-append&quot;&gt;&lt;span class=&quot;input-group-text&quot; &gt;&lt;i class=&quot;la la-unlock-alt &quot;&gt;&lt;/i&gt;&lt;/span&gt;&lt;/div&gt;
									&lt;/div&gt;
									&lt;div class=&quot;invalid-feedback&quot;&gt;Shucks, check the formatting of that and try again.&lt;/div&gt;
									&lt;span class=&quot;form-text text-muted&quot;&gt;Example help text that remains unchanged.&lt;/span&gt;
								&lt;/div&gt;
							&lt;/div&gt;
							&lt;div class=&quot;card-footer&quot;&gt;
								&lt;button type=&quot;submit&quot; class=&quot;btn btn-primary font-weight-bold mr-2&quot;&gt;Submit&lt;/button&gt;
								&lt;button type=&quot;submit&quot; class=&quot;btn btn-light-primary font-weight-bold&quot;&gt;Cancel&lt;/button&gt;
							&lt;/div&gt;
						&lt;/form&gt;
						</code></pre></div>					</div>
					<!--end::Code example-->
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary font-weight-bold mr-2">Submit</button>
					<button type="submit" class="btn btn-light-primary font-weight-bold">Cancel</button>
				</div>
			</form>
			<!--end::Form-->
		</div>
		<!--end::Card-->
	</div>
</div>
		</div>
		<!--end::Container-->
	</div>
<!--end::Entry-->
				</div>
				<!--end::Content-->

<?php 
include ('footer.php');
?>