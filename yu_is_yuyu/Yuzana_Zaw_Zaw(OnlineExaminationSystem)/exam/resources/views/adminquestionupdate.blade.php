@extends('adminlayout')
@section('admincontent')
<div class="container mt-5">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<h2>
							<font color="#836ea7">Update a question</font>
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
										<form action="/detailsExam/updateQuestion" method="POST">
                                            @csrf
                                            
											@foreach($data as $item)
                                            <input type="hidden" class="form-control" name="questionId" value="{{$item->question_id}}"/>
												<div class="form-group first">
													<label class="form-label" for="questionName">Question name:</label>
													<input type="text" class="form-control" name="questionName" value="{{$item->question_name}}" required/>
												</div>
												<div class="form-group first">
													<label class="form-label" for="points">Points:</label>
													<input type="text" class="form-control" name="points" value="{{$item->points}}" required/>
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