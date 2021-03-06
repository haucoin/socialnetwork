@extends('layouts.appmaster') 
@section('title', 'Social Network: Education')
@section('content')

<script>
function toggleFieldOfStudy() {
  var x = document.getElementById("degree");
  if (x.value === "GED") {
    document.getElementById("fieldOfStudy").disabled = true;
  } else {
      document.getElementById("fieldOfStudy").disabled = false;
  }
}
</script>

<div
	style="font-size: 13px; background: #fff; padding: 20px 25px; margin: 30px 0; border-radius: 3px; box-shadow: 0 1px 1px rgba(0, 0, 0, .05); width: 70%">
	<div
		style="padding-bottom: 15px; background: #14A3B8; color: #fff; padding: 16px 30px; margin: -20px -25px 10px; border-radius: 3px 3px 0 0;">
		<h2>Education</h2>
	</div>
	<form method="POST" action="createEducation" class="was-validated">
		<input type="hidden" name="_token" value="<?php echo csrf_token()?>" />
		<table style="width: 100%;">
			<tr>
				<td>
					<h5>New Education Information</h5>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="form-group">
						<label class="col-md-12 control-label" for="school">School</label>
						<div class="col-md-12">
							<input id="school" name="school" type="text" placeholder="Enter the School Name" class="form-control input-md" minlength="2" maxlength="100" required="required">
							<div class="invalid-feedback">Valid school required.</div>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group">
						<label class="col-md-12 control-label" for="lastName">Degree</label>
						<div class="col-md-12">
							<select id="degree" name="degree" class="form-control" style="color: grey" required="required" onchange="toggleFieldOfStudy()">
									<option value="">Select a Degree</option>
									<option value="GED">GED</option>
									<option value="Associate">Associate</option>
									<option value="Bachelors">Bachelors</option>
									<option value="Masters">Masters</option>
									<option value="Doctorate">Doctorate</option>
							</select>
							<div class="invalid-feedback">Valid degree required.</div>
						</div>
					</div>
				</td>
				<td>
					<div class="form-group">
						<label class="col-md-12 control-label" for="fieldOfStudy">Field of Study</label>
						<div class="col-md-12">
							<input id="fieldOfStudy" name="fieldOfStudy" type="text" placeholder="Enter the Field of Study" class="form-control input-md" minlength="2" maxlength="100" required="required">
							<div class="invalid-feedback">Valid field of study required.</div>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group">
						<label class="col-md-12 control-label" for="graduationYear">Graduation Year</label>
						<div class="col-md-12">
							<input id="graduationYear" name="graduationYear" type="number" min="1900" max="2030" placeholder="Enter the Graduation Year" class="form-control input-md" required="required">
							<div class="invalid-feedback">Valid graduation year required.</div>
						</div>
					</div>
				</td>
				<td>
					<div class="form-group">
						<label class="col-md-12 control-label" for="gpa">GPA</label>
						<div class="col-md-12">
							<input id="gpa" name="gpa" type="number" min="0" max="5" step="any" placeholder="Enter the GPA" class="form-control input-md" required="required">
							<div class="invalid-feedback">Valid GPA required.</div>
						</div>
					</div>
				</td>
			</tr>

			<tr>
				<td colspan="2" >
					<div align="center">
						<input type="submit" value="Save Changes" class="btn btn-info">				
					</div>
				</td>
			</tr>
		</table>
	</form>
</div>
<br>
@endsection
