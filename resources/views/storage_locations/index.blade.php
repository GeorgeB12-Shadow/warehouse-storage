<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storage Locations</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        h1 {
            margin-top: 0;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
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
            background: #f8fafc;
        }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            background: #dcfce7;
            color: #166534;
            font-size: 13px;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #777;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="top-bar">
        <h1>Storage Locations</h1>

        <a href="{{ route('storage-locations.create') }}" class="btn">
            + Add Location
        </a>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($locations->count())

        <table>
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Warehouse</th>
                    <th>Zone</th>
                    <th>Rack</th>
                    <th>Location Code</th>
                    <th>Capacity</th>
                    <th>Occupied</th>
                    <th>Unit</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($locations as $location)

                    <tr>
                        <td>
                            {{ $location->project->name ?? '-' }}
                        </td>

                        <td>
                            {{ $location->warehouse }}
                        </td>

                        <td>
                            {{ $location->zone ?? '-' }}
                        </td>

                        <td>
                            {{ $location->rack ?? '-' }}
                        </td>

                        <td>
                            <strong>{{ $location->location_code }}</strong>
                        </td>

                        <td>
                            {{ $location->capacity ?? '0.00' }}
                        </td>

                        <td>
                            {{ $location->occupied ?? '0.00' }}
                        </td>

                        <td>
                            {{ $location->unit }}
                        </td>

                        <td>
                            <span class="status">
                                {{ $location->status }}
                            </span>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>

    @else

        <div class="empty">
            No storage locations found.
        </div>

    @endif

</div>

</body>
</html>
