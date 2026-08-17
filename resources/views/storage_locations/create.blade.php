<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Storage Location</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }

        input,
        select,
        textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 11px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 15px;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .required {
            color: #dc2626;
        }

        .btn {
            border: none;
            background: #2563eb;
            color: white;
            padding: 11px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
        }

        .back {
            display: inline-block;
            margin-left: 12px;
            color: #374151;
            text-decoration: none;
        }

        .errors {
            background: #fee2e2;
            color: #991b1b;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .errors ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add Storage Location</h1>

    @if($errors->any())
        <div class="errors">
            <strong>Please check the following:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('storage-locations.store') }}">

        @csrf

        <div class="form-group">
            <label>Project <span class="required">*</span></label>

            <select name="project_id" required>
                <option value="">-- Select Project --</option>

                @foreach($projects as $project)
                    <option
                        value="{{ $project->id }}"
                        {{ old('project_id') == $project->id ? 'selected' : '' }}
                    >
                        {{ $project->project_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Warehouse <span class="required">*</span></label>

            <input
                type="text"
                name="warehouse"
                value="{{ old('warehouse') }}"
                placeholder="Example: WH-01"
                required
            >
        </div>

        <div class="form-group">
            <label>Zone</label>

            <input
                type="text"
                name="zone"
                value="{{ old('zone') }}"
                placeholder="Example: A"
            >
        </div>

        <div class="form-group">
            <label>Rack</label>

            <input
                type="text"
                name="rack"
                value="{{ old('rack') }}"
                placeholder="Example: R01"
            >
        </div>

        <div class="form-group">
            <label>Location Code <span class="required">*</span></label>

            <input
                type="text"
                name="location_code"
                value="{{ old('location_code') }}"
                placeholder="Example: A-R01-01"
                required
            >
        </div>

        <div class="form-group">
            <label>Capacity</label>

            <input
                type="number"
                name="capacity"
                value="{{ old('capacity') }}"
                step="0.01"
                min="0"
            >
        </div>

        <div class="form-group">
            <label>Occupied</label>

            <input
                type="number"
                name="occupied"
                value="{{ old('occupied', 0) }}"
                step="0.01"
                min="0"
            >
        </div>

        <div class="form-group">
            <label>Unit <span class="required">*</span></label>

            <select name="unit" required>
                <option value="sqm">sqm</option>
                <option value="pallet">pallet</option>
                <option value="box">box</option>
                <option value="unit">unit</option>
            </select>
        </div>

        <div class="form-group">
            <label>Status <span class="required">*</span></label>

            <select name="status" required>
                <option value="available">Available</option>
                <option value="occupied">Occupied</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <label>Notes</label>

            <textarea name="notes"></textarea>
        </div>

        <button type="submit" class="btn">
            Save Location
        </button>

        <a href="{{ route('storage-locations.index') }}" class="back">
            ← Back to Storage Locations
        </a>

    </form>

</div>

</body>
</html>
