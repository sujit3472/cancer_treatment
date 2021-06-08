@extends('layouts.adminapp')
@section('header')
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css') }}">
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
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">{{ trans('doctors.list_of_doctors')}}</h3>
				<div class="float-right">
					<h3 class="text-info">
						<a href="{{ url('admin/doctors/create')}}" class="btn btn-info">{{ trans('doctors.add_doctors')}}</a>
					</h3>
				</div>
			</div>
		  	<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>{{ trans('labels.sr_no')}}</th>
							<th>{{ trans('doctors.name')}}</th>
							<th>{{ trans('doctors.email')}}</th>
							<th>{{ trans('doctors.specialization_for_cancer')}}</th>
							<th>{{ trans('labels.actions')}}</th>
						</tr>
				  	</thead>
				  	<tbody>
				  		@if(!empty($objDoctors) && count($objDoctors) > 0)
				  		@foreach($objDoctors as $index => $doctor)
				  		
					  	<tr>
						    <td>{{ $index + 1 }}</td>
						    <td>{{ $doctor->name ?? '' }}</td>
						    <td>{{ $doctor->email ?? '' }}</td>
						    <td>{{ $doctor->fn_cancer_data->name ?? '' }}</td>
						    <td class="">
						    	<span class=""><a href="{{ url('admin/doctors/' . $doctor->id. '/edit') }}"  title="Edit" class="btn btn-primary btn-sm">Edit</a></span>
						    	<span class="btn btn-warning btn-sm delete-model" data-id="{{ $doctor->id }}">Delete</span>
						    </td>
						</tr>
						@endforeach
					  	@else 
					  	<tr>
					  		<td colspan="4" class="text-center"> {{ trans('labels.no_records')}}</td>
					  	</tr>
					  	@endif
				  	</tbody>
				</table>
			</div>
		  	<!-- /.card-body -->
		</div>
	</div>
	<div class="modal fade comm_popups min_wdth_pop" id="deleteDoctor" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Delete Doctor !!</h4>
				</div>
				<div class="modal-body">
					<div class="succes_popups">
						<p>Are you sure you want to delete the doctor?</p>
						<input type="hidden" value="" id="delete-doctor">
					</div>
				</div>
				<div class="modal-footer popups_btn">
					<a href="javascript:void(0)" class="btn btn-primary btn-sm delete-yes" data-dismiss="modal">Yes</a>
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">No</button>
				</div>
			</div>
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
			    { "bSortable": true },
			    { "bSortable": true },
			    { "bSortable": false },
			],
			"aaSorting": [],
			language: {
		        searchPlaceholder: "Search records"
		    }
		});

		$('body').on('click', '.delete-model', function(e) {
			var id = $(this).data('id');
			$('#deleteDoctor').modal({
				backdrop: 'static',
			    keyboard: false
			});
			$('#delete-doctor').val(id);
		});

        $('body').on('click', '.delete-yes', function(e) {
        	id = $('#delete-doctor').val();
			delete_url = "{!! url('admin/doctors/"+id+"/delete') !!}";
            window.location.replace(delete_url);
        });
	});
</script>
@endsection