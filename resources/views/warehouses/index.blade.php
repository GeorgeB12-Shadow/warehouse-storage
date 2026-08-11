<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Warehouses - Storage System</title>

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

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
        }

        .button {
            background: #2563eb;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;
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
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            background: #dcfce7;
            color: #166534;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Warehouse Management</h1>

        <a href="{{ route('warehouses.create') }}" class="button">
            + Add Warehouse
        </a>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <table>

        <thead>
            <tr>
                <th>Warehouse Name</th>
                <th>Code</th>
                <th>Address</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @forelse($warehouses as $warehouse)

                <tr>
                    <td>
                        {{ $warehouse->name }}
                    </td>

                    <td>
                        {{ $warehouse->code }}
                    </td>

                    <td>
                        {{ $warehouse->address }}
                    </td>

                    <td>
                        <span class="status">
                            {{ $warehouse->status }}
                        </span>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="4">
                        No warehouses found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

</body>
</html>
