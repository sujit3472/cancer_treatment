<div class="card-body">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="exampleInputText">{{ trans('doctors.name')}}:<span>*</span></label>
				{!! Form::text("name", null, array("class" => "form-control", "id"=>"name", "placeholder" => "", "required" => "required", "maxlength" => "190", "minlength" => "" )) !!}
				{!! $errors->first('name', '<p class="error-block">:message</p>') !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="">{{ trans('doctors.email')}}:<span>*</span></label>
				{!! Form::email("email", null, array("class" => "form-control", "id"=>"email", "placeholder" => "", "required" => "required", "maxlength" => "190", "minlength" => "" )) !!}
				{!! $errors->first('email', '<p class="error-block">:message</p>') !!}
			</div>		
		</div>
	</div>
	<div class="row">
		<div class='col-md-6'>
			<div class="form-group ">
			    <label>{{ trans('doctors.specialization_for_cancer') }}:<span>*</span></label>
			   
				{!! Form::select('cancer_spacialization_id', ['' => 'Select Specialization for Cancer' ] + $arrCancerType, null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
			    {!! $errors->first('cancer_spacialization_id', '<p class="error-block">:message</p>') !!}
			</div>
		</div>
		
	</div>
</div>
  

<!-- /.card-body -->
<div class="card-footer">
	<a href="{{ url('admin/doctors')}}" class="waves-effect btn btn-warning">{{ trans('labels.cancel') }}</a>
	<button  class="btn btn-primary" id="btn-submit-doctor">{{ trans('labels.submit') }}</button>
</div>