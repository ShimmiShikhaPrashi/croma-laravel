@extends('backendUtils.master')
@section('content')

  <style>
    body {
    font-family: Arial, Helvetica, sans-serif;
    }

    /* The Modal (background) */
    .modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 45%;
    }

    /* The Close Button */
    .close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    }

    .close:hover,
    .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    }
  </style>
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Add Details</h4>
        <div class="ms-auto text-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            Library
          </li>
          </ol>
        </nav>
        </div>
      </div>
      </div>
    </div>


    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
      <!-- ============================================================== -->
      <!-- Start Page Content -->
      <!-- ============================================================== -->
      <div class="row">

      <div class="col-12">
        @if ($errors->any())
      <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
      </ul>
      </div>
      @endif
        <div class="container">

        <form method="post" action="/addBanner" enctype="multipart/form-data">
          @csrf
          <label for="title">Title</label><br>
          <input type="text" id="title" name="title"><br>
          <label for="desc">Description</label><br>
          <input type="text" id="description" name="description"><br><br>
          <label for="img">Image</label><br>
          <input type="file" id="image" name="image">
          <label for="">Video</label><br>
          <input type="file" name="video" id="video">
          <input type="submit" value="Submit">
        </form>
        <!-- <form method="post" action="/addBanner" enctype="multipart/form-data">
      @csrf
       <div class="form-row">
      <div class="form-group" col-md-6>
      <label for="title">Title</label>
      <input type="title" class="form-control" id="title" aria-describedby="titleHelp"
      placeholder="Enter title">
      </div>
      <div class="form-group" col-md-6>
      <label for="description">Description</label>
      <input type="description" class="form-control" id="description" aria-describedby="descriptionHelp"
      placeholder="Enter description">
      </div>
      <div class="form-group" col-md-6>
      <label for="image">Image</label>
      <input type="file" id="image" name="image" class="form-control">

      </div>
      <div class="form-group" col-md-6>
      <label for="video">Video</label>
      <input type="file" class="form-control" name="video" id="video">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
       </div>
      </form> -->

        </div>
        <!-- <div>
          <form method="post" action="/addTest">
            @csrf
            <input type="text" name="first_name">
            <input type="text" name="last_name">
            <input type="submit" value="submit">
          </form>
        </div> -->

         <!-- <div class="card-body">
        <h5 class="card-title">Basic Datatable</h5>
        <div class="table-responsive">
          <table id="zero_config" class="table table-striped table-bordered">
          <thead>
            <tr>
            <th>first_name</th>
            <th>last_name</th>
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($crudtest as $val)
            <tr>
            <td>{{ $val->first_name }}</td>
            <td>{{ $val->last_name }}</td>            
            <td>
              <form method="post" action="/deleteTest">
                @csrf
                <button class="btn btn-danger" name="crud_dlt_btn" value="{{ $val->id }}">Delete</button>
              </form>              
              <a href="{{ url('updateTest/'. $val->id) }}" class="btn btn-success" target="_blank" value="{{ $val->id }}" name="update_btn">Update</a>
            </td>

          </tr>
            @endforeach          
          </tbody>
          </table>
        </div> -->
        </div>
        <!-- modal start from here  -->

        <div>
        <button type="button" class="btn btn-primary btn-sm" id="myBtn">Open Modal</button>
        </div>




        <div class="card-body">
        <h5 class="card-title">Basic Datatable</h5>
        <div class="table-responsive">
          <table id="zero_config" class="table table-striped table-bordered">
          <thead>
            <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Time</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $val)
        <tr>
        <td>{{ $val->title }}</td>

        <td>{{ $val->description }}</td>
        <!-- <td>{{ $val->image }}</td> -->
        <td>
          <img src="{{ asset(path: 'assets/images/' . $val->image) }}" width="100">
        </td>
        <td>{{ $val->created_at }}</td>
        <td>
          <div>
          <!-- <input type="hidden" name="user_id" value="{{ $val->id }}"> -->
           <!-- <button type="button" class="btn btn-primary btn-sm status-btn" data-id="{{ $val->id }}"
          data-status="1">Active</button>
          <button type="button" class="btn btn-danger btn-sm status-btn" data-id="{{ $val->id }}"
          data-status="2">Deactive</button> -->
          @if($val->status == '1')
          <button type="button" class="btn btn-primary btn-sm status-btn" data-id="{{ $val->id }}"
          data-status="2">Active</button>
          @else
          <button type="button" class="btn btn-danger btn-sm status-btn" data-id="{{ $val->id }}"
          data-status="1">Deactive</button>
          @endif   
          </div>
        </td>
        <td>
          <a href="{{ url('updateBanner/' . $val->id) }}" class="btn btn-primary" target="_blank"
          name="update_btn" value="{{ $val->id }}">Update</a>
          <form method="post" action="/deleteBanner">
          @csrf
          <button class="btn btn-danger" name="dlt_btn" value="{{ $val->id }}">Delete</button>
          </form>
        </td>
        </tr>
        @endforeach
          </tbody>
          </table>
        </div>
        </div>
      </div>
      </div>

    </div>

    <div id="statusModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <span class="close">&times;</span>
      <div class="card">
        <h4>Are you sure want to change the status</h4>
        <form method="post" action="/activeStatus">
        @csrf
        <input type="hidden" name="user_id" id="user_id">
        <input type="hidden" name="status" id="status">
        <button type="submit" class="btn btn-primary btn-sm">Yes</button>
        <button type="button" class="btn btn-danger btn-sm" id="cancelBtn">No</button>
        </form>
      </div>
      </div>

    </div>
    <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
      <span class="close">&times;</span>
      <div class="card">

        <form method="post" action="/addModal" enctype="multipart/form-data">
        @csrf
        <label for="title">Title</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="desc">Description</label><br>
        <input type="text" id="description" name="description"><br><br>
        <label for="img">Image</label><br>
        <input type="file" id="image" name="image">
        <input type="submit" value="Submit">

        </form>
      </div>
      </div>

    </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Page wrapper  -->
  <!-- ============================================================== -->
  </div>

  <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function () {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
    }
  </script>
  <!-- active status  -->
  
  <script>
    var modal = document.getElementById("statusModal");
    var statusInput = document.getElementById("status");
    var userIdInput = document.getElementById("user_id");
    var span = document.getElementsByClassName("close")[0];
    var cancelBtn = document.getElementById("cancelBtn");

    // Handle all Active/Deactive buttons
    var buttons = document.querySelectorAll(".status-btn");
    buttons.forEach(function (btn) {
    btn.addEventListener("click", function () {
      var userId = this.getAttribute("data-id");
      var status = this.getAttribute("data-status");

      userIdInput.value = userId;
      statusInput.value = status;

      modal.style.display = "block";
    });
    });

    // Close modal
    span.onclick = function () {
    modal.style.display = "none";
    }
    cancelBtn.onclick = function () {
    modal.style.display = "none";
    }
    window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
    }
  </script>

<script>

</script>

@endsection