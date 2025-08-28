<!DOCTYPE html>
<html>
<head>
    <title>Laravel 12 Excel Upload</title>
</head>
<body>
    <h2>Upload Excel File</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('excel.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
