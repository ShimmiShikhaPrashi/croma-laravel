@extends('backendUtils.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

                    </div>
                    <!-- modal start from here  -->

                    <div>
                        <button type="button" class="btn btn-primary btn-sm" id="myBtn">ADD</button>
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
                                        <th>Price</th>
                                        <th>In stock</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Detail Title</th>
                                        <th>Detail Title Has Many</th>
                                        <th>CrudDetailsBelongsTo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($crudData as $val)
                                    <tr>
                                        <td>{{ $val->title }}</td>
                                        <td>{{ $val->description }}</td>
                                        <td>
                                            <img src="{{ asset(path: 'assets/images/' . $val->image) }}" width="100">
                                        </td>
                                        <td>{{ $val->price }}</td>
                                        <td>{{ $val->stock }}</td>
                                        <td>{{ $val->color }}</td>
                                        <td>{{ $val->size }}</td>
                                        <td>{{ $val->crudDetails->title ?? 'no data found'}}</td>
                                        <td>                                           
                                           {{ $val->crudDetailsHasMany->isEmpty() ? 'no data found' : '' }}
                                            <ul>
                                                @foreach($val->crudDetailsHasMany as $detail)
                                                    <li>{{ $detail->title ?? 'Untitled' }}</li>
                                                @endforeach
                                            </ul>
                                        </td>                                     
                                        <td>
                                        <div class="d-flex gap-2">
                                            <form method="post" action="/crudDelete">
                                                @csrf
                                                <button class="btn btn-danger btn-sm" name="crud_dlt_btn" value="{{ $val->id }}" onclick="return confirm('Are you sure you want to delete this product?')"><i class="fa fa-trash"></i></button>
                                            </form>              
                                            <a href="{{ url('crudUpdate/'. $val->id) }}" class="btn btn-success btn-sm" target="_blank" value="{{ $val->id }}" name="update_btn"><i class="fa fa-pencil"></i></a>
                                        </div>
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


        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="card">
                    <div class="card-header">
                    <h4>Add Product</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/addModal" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title" name="title" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" id="description" name="description" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" name="image" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" id="price" name="price" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label for="stock" class="form-label">In Stock</label>
                            <input type="text" id="stock" name="stock" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" id="color" name="color" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label for="size" class="form-label">Size</label>
                            <input type="text" id="size" name="size" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>
    
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

@endsection