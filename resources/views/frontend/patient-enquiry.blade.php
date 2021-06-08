@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-md-12">
		@include('flash::message')
	</div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> {{ config('app.name', 'Laravel') }} Enquiry</div>

                <div class="card-body">
                  	{!! Form::open(['url' => 'patient-enquiry', 'class' =>'', 'id'=>'create-patient-enquiry-form', 'autocomplete' => 'off', 'files' => true,]) !!}	
                  		<div class="row">
	                       	<div class="col-md-6">
	                       		<div class="form-group">
	                       			<label for="">{{ trans('patient.name')}}:<span>*</span></label>
	                       			{!! Form::text("name", null, array("class" => "form-control", "id"=>"name", "placeholder" => "", "required" => "required", "maxlength" => "190", "minlength" => "" )) !!}
	                       			@error('name')
	                       			    <span class="error-block" role="alert">
	                       			        <strong>{{ $message }}</strong>
	                       			    </span>
	                       			@enderror
	                       		</div>
	                       	</div>
	                       	<div class="col-md-6">
	                       		<div class="form-group">
	                       			<label for="">{{ trans('patient.email')}}:<span>*</span></label>
	                       			{!! Form::email("email", null, array("class" => "form-control", "id"=>"email", "placeholder" => "", "required" => "required", "maxlength" => "190", "minlength" => "" )) !!}
	                       			@error('email')
	                       			    <span class="error-block" role="alert">
	                       			        <strong>{{ $message }}</strong>
	                       			    </span>
	                       			@enderror
	                       		</div>		
	                       	</div>
                       	</div>
                       	<div class="row">
	                       	<div class="col-md-6">
	                       		<div class="form-group">
	                       			<label for="">{{ trans('patient.password')}}:<span>*</span></label>
	                       			
	                       			{{ Form::password('password',array('placeholder'=>'Password','class' => 'form-control', 'id' => 'password', 'minlength' => '6', 'maxlength' => '20')) }}
	                       			@error('password')
	                       			    <span class="error-block" role="alert">
	                       			        <strong>{{ $message }}</strong>
	                       			    </span>
	                       			@enderror
	                       		</div>
	                       	</div>
	                       	<div class="col-md-6">
	                       		<div class="form-group">
	                       			<label for="">{{ trans('patient.contact_number')}}:<span>*</span></label>
	                       			{!! Form::text("contact_number", null, array("class" => "form-control", "id"=>"contact_number", "placeholder" => "", "required" => "required", "maxlength" => "10", "minlength" => "10" )) !!}
	                       			@error('contact_number')
	                       			    <span class="error-block" role="alert">
	                       			        <strong>{{ $message }}</strong>
	                       			    </span>
	                       			@enderror
	                       		</div>
	                       	</div>
						</div> 
                       	<div class="row">
	                       	<div class="col-md-6">
	                       		<div class="form-group">
	                       			<label for="">{{ trans('patient.state')}}:<span>*</span></label>
	                       			{!! Form::text("state", null, array("class" => "form-control", "id"=>"state", "placeholder" => "", "required" => "required", "maxlength" => "190", "minlength" => "" )) !!}
	                       			@error('state')
	                       			    <span class="error-block" role="alert">
	                       			        <strong>{{ $message }}</strong>
	                       			    </span>
	                       			@enderror
	                       		</div>
	                       	</div>
	                       	<div class="col-md-6">
	                       		<div class="form-group">
	                       			<label for="">{{ trans('patient.city')}}:<span>*</span></label>
	                       			{!! Form::text("city", null, array("class" => "form-control", "id"=>"city", "placeholder" => "", "required" => "required", "maxlength" => "190", "minlength" => "" )) !!}
	                       			@error('city')
	                       			    <span class="error-block" role="alert">
	                       			        <strong>{{ $message }}</strong>
	                       			    </span>
	                       			@enderror
	                       		</div>
	                       	</div>
						</div> 
						<div class="row">
	                       	<div class="col-md-6">
	                       		<div class="form-group">
	                       			<label for="">{{ trans('patient.address')}}:<span>*</span></label>
	                       			{!! Form::text("address", null, array("class" => "form-control", "id"=>"address", "placeholder" => "", "required" => "required", "maxlength" => "190", "minlength" => "" )) !!}
	                       			@error('address')
	                       			    <span class="error-block" role="alert">
	                       			        <strong>{{ $message }}</strong>
	                       			    </span>
	                       			@enderror
	                       		</div>
	                       	</div>
	                       	<div class="col-md-6">
	                       		<div class="form-group">
	                       			<label for="">{{ trans('patient.pincode')}}:<span>*</span></label>
	                       			{!! Form::text("pincode", null, array("class" => "form-control", "id"=>"pincode", "placeholder" => "", "required" => "required", "maxlength" => "6", "minlength" => "6" )) !!}
	                       			@error('pincode')
	                       			    <span class="error-block" role="alert">
	                       			        <strong>{{ $message }}</strong>
	                       			    </span>
	                       			@enderror
	                       		</div>
	                       	</div>
						</div>   
						<div class="row">
	                       	<div class="col-md-6">
	                       		<div class="form-group">
	                       			<label for="">{{ trans('patient.type_of_cancer')}}:<span>*</span></label>
	                       			{!! Form::select('cancer_id', ['' => 'Select Specialization for Cancer' ] + $arrCancerType, null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
	                       			   
	                       			@error('cancer_id')
	                       			    <span class="error-block" role="alert">
	                       			        <strong>{{ $message }}</strong>
	                       			    </span>
	                       			@enderror
	                       		</div>
	                       	</div>
	                       	<div class="col-md-6">
	                       		<div class="form-group">
	                       			<label for="">{{ trans('patient.documents')}}:<span>*</span></label><br/>
	                       			{!! Form::file('document_file[]', ['class' => 'form-control document_file', 'multiple', 'id' => '', 'required' => 'required']) !!}
	                       			@error('document_file[]')
	                       			    <span class="error-block" role="alert">
	                       			        <strong>{{ $message }}</strong>
	                       			    </span>
	                       			@enderror
	                       		</div>
	                       	</div>
						</div>   
						<div class="">
							
							<button  class="btn btn-primary" id="btn-submit-enquiry">{{ trans('labels.submit') }}</button>
						</div>		
					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) { 
		$('.error-block, .invalid-feedback').css('color','red');
		$('body').on('keypress', '#pincode, #contact_number', function(event) {
		    if ((event.which != 190) && ( event.which < 46 || event.which > 57 || event.which == 47))
		    	event.preventDefault(); //stop character from entering input
		});
		//form validation 
		$("#create-patient-enquiry-form").validate({
		    errorClass: "text-danger",
		    validClass: "valid-class",
		  	rules : {
		   	    name : {
		   	        required  : true,
		   	    },
		   	    email : {
		   	        required  : true,
		   	    },
		   	    password : {
		   	        required  : true,
		   	    },
		   	    contact_number : {
		   	        required  : true,
		   	    },
		   	    state : {
		   	        required  : true,
		   	    },
		   	    city : {
		   	        required  : true,
		   	    },
		   	    address : {
		   	        required  : true,
		   	    },
		   	    pincode : {
		   	        required  : true,
		   	    },
		   	    cancer_id : {
		   	        required  : true,
		   	    },
		   	    document_file : {
		   	        required  : true,
		   	    },
		   	},
		   	messages : {
		   	    name  : {
		   	        required : "Please enter Full Name",
		   	    },
		   	    email  : {
		   	        required : "Please enter Email Id",
		   	    },
		   	    password : {
		   	        required  : "Please enter Password",
		   	    },
		   	    contact_number : {
		   	        required  : "Please enter Contact Number",
		   	    },
		   	    state : {
		   	        required  : "Please enter State",
		   	    },
		   	    city : {
		   	        required  : "Please enter City",
		   	    },
		   	    address : {
		   	        required  : "Please enter Address",
		   	    },
		   	    pincode : {
		   	        required  : "Please enter PIN Code",
		   	    },
		   	    cancer_id : {
		   	        required  : "Please Select the Cancer Type",
		   	    },
		   	    document_file : {
		   	        required  : "Please attach the documents",
		   	    },
		   	},
		    submitHandler: function(form) {
			    form.submit();
			    $('#btn-submit-enquiry').prop('disabled', true);
		    },
		});
		
		$('body').on('change', '.document_file', function(e) {
		    e.preventDefault();
		    var th     = $(this);
		    var ValidImageTypes = ["image/jpeg", "image/png", "image/jpg", 'application/pdf', 'mp4'];            
		    var a = (th[0].files[0].size);
		  
		    
		    var file = (th[0].files[0].type);

		    if(a > 10000000 || ($.inArray(file, ValidImageTypes) < 0)) {
		        alert('File must be of type jpg,jpeg,png, pdf, mp4 and size should be less than 10 MB.');
		        th.value = '';
		        $('input[type=file]').val("");
		        return false;
		    };
		    
		});
	});
</script>

@endsection
