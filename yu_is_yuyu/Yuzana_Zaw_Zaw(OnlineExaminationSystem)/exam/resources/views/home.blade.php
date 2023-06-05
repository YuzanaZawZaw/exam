@extends('layout')

@section('content')
@if(Session::get('accSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	{{Session::get('accSuccess')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(Session::get('duplicate'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
	{{Session::get('duplicate')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container mt-5">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
                    <h3 align="center">
					    Login to <strong> Examination System</strong>
				    </h3>
					</div>
				</div>
				<div class="row gutters-sm mt-3">
					<div class="col-md-3 mb-3"></div>
					<div class="col-md-6 mb-3">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-column">
									<div class="mt-3">                                    
                                        <form action="userLoginAction" method="POST">	
											@csrf
                                            <div class="form-group last mb-3">
                                                <label for="role">Role:</label>
                                                <select name="loginUserRole" class="form-select" aria-label="Default select example" required>
                                                    <option selected>Open this select menu</option>
													@foreach($data as $item)
														<option value="{{$item['role_id']}}">{{$item['role_name']}}</option>                
													@endforeach													                        
                                                </select> 
                                            </div>						
                                            <div class="form-group first">
                                                <label class="form-label" for="email">Email:</label>
                                                <input type="text" class="form-control" name="loginEmail" placeholder="Enter email..." required/>					
                                            </div>
                                            <div class="form-group last mb-3">
                                                <label for="password">Password:</label>
                                                <input type="password" class="form-control" name="loginPassword" placeholder="Enter password..." required/>	
                                            </div>
                                            <div class="text-center mt-3">
                                                <input type="submit" name="btnLogin" value="Save" class="btn btn-outline-info"/>
                                                <input type="submit" name="btnLoginCancel" value="Cancel" class="btn btn-outline-warning" onclick="this.form.reset();"/>														
                                            </div>
                                        <form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>
@stop