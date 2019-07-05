@extends('layouts.admin')

@section('content')
	<div class="content">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-md-12">
	                <div class="card">
	                    <div class="card-header card-header-text" data-background-color="blue">
	                        <h4 class="card-title">@lang('users.viewrider')</h4>
	                    </div>
	                    <div class="card-content">
	                    	@if(session()->has('success'))
							    <div class="alert alert-success">
							        {{ session()->get('success') }}
							    </div>
							@endif

							<form>
								<a  href="{{url('/riders/create')}}">
									<button type="button" rel="tooltip" title="Add Rider" class="btn btn-danger btn-fab btn-fab-mini btn-round pull-right">
									<i class="material-icons">add</i>
									</button>
								</a>
                    	<div class="material-datatables">
                        <table id="rider_table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead class="text-center">
								<th>Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Status</th>
								<th>Action</th>
                            </thead>
                        </table>
                		</div>
							</form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>  
	</div>

	<script type="text/javascript">
		
    $(document).ready(function() {
        $('#rider_table').DataTable({
            "processing": true,
            "serverSide": true,
            //"ordering": false,
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"dom": 'Bfrtip',
	        "buttons": [
	            'copy', 'csv', 'excel', 'pdf', 'print'
	        ],
            "ajax": {
                "url": base_url+"/userslist",
                "type": "POST",
                "data": function(d) {
                    d.fromdate = $('#fromdate').val();
                    d.todate = $('#todate').val();
                }
            },
            "columns": [{
	                "data": "name"
	            }, {
	                "data": "email"
	            }, {
	                "data": "mobile"
	            }, {
	                "data": "status"
	            }, {
	                "data": "action"
	            },
           	],
            "order": [
                [0, 'desc']
            ],
            createdRow: function(row, data, index) {
            	//console.log("a",data['status']);
			    $('td', row).eq(4).addClass('td-actions'); // 6 is index of column
			    if ( data['status'] == "" ) {
		    		$(row).css("opacity", "0.2");
			    }
			},
        });
    });


    function deleteRider(uuid){
    	swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Yes, delete it!',
            buttonsStyling: false
        }).then(function() {
          window.location.href = base_url+'/riderdelete/'+uuid;
        }).catch(swal.noop)

    }
    function changeStatus(uuid,status){
    	swal({
            title: 'Are you sure?',
            text: "Do you want to change this rider status!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Yes, delete it!',
            buttonsStyling: false
        }).then(function() {
          window.location.href = base_url+'/changestatus/'+uuid+'/'+status;
        }).catch(swal.noop)

    }

	/*$().ready(function(){
	    
	    $('.test1').click(function(event){
	    	event.preventDefault();
	    	swal({
	            title: 'Are you sure?',
	            text: "You won't be able to revert this!",
	            type: 'warning',
	            showCancelButton: true,
	            confirmButtonClass: 'btn btn-success',
	            cancelButtonClass: 'btn btn-danger',
	            confirmButtonText: 'Yes, delete it!',
	            buttonsStyling: false
	        }).then(function() {
	          
	        }).catch(swal.noop)
		});
	});*/


	</script>



@endsection 