@extends('layouts.appmaster') @section('title', 'Social Network:
Settings') @section('content')
<div
	style="font-size: 13px; background: #fff; padding: 20px 25px; margin: 30px 0; border-radius: 3px; box-shadow: 0 1px 1px rgba(0, 0, 0, .05); width: 70%">
	<div
		style="padding-bottom: 15px; background: #14A3B8; color: #fff; padding: 16px 30px; margin: -20px -25px 10px; border-radius: 3px 3px 0 0;">
		<h2>User Settings</h2>
	</div>
	<form method="POST" action="editUser">
		<input type="hidden" name="_token" value="<?php echo csrf_token()?>" />
		<table style="width: 100%;">
			<tr>
				<td>
					<h5>User Information</h5>
				</td>
			</tr>
			<tr>
				<td>
					<!-- Firstname Name -->
					<div class="form-group">
						<label class="col-md-12 control-label" for="firstName">First Name</label>
						<div class="col-md-12">
							<div class="input-group-prepend">
								<input id="firstName" name="firstName" type="text"
									value="{{session()->get('currentUser')->getFirstName()}}"
									placeholder="First Name" class="form-control input-md">
							</div>
						</div>
					</div>
				</td>
				<td>
					<!--Last Name -->
					<div class="form-group">
						<label class="col-md-12 control-label" for="lastName">Last Name</label>
						<div class="col-md-12">
							<div class="input-group-prepend">
								<input id="lastName" name="lastName" type="text"
									value="{{session()->get('currentUser')->getLastName()}}"
									placeholder="Last Name" class="form-control input-md">
							</div>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<!-- User Name -->
					<div class="form-group">
						<label class="col-md-12 control-label" for="username">Username</label>
						<div class="col-md-12">
							<div class="input-group-prepend">
								<input id="username" name="username" type="text"
									value="{{session()->get('currentUser')->getUsername()}}"
									placeholder="Username" class="form-control input-md">
							</div>
						</div>
					</div>
				</td>
				<td>
					<!-- password -->
					<div class="form-group">
						<label class="col-md-12 control-label" for="password">Password</label>
						<div class="col-md-12">
							<div class="input-group-prepend">
								<input id="password" name="password" type="password"
									value="{{session()->get('currentUser')->getPassword()}}"
									placeholder="Password" class="form-control input-md">
							</div>
						</div>
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<!--Email -->
					<div class="form-group">
						<label class="col-md-12 control-label" for="email">Email Address</label>
						<div class="col-md-12">
							<div class="input-group-prepend">
								<input id="email" name="email" type="text"
									value="{{session()->get('currentUser')->getEmail()}}"
									placeholder="Email Address" class="form-control input-md">
							</div>
						</div>
					</div>
				</td>
				<td>
					<!--Phone Number -->
					<div class="form-group">
						<label class="col-md-12 control-label" for="phoneNumber">Phone Number </label>
						<div class="col-md-12">
							<div class="input-group-prepend">
								<input id="phoneNumber" name="phoneNumber" type="text"
									value="{{session()->get('currentUser')->getPhoneNumber()}}"
									placeholder="Phone number" class="form-control input-md">
							</div>
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