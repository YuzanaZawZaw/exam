@extends('layout')

@section('content')
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
					    <strong> User Registration</strong>
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
                                        <form action="userRegisterAction" method="POST">
                                            @csrf	
                                            <div class="form-group last mb-3">
                                                <label for="userRole">Role:</label>                                                
                                                <select name="regUserRole" class="form-select" aria-label="Default select example" required>
                                                    <option selected>Open this select menu</option>           
                                                    @foreach($data as $item)
														<option value="{{$item['role_id']}}">{{$item['role_name']}}</option>                
													@endforeach	                             
                                                </select>                                              
                                            </div>	                                          
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <input type="text" name="regFirstName" class="form-control" placeholder="Enter first name">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="regLastName" class="form-control" placeholder="Enter last name">
                                                </div>
                                            </div>		
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="regEmail" placeholder="Enter email" required/>	
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <input type="password" class="form-control" name="regPassword" placeholder="Enter password" required/>		
                                                </div>
                                            </div>		                                           
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="regFatherName" placeholder="Enter father name" required/>		
                                                </div>
                                            </div>	                                   
                                            <div class="row mt-3">
                                                <label class="form-check-label">Gender</label>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-check-label">Female</label>
                                                    <input type="radio" name="regGender" value="Female" class="form-check-input" checked>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-check-label">Male</label>
                                                    <input type="radio" name="regGender" value="Male" class="form-check-input">
                                                </div>
                                            </div>	
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="regNrc" placeholder="Enter nrc number" required/>		
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="regPhone" placeholder="Enter phone number" required/>		
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12">                                                
                                                    <textarea type="text" class="form-control" name="regAddress" placeholder="Enter address" rows="5" required></textarea>	
                                                </div>
                                            </div>
                                            <div class="text-center mt-3">
                                                <input type="submit" name="btnRegister" value="Save" class="btn btn-outline-info"/>
                                                <input type="submit" name="btnRegisterCancel" value="Cancel" class="btn btn-outline-warning" onclick="this.form.reset();"/>														
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