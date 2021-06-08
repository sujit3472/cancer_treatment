<div class="card-body">
	<div class="form-group">
		<label for="exampleInputEmail1">{{ trans('cancer_type.cancer_type')}}:<span>*</span></label>
		{!! Form::text("name", null, array("class" => "form-control", "id"=>"name", "placeholder" => "", "required" => "required", "maxlength" => "190", "minlength" => "" )) !!}
		{!! $errors->first('name', '<p class="error-block">:message</p>') !!}
	</div>
</div>
  

<!-- /.card-body -->
<div class="card-footer">
	<a href="{{ url('admin/cancer-type')}}" class="waves-effect btn btn-warning">{{ trans('labels.cancel') }}</a>
	<button  class="btn btn-primary" id="btn-submit-cancer-type">{{ trans('labels.submit') }}</button>
</div>