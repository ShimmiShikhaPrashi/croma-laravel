<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Imports\ProductsImport;

class ExcelUploadController extends Controller
{
     public function index()
    {
        return view('excel-upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls|max:2048'
        ]);

        // Excel::import(new UsersImport, $request->file('file'));
        Excel::import(new ProductsImport, $request->file('file'));


        return back()->with('success', 'Excel file uploaded and data imported successfully.');
    }
}
