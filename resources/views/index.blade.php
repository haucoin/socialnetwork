@extends('layouts.appmaster')
@section('title', 'Social Network: Index')
@section('content')

<div align="center" style="padding-top: 80px">
    <h2>Welcome to Social Network,</h2>
    <br/>
    <h6>where you can build your profile, search for <br/>jobs, and get connected through groups.</h6>
    
    <br/><br/><br />
    Please select Login or Register to continue:
    <br/><br/>
    <div align="center">
        <table style="padding: 10px;">
        	<tr>
        		<td align="center">
        			<form method= "GET" action= "login">
        				<input type= "submit" value= "Login" class="btn btn-info">
        			</form>
        		</td>
        	</tr>
        	<tr>
        		<td align="center">
        			<form method= "GET" action= "registration">
        				<input type= "submit" value= "Registration" class="btn btn-info">
        			</form>
        		</td>
        	</tr>
    	</table><br/>
	</div>
</div>
@endsection