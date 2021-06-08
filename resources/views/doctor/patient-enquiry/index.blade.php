@extends('layouts.adminapp')
@section('header')
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">{{ trans('patient_enquiry.manage_patient_enquiry')}}</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
			
			</div><!-- /.col -->
		</div>
		<div class="col-md-12">
			@include('flash::message')
		</div>
		<!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">{{ trans('patient_enquiry.list_of_patient_enquiry')}}</h3>
			</div>
		  	<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>{{ trans('labels.sr_no')}}</th>
							<th>{{ trans('patient_enquiry.patient_name')}}</th>
							<th>{{ trans('patient_enquiry.email')}}</th>
							<th>{{ trans('labels.actions')}}</th>
						</tr>
				  	</thead>
				  	<tbody>
				  		@if(!empty($objPatientEnquiry) && count($objPatientEnquiry) > 0)
				  		@foreach($objPatientEnquiry as $index => $patientEnquiry)
				  		
				  		<tr>
						    <td>{{ $index + 1 }}</td>
						    <td>{{ $patientEnquiry->fn_patient_enquiry_data->name ?? '' }}</td>
						    <td>{{ $patientEnquiry->fn_patient_enquiry_data->email ?? '' }}</td>
						    <td class="">
						    	@if(empty($patientEnquiry->fn_patient_enquiry_plan_genration_details))
						    		<span class=""><a href="{{ url('doctor/patient-enquiry/' . $patientEnquiry->id) }}"  title="Show" class="btn btn-primary btn-sm">Show</a></span>
						    	@elseif(!empty($patientEnquiry->fn_patient_enquiry_plan_genration_details->doctor_id == Auth::user()->id && $patientEnquiry->status == '1' ))
						    		<span class=""><a href="{{ url('doctor/patient-enquiry/' . $patientEnquiry->id) }}"  title="Show" class="btn btn-primary btn-sm">Show</a></span>
						    	@endif
						    </td>
						</tr>
						@endforeach
					  	@else 
					  	<tr>
					  		<td colspan="3" class="text-center"> {{ trans('labels.no_records')}}</td>
					  	</tr>
					  	@endif
				  	</tbody>
				</table>
			</div>
		  	<!-- /.card-body -->
		</div>
	</div>
</section>

@endsection
@section('footer')
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) { 
		
		$('#example1').DataTable({
			"pageLength": 10,
			"aoColumns": [
			    { "bSortable": false },
			    { "bSortable": true },
			    { "bSortable": false },
			    { "bSortable": false },
			],
			"aaSorting": [],
			language: {
		        searchPlaceholder: "Search records"
		    }
		});
	});
</script>
@endsection