<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Customer - Storage System</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
        }

        button {
            margin-top: 20px;
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #555;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add Customer</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customers.store') }}" method="POST">

        @csrf

        <label>Company Name *</label>
        <input
            type="text"
            name="company_name"
            value="{{ old('company_name') }}"
            required
        >

        <label>Contact Name</label>
        <input
            type="text"
            name="contact_name"
            value="{{ old('contact_name') }}"
        >

        <label>Phone</label>
        <input
            type="text"
            name="phone"
            value="{{ old('phone') }}"
        >

        <label>Email</label>
        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
        >

        <label>Tax ID</label>
        <input
            type="text"
            name="tax_id"
            value="{{ old('tax_id') }}"
        >

        <label>Address</label>
        <textarea name="address">{{ old('address') }}</textarea>

        <button type="submit">
            Save Customer
        </button>

    </form>

    <a class="back" href="{{ route('customers.index') }}">
        ← Back to Customers
    </a>

</div>

</body>
</html>
