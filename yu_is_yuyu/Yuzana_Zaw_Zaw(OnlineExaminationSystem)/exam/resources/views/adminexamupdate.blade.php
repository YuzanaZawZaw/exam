@extends('adminlayout')
@section('admincontent')
<div class="container mt-5">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<h2>
							<font color="#836ea7">Update a new exam</font>
						</h2>
					</div>
				</div>
				<div class="row gutters-sm mt-3">
					<div class="col-md-3 mb-3"></div>
					<div class="col-md-6 mb-3">
						<div class="card">
							<div class="card-body">
								<div class="d-flex flex-column">
									<div class="mt-3">                                    
										<form action="/updateExam" method="POST">
                                            @csrf
                                            <div class="form-group first">
                                            @if(Session::get('userId'))
                                                <input type="hidden" class="form-control" name="userId" value="{{Session::get('userId')}}"/>
                                            @endif                                                
											</div>
											@if(Session::get('exam_id'))
                                                <input type="hidden" class="form-control" name="examId" value="{{Session::get('exam_id')}}"/>
                                            @endif  

											@foreach($data as $item)
												<div class="form-group first">
													<label class="form-label" for="examName">Exam name:</label>
													<input type="text" class="form-control" name="examName" value="{{$item->exam_name}}" required/>
												</div>
												<div class="form-group first">
													<label class="form-label" for="examName">Status:</label>
													<select name="updateStatusId" class="form-select" aria-label="Default select example" required>
														@foreach($status as $statusItem)
															<option value="{{$statusItem->status_id}}" {{$statusItem->status_id == $item->status_id ? 'selected' : '' }}>{{$statusItem['status_name']}}</option>                
														@endforeach													                        
													</select> 
												</div>
											@endforeach
											
											<div class="text-center mt-3">
                                                <input type="submit" name="btnUpdate" value="Update" class="btn btn-outline-info"/>
                                                <input type="submit" name="btnUpdateCancel" value="Cancel" class="btn btn-outline-warning" onclick="this.form.reset();"/>														
											</div>
                                        </form>
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