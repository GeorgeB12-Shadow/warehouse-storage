<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers - Storage System</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
        }

        h1 {
            margin-top: 0;
        }

        .button {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f1f5f9;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Customer Management</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('customers.create') }}" class="button">
        + Add Customer
    </a>

    <table>
        <thead>
            <tr>
                <th>Company</th>
                <th>Contact</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Tax ID</th>
            </tr>
        </thead>

        <tbody>
            @forelse($customers as $customer)

                <tr>
                    <td>{{ $customer->company_name }}</td>
                    <td>{{ $customer->contact_name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->tax_id }}</td>
                </tr>

            @empty

                <tr>
                    <td colspan="5">
                        No customers found.
                    </td>
                </tr>

            @endforelse
        </tbody>
    </table>

</div>

</body>
</html>
