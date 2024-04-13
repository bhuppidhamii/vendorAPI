<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Signup</title>
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
</head>

<body>
    <div class="box">
        <form action="{{ url('/') }}/vendor" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Enter Vendor Name</label>
            <input type="text" name="name" id="name">
            <br><br>
            <label for="phone">Enter Vendor Phone</label>
            <input type="text" name="phone" id="phone">
            <br><br>
            <label for="email">Enter Vendor email</label>
            <input type="email" name="email" id="email">
            <br><br>
            <label for="store_name">Enter Vendor Store Name</label>
            <input type="text" name="store_name" id="store_name">
            <br><br>
            <label for="address">Enter Vendor Address</label>
            <input type="text" name="address" id="address">
            <br><br>
            <label for="gstin">Enter Vendor GST No</label>
            <input type="text" name="gstin" id="gstin">
            <br><br>
            <label for="storephotos">Upload store photos (1-4) </label>
            <input type="file" name="storephotos[]" id="storephotos" multiple required>
            <br><br>
            <button>Sumit</button>
        </form>
    </div>
</body>

</html>
