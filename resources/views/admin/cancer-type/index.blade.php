@extends('layouts.adminapp')
@section('header')
<link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css') }}">
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
				<h3 class="card-title">{{ trans('cancer_type.list_of_cancer_type')}}</h3>
				<div class="float-right">
					<h3 class="text-info">
						<a href="{{ url('admin/cancer-type/create')}}" class="btn btn-info">{{ trans('cancer_type.add_cancer_type')}}</a>
					</h3>
				</div>
			</div>
		  	<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>{{ trans('labels.sr_no')}}</th>
							<th>{{ trans('cancer_type.name')}}</th>
							<th>{{ trans('labels.actions')}}</th>
						</tr>
				  	</thead>
				  	<tbody>
				  		@if(!empty($objCancerType) && count($objCancerType) > 0)
				  		@foreach($objCancerType as $index => $cancerType)
					  	<tr>
						    <td>{{ $index + 1 }}</td>
						    <td>{{ $cancerType->name ?? '' }}</td>
						    <td class="">
						    	<span class=""><a href="{{ url('admin/cancer-type/' . $cancerType->id. '/edit') }}"  title="Edit" class="btn btn-primary btn-sm">Edit</a></span>
						    	<span class="btn btn-warning btn-sm delete-model" data-id="{{ $cancerType->id }}">Delete</span>
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
	<div class="modal fade comm_popups min_wdth_pop" id="deleteCancerType" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Delete Cancer Type !!</h4>
				</div>
				<div class="modal-body">
					<div class="succes_popups">
						<p>Are you sure you want to delete the cancer type?</p>
						<input type="hidden" value="" id="delete-cancer-type">
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
			    { "bSortable": false },
			],
			"aaSorting": [],
			language: {
		        searchPlaceholder: "Search records"
		    }
		});

		$('body').on('click', '.delete-model', function(e) {
			var id = $(this).data('id');
			$('#deleteCancerType').modal({
				backdrop: 'static',
			    keyboard: false
			});
			$('#delete-cancer-type').val(id);
		});

        $('body').on('click', '.delete-yes', function(e) {
        	id = $('#delete-cancer-type').val();
			delete_url = "{!! url('admin/cancer-type/"+id+"/delete') !!}";
            window.location.replace(delete_url);
        });
	});
</script>
@endsection