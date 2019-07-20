@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-text" data-background-color="blue">
                        <h4 class="card-title">Add Rider</h4>
                    </div>
                    <div class="card-content">
                        @if (count($errors))
                            @foreach($errors->all() as $error)
                                <div style="color: #ff0000;">{{ $error }}</div>
                            @endforeach
                        @endif

                        <form id="RegisterValidation" method="post" action="{{action('RidersController@update', $riderUuid)}}">
                            <input type="hidden" name="_method" value="PUT">
                        @csrf
                        	<div class="row">
                                <div class="col-md-6 ">
									<div class="form-group label-floating">
                                        <label class="control-label" id="label_blue">Name <small>*</small></label>
                                        <input type="text" class="form-control" id="fname" name="fname"  required="true" value="{{$rider->fname}}">
                                    </div>
								</div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" id="label_blue">Email <small>*</small></label>
                                        <input type="text" class="form-control" id="email" name="email" required="true" email="true" value="{{$rider->email}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                	<div class="form-group label-floating">
                                        <label class="control-label" id="label_blue">Password <small>*</small></label>
                                        <input type="password" class="form-control" id="password" name="password" autocomplete="new-password" minLength="6" maxlength="10" >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" id="label_blue">Mobile <small>*</small></label>
                                        <input type="text" class="form-control" id="mobileno" name="mobileno" required="true" number="true" minLength="10" maxlength="10" value="{{$rider->phone_no}}">
                                    </div>
                                </div>
							</div>
                            <div class="card-footer text-center">
                                <!-- <button type="button" class="btn btn-rose btn-round btn-fill" onClick="SaveEmp()">Submit</button> -->
                            	<button type="submit" class="btn btn-rose btn-fill">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

<script src="{{ url('assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript">



  /*$(function() {
		$("#RegisterValidation").validate({
			errorPlacement: function(error, element) {
				console.log('adsf');
				$(element).closest('div').addClass('has-error');
	        }
		});

  });*/
	function setFormValidation(id){
		$(id).validate({
			errorPlacement: function(error, element) {
				$(element).closest('div').addClass('has-error');
	        }
		});
	}

	$(document).ready(function(){
		setFormValidation('#RegisterValidation');
	});
	function SaveEmp(){
				console.log('aaaaa');
		setFormValidation('#RegisterValidation');		
	}
</script>

@endsection 