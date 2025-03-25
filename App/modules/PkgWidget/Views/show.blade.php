<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
<div class="container my-5">
    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="display-4 font-weight-bold text-dark">widget details</h1>
    </div>

    <div class="card shadow-lg border-0 mb-5">
        <div class="card-body">
            <h2 class="h3 font-weight-semibold text-dark">{{ $widget->name }}</h2>

            <div class="mt-4 text-muted">
                <p>
                  <span class="font-weight-medium">{{ $widget->method }}</span>
                </p>
            </div>

            <div class="mt-4 text-sm text-muted">
                <p>Type:
                        <span class="font-weight-semibold text-dark">{{ $widget->type }}</span>
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="mt-5 d-flex justify-content-between">
                <form action="{{ route('index') }}" method="GET">
                    <button type="submit" class="btn btn-secondary">Retour</button>
                </form>

                <div>
                    <form action="{{ route('edit', $widget->id) }}" method="GET" class="d-inline">
                        <button type="submit" class="btn btn-primary">edit</button>
                    </form>

                    <form action="{{ route('destroy', $widget->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>