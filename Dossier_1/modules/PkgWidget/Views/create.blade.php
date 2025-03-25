<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Widgets</title>
    <style>
        #widgetForm {
            display: none; /* Hide form by default */
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="text-center mb-3">
        <button class="btn btn-success" onclick="toggleForm()">+ New Widget</button>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0" id="widgetForm">
                <div class="card-header bg-success text-white text-center">
                    <h5>Add Widget</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Widget name" required>
                        </div>

                        <div class="mb-3">
                            <label for="method" class="form-label">Method</label>
                            <input type="text" name="method" class="form-control" id="method" placeholder="Method" required>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select name="type" class="form-select" id="type" required>
                                <option value="number">Number</option>
                                <option value="list">List</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="button" class="btn btn-secondary" onclick="toggleForm()">Cancel</button>
                            <button type="submit" class="btn btn-success px-4">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleForm() {
        let form = document.getElementById("widgetForm");
        form.style.display = form.style.display === "none" ? "block" : "none";
    }
</script>

</body>
</html>
