@extends('layouts.adminapp')
@section('header')

@endsection
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">{{ trans('doctors.manage_doctors')}}</h1>
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
		<div class="card ">
			<div class="card-header">
				<h3 class="card-title">{{ trans('doctors.edit_doctor')}}</h3>
				<div class="float-right">
					<h3 class="text-info">
						<a href="{{ url('admin/doctors')}}" class="btn btn-info">{{ trans('labels.back')}}</a>
					</h3>
				</div>
			</div>
		  	<!-- /.card-header -->
		  	<!-- form start -->
			{!! Form::model($objDoctor, ['method' => 'PATCH', 'url' => ['/admin/doctors', $objDoctor->id], 'class' => '', 'files' => true , 'id' => 'edit-doctor-form']) !!}
				@include ('admin.doctor.form')
			{!! Form::close() !!}
		</div>
	</div>
</section>

@endsection
@section('footer')
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) { 
		$('.error-block').css('color','red');
		//form validation for manule coupon code creation
		$("#edit-doctor-form").validate({
		    errorClass: "text-danger",
		    validClass: "valid-class",
		  	rules : {
		   	    name : {
		   	        required  : true,
		   	    },
		   	    email : {
		   	        required  : true,
		   	    },
		   	    cancer_spacialization_id : {
		   	    	required : true,
		   	    }
		   	},
		   	messages : {
		   	    name  : {
		   	        required : "Please enter Cancer Type",
		   	    },
		   	    email  : {
		   	        required : "Please enter Email Id",
		   	    },
		   	    cancer_spacialization_id : {
		   	    	required : "Please select the Spacialization for Cancer"
		   	    }
		   	},
		    submitHandler: function(form) {
			    form.submit();
			    $('#btn-submit-doctor').prop('disabled', true);
		    },
		});
		
	});
</script>
@endsection