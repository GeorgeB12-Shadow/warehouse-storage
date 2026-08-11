<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Warehouse - Storage System</title>

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
            margin-top: 16px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 11px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
        }

        textarea {
            min-height: 100px;
        }

        button {
            margin-top: 22px;
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 22px;
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

    <h1>Add Warehouse</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('warehouses.store') }}" method="POST">

        @csrf

        <label>Warehouse Name *</label>

        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            required
        >

        <label>Warehouse Code *</label>

        <input
            type="text"
            name="code"
            value="{{ old('code') }}"
            placeholder="WH-001"
            required
        >

        <label>Address</label>

        <textarea
            name="address"
        >{{ old('address') }}</textarea>

        <label>Description</label>

        <textarea
            name="description"
        >{{ old('description') }}</textarea>

        <label>Status</label>

        <select name="status">

            <option value="active"
                {{ old('status', 'active') === 'active' ? 'selected' : '' }}>
                Active
            </option>

            <option value="inactive"
                {{ old('status') === 'inactive' ? 'selected' : '' }}>
                Inactive
            </option>

        </select>

        <button type="submit">
            Save Warehouse
        </button>

    </form>

    <a
        href="{{ route('warehouses.index') }}"
        class="back"
    >
        ← Back to Warehouses
    </a>

</div>

</body>
</html>
