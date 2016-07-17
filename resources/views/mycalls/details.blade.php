<!DOCTYPE html>
<html lang="en">

<head>
@include('template/admin_title')
@include('template/admin_cssscripta')
</head>
<style>
smallfont{
	font-size:10px;
}
</style>
<body>
@include('template/admin_header')
@include('template/admin_sidebar')
@include('template/script_multilanguage')

<div id="page-wrapper" >
	<div id="page-inner">
		<?php  $not_found = 0;
			if(!isset($not_found)){ ?>
			<div class="row">
				<div class="col-lg-10 col-md-10">
					<h2>{{ trans('routes.norecord') }}</h2>
					<hr/>
				</div>
			</div>
		<?php } else { ?>
		   <div class="row">
				<div class="col-lg-5 col-md-5">
					<h3><?php  echo "<b>".$personal_details->name."</b>"; ?></h3>
				</div>
				<div class="col-lg-5 col-md-5">
					<h3>
					<?php  echo "<b>".trans('routes.phonenumber')."</b>: "; 
							echo $personal_details->phone_number;
					?>
					</h3>
				</div>
				<div class="col-lg-2 col-md-2">
					<h3><b>
					<span class="label label-success">
						<?php 	echo trans('routes.callid').$personal_details->due_id; ?>
					</span>
					</b></h3>
				</div>
		   </div>
			<hr />
			<div class="row">
			<h5>
				<div class="col-lg-5 col-md-5">
					<p>
					<?php echo "<b>".trans('routes.expecteddate')."</b>: ";
						echo $personal_details->due_date;
					?>
					</p>
					<p>
					<?php  echo "<b>".trans('routes.husbandname')."</b>: ";
							echo $personal_details->husband_name;
					?>
					</p>
				</div>
				<div class="col-lg-7 col-md-7">
					<p>
					<?php  echo "<b>".trans('routes.village')."</b>: ";
							echo $personal_details->village_name;
					?>
					</p>
					<p>
					<?php  echo "<b>".trans('routes.fieldworkername')."</b>: ";
							echo $personal_details->field_worker_name;
					?>
					</p>
				</div>
			</h5>
			</div>
			<div class="row">
				<div class="col-lg-5 col-md-5">
					<h4><b>
					<span class="label label-primary">
					
					<?php 
							echo " ".trans('routes.thiscallscheduled')." ";
							echo "12 June 2016";
					?>
					</span>
					</b></h4>
				</div>
				<div class="col-lg-5 col-md-5">
					<h4><b>
					<?php 
					// Logic for checking whether this call is done or not 
						$call_done = true;
						if($call_done){ 
					?>
						
						<span class = "label label-danger"> 
							{{ trans('routes.callcompleted') }}
						</span>
					
					<?php }
						$prev_calls_unattended = true;
						if($prev_calls_unattended){	
					?>		
						<span class = "label label-danger">
						XX {{ trans('routes.callsunattended') }}
						</span>
					<?php }
					?>
					</b></h4>
				</div>
			</div>
			<hr/>
			<div class ="row">
				<div class="col-lg-12 col-md-12">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#t_notes" data-toggle="tab"> <b> {{ trans('routes.notes') }} </b></a>
						</li>
						<li class=""><a href="#t_previouscalls" data-toggle="tab"> <b>{{ trans('routes.callscompletedscheduled') }} </b> </a>
						</li>
					 </ul>
					 <!-- BEGIN CODE FOR TABBED CONTENT -->
					 <div class="tab-content">
					 
					 <!-- BEGIN CODE FOR TAB "Notes from call" -->
                        <div class="tab-pane fade active in" id="t_notes">
							<!-- Begin section for action items -->
							<div class="col-lg-6 col-md-6">
								<h4><b>
								<span class = "label label-warning">
									{{trans('routes.actionitem')}}
								</span>
								</b></h4>
								<ul>
									<li> Talk to me</li>
									<li> Talk to you</li>
								</ul>
							
							</div>
							<!-- End section for action items -->
							<!-- Begin section for textarea -->
							<div class="col-lg-6 col-md-6">
							   <div class="form-group">
								  <label for="action_note">{{ trans('routes.notes_field')}}
								  <span class="label label-danger">Important</span>
								  </label>
								  <textarea class="form-control" rows="5" id="action_note"></textarea>
								</div>
								
							   <div class="form-group">
								  <label for="general_note">{{ trans('routes.notes_general') }} Rani Jhansi</label>
								  <textarea class="form-control" rows="5" id="general_note"></textarea>
								</div>
								
								<a href="#" class="btn btn-primary">{{trans('routes.submitnote')}}</a>
							</div>
							<!-- End section for textarea -->
                        </div>
							
					<!-- BEGIN CODE FOR TAB "Action items" -->
						<div class="tab-pane fade" id="t_previouscalls">
                           @include('template/mycalls_calldetails')
                        </div>
					 </div>
					 
					 <!-- END CODE FOR TABBED CONTENT -->
					 
				</div>
			</div>
		<?php } //END IF RECORD EMPTY CHECK ?>
	</div>
</div>
@include('template/admin_jsscript')
</body>
