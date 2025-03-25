<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Widget</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 40px;
        }

        .card {
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #28a745;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-primary">Edit Widget</h1>
        <a href="{{ route('index') }}" class="btn btn-secondary">Back to List</a>
    </div>

    <div class="card shadow p-4">
        <div class="card-header text-center">
            <h4>Edit Widget</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('update', $widget->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Widget Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $widget->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="method" class="form-label">Method</label>
                    <input type="text" name="method" class="form-control" id="method" value="{{ old('method', $widget->method) }}" required>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select name="type" class="form-select" id="type" required>
                        <option value="basic" {{ $widget->type == 'basic' ? 'selected' : '' }}>Basic</option>
                        <option value="advanced" {{ $widget->type == 'advanced' ? 'selected' : '' }}>Advanced</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success px-4">Update Widget</button>
                    <a href="{{ route('index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
