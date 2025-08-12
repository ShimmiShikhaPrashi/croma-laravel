@extends('backendUtils.master')
@section('content')

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body{
color: #9b9ca1;
}
.bg-secondary-soft {
    background-color: rgba(208, 212, 217, 0.1) !important;
}
.rounded {
    border-radius: 5px !important;
}
.py-5 {
    padding-top: 3rem !important;
    padding-bottom: 3rem !important;
}
.px-4 {
    padding-right: 1.5rem !important;
    padding-left: 1.5rem !important;
}
.file-upload .square {
    height: 250px;
    width: 250px;
    margin: auto;
    vertical-align: middle;
    border: 1px solid #e5dfe4;
    background-color: #fff;
    border-radius: 5px;
}
.text-secondary {
    --bs-text-opacity: 1;
    color: rgba(208, 212, 217, 0.5) !important;
}
.btn-success-soft {
    color: #28a745;
    background-color: rgba(40, 167, 69, 0.1);
}
.btn-danger-soft {
    color: #dc3545;
    background-color: rgba(220, 53, 69, 0.1);
}
.form-control {
    display: block;
    width: 100%;
    padding: 0.5rem 1rem;
    font-size: 0.9375rem;
    font-weight: 400;
    line-height: 1.6;
    color: #29292e;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #e5dfe4;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 5px;
    -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}
.img-fit {
  width: 100%;
  height: 100%;
  object-fit: cover; /* Crop to fit while preserving aspect ratio */
  object-position: center; /* Center the image */
  display: block;
  border-style: solid
}
</style>
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

<div class="container">
<div class="row">
		<div class="col-12">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>            
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
			<!-- Page title -->
			<div class="my-4">
				<h3>My Profile</h3>
				<hr>
			</div>
			<!-- Form START -->
			<form class="file-upload"  method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

				<div class="row gx-5">
					<!-- Contact detail -->
					<div class="col-xxl-8  mb-xxl-0">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Contact detail</h4>
								<!-- First Name -->
								<div class="col-md-6">
									<label class="form-label">Name</label>
									<input type="text" class="form-control" name="name" value="{{ $user->name }}">
								</div>
                                <div class="col-md-6">
									<label class="form-label">Role</label>
									<input type="text" class="form-control" name="role" value="{{ $user->role }}" disabled>
								</div>		

                                <!-- Email -->
								<div class="col-md-6">
									<label for="inputEmail4" class="form-label">Email</label>
									<input type="email" class="form-control" name="email" value={{ $user->email }}>
								</div>						
								
							</div> <!-- Row END -->
						</div>
					</div>
					<!-- Upload profile -->
					<div class="col-xxl-4">
						<div class="bg-secondary-soft px-4 rounded">
							<div class="row g-3">
								<h4 class="mb-4 mt-0">Upload your profile photo</h4>
								<div class="text-center">
									<!-- Image upload -->
									<div class="square position-relative display-2 mb-3">
                                          <img src="https://www.w3schools.com/w3images/team2.jpg" alt="John" style="width:100%" class="img-fit">
									</div>
									<!-- Button -->
									<input type="file" id="customFile" name="file" hidden="">
									<!-- <label class="btn btn-success-soft btn-block" for="customFile">Upload</label> -->
                                    <button type="button" class="btn btn-success-soft">Upload</button>
									<button type="button" class="btn btn-danger-soft">Remove</button>
									<!-- Content -->
									<p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Minimum size 300px x 300px</p>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- Row END -->
                <div class="row g-3 mb-4 " >
                    <h4 class="mb-4 mt-0">Change Password</h4>

                    <!-- Old password -->
                    <div class="col-md-6">
                        <label class="form-label">Old Password</label>
                        <input type="password" class="form-control" name="old_password" placeholder="Enter old password">
                    </div>

                    <!-- New password -->
                    <div class="col-md-6">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" name="new_password" placeholder="Enter new password">
                    </div>

                    <!-- Confirm password -->
                    <div class="col-md-12">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" name="new_password_confirmation" placeholder="Confirm new password">
                    </div>
                </div>

				<!-- button -->
				<div class="gap-3 d-md-flex justify-content-md-end text-center">
					<button type="submit" class="btn btn-primary btn-lg">Update profile</button>
                    <button type="button" class="btn btn-danger btn-lg" disabled>Delete profile</button>

				</div>
			</form> <!-- Form END -->
		</div>
	</div>
	</div>

</body>
</html>
@endsection