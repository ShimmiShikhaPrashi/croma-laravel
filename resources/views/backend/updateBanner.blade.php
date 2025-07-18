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
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Update Details</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Edit
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid">
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
                        
                        <div class="container mt-3">
                            <form action="/updateGetDataID" method="post" >
                                @csrf
                                <div class="mb-3 mt-3">
                                    <label for="title">Title:</label>
                                    <input type="title" class="form-control" id="title" placeholder="Enter title"
                                        name="title" value="{{ $dataUpdate->title }}">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="description">Description:</label>
                                    <input type="description" class="form-control" id="description"
                                        placeholder="Enter description" name="description" value="{{ $dataUpdate->description }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="image">Image:</label>
                                    <input class="form-control" type="file" id="image" name="image" >
                                    <img src="{{ asset(path: 'assets/images/' . $dataUpdate->image) }}" height="200" width="200">

                                </div>
                                <div class="mb-3">
                                    <label for="video">Video:</label>
                                    <input class="form-control" type="file" id="video" name="video">
                                    <video width="320" height="240" controls>
                                        <source src="{{ asset('assets/video/' . $dataUpdate->video) }}" type="video/mp4">
                                    </video>                                   
                                </div>
                                <button type="submit" class="btn btn-primary" id="update_btn" value="{{ $dataUpdate->id }}"  name="update_btn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection