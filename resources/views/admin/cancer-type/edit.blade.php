@extends('layouts.adminapp')
@section('header')

@endsection
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">{{ trans('cancer_type.manage_cancer_type')}}</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
			
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<section class="content">
	<div class="container-fluid">
		<div class="card ">
			<div class="card-header">
				<h3 class="card-title">{{ trans('cancer_type.edit_cancer_type')}}</h3>
				<div class="float-right">
					<h3 class="text-info">
						<a href="{{ url('admin/cancer-type')}}" class="btn btn-info">{{ trans('labels.back')}}</a>
					</h3>
				</div>
			</div>
		  	<!-- /.card-header -->
		  	<!-- form start -->
			{!! Form::model($objCancerType, ['method' => 'PATCH', 'url' => ['/admin/cancer-type', $objCancerType->id], 'class' => '', 'files' => true , 'id' => 'edit-cancer-type-form']) !!}
				@include ('admin.cancer-type.form')
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
		$("#edit-cancer-type-form").validate({
		    errorClass: "text-danger",
		    validClass: "valid-class",
		  	rules : {
		   	    name : {
		   	        required  : true,
		   	    }
		   	},
		   	messages : {
		   	    name  : {
		   	        required : "Please enter Cancer Type",
		   	    }
		   	},
		    submitHandler: function(form) {
			    form.submit();
			    $('#btn-submit-cancer-type').prop('disabled', true);
		    },
		});
		
	});
</script>
@endsection