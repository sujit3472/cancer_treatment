@extends('layouts.adminapp')
@section('header')

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
				<h3 class="card-title">{{ trans('patient_enquiry.details_of_patient_enquiry')}}</h3>
				<div class="float-right">
					<h3 class="text-info">
						<a href="{{ url('doctor/patient-enquiry')}}" class="btn btn-info">{{ trans('labels.back')}}</a>
					</h3>
				</div>
			</div>
		  	<!-- /.card-header -->
			<div class="card-body">
				<div class="row">
					<div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
			        	{!! Form::open(['url' => 'doctor/plan-genration', 'class' =>'', 'id'=>'plan-genration-form', 'autocomplete' => 'off']) !!}	
			        	{{ Form::hidden('patient_enquiry_id', $objPatientEnquiry->id) }}
				    	<div class="row">
					    	<div class="col-12">
					        	<h4>{{ trans('patient_enquiry.plan_generation')}}</h4>
					        		<textarea name="description">{!! $objPatientEnquiry->fn_patient_enquiry_plan_genration_details->description ?? '' !!}</textarea>
					        	
							</div>
					    </div>
					    <div class="card-footer">
					    	<a href="{{ url('doctor/patient-enquiry')}}" class="waves-effect btn btn-warning">{{ trans('labels.cancel') }}</a>
					    	<button  class="btn btn-primary" id="btn-submit-cancer-type">{{ trans('labels.submit') }}</button>
					    </div>
					    {!! Form::close() !!}
				  	</div>


				  	<div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
				    	<h5 class="mt-2 text-muted">{{ trans('patient_enquiry.document_uploaded')}}</h5>
						<ul class="list-unstyled">
							@if(!empty($objPatientEnquiry->fn_patient_enquiry_document) && count($objPatientEnquiry->fn_patient_enquiry_document) > 0)
							@foreach($objPatientEnquiry->fn_patient_enquiry_document as $index => $patientDocument)
							<li>
								<a href="{{asset('storage/upload-document/'.$patientDocument->document_name )}}" class="btn-link text-secondary" target="_blank">{{ $index + 1 }}. {{$patientDocument->document_name ?? '' }}</a>
							</li>
							@endforeach
							@else
								<li class="mt-2 text-muted">{{ trans('patient_enquiry.no_document_found')}}</li>
							@endif
						</ul>
				    	<h5 class="mt-2 text-muted">{{ trans('patient_enquiry.plan_generation_doc')}}</h5>
						<ul class="list-unstyled">

							@if(!empty($objPatientEnquiry->fn_patient_enquiry_plan_genration_details->file_name) && count($objPatientEnquiry->fn_patient_enquiry_plan_genration_details->file_name) > 0)
							@foreach( array_reverse( $objPatientEnquiry->fn_patient_enquiry_plan_genration_details->file_name) as $index => $planDocument)
							<li>
								<a href="{{asset('storage/plan-document/'.$planDocument )}}" class="btn-link text-secondary" target="_blank">{{ $index + 1 }}. {{$planDocument ?? '' }}</a>
							</li>
							@endforeach
							@else
								<li class="mt-2 text-muted">{{ trans('patient_enquiry.no_document_found')}}</li>
							@endif
						</ul>
				    </div>
				    

				</div>
			</div>
		  	<!-- /.card-body -->
		</div>
	</div>
	
</section>

@endsection
@section('footer')
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) { 
		CKEDITOR.replace( 'description' );
	});
</script>
@endsection