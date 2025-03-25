<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Widgets List</title>
</head>

<body>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-primary">Widgets List</h1>
        <!-- This button will now trigger the Create Widget Modal -->
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createWidgetModal">+ New Widget</button>
    </div>

    <!-- Add Widget Form (Create Widget Modal) -->
    <div class="modal fade" id="createWidgetModal" tabindex="-1" aria-labelledby="createWidgetModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="createWidgetModalLabel">Create New Widget</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="createName" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="createName" required>
                        </div>
                        <div class="mb-3">
                            <label for="createMethod" class="form-label">Method</label>
                            <input type="text" name="method" class="form-control" id="createMethod" required>
                        </div>
                        <div class="mb-3">
                            <label for="createType" class="form-label">Type</label>
                            <select name="type" class="form-select" id="createType" required>
                                <option value="number">Number</option>
                                <option value="list">List</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success px-4">Create</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Widget List -->
    <div class="card shadow p-3 mt-3">
        <table class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Method</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($widgets as $widget)
                <tr>
                    <td class="text-center">{{ $widget->id }}</td>
                    <td>{{ $widget->name }}</td>
                    <td class="text-center">{{ $widget->method }}</td>
                    <td class="text-center">{{ $widget->type }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            <button class="btn btn-info" onclick="openShowModal('{{ $widget->name }}', '{{ $widget->method }}', '{{ $widget->type }}')">Show</button>
                            <button class="btn btn-default" onclick="openEditModal({{ $widget->id }}, '{{ $widget->name }}', '{{ $widget->method }}', '{{ $widget->type }}')">Edit</button>
                            <form action="{{ route('destroy', $widget->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap Show Modal -->
<div class="modal fade" id="showWidgetModal" tabindex="-1" aria-labelledby="showWidgetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="showWidgetModalLabel">Widget Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 id="showName" class="fw-bold"></h4>
                <p class="mt-2"><strong>Method:</strong> <span id="showMethod"></span></p>
                <p><strong>Type:</strong> <span id="showType"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Edit Modal -->
<div class="modal fade" id="editWidgetModal" tabindex="-1" aria-labelledby="editWidgetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="editWidgetModalLabel">Edit Widget</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editWidgetForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="editName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editMethod" class="form-label">Method</label>
                        <input type="text" name="method" class="form-control" id="editMethod" required>
                    </div>
                    <div class="mb-3">
                        <label for="editType" class="form-label">Type</label>
                        <select name="type" class="form-select" id="editType" required>
                            <option value="number">Number</option>
                            <option value="list">List</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning px-4">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function openShowModal(name, method, type) {
        document.getElementById('showName').innerText = name;
        document.getElementById('showMethod').innerText = method;
        document.getElementById('showType').innerText = type;

        var showModal = new bootstrap.Modal(document.getElementById('showWidgetModal'));
        showModal.show();
    }

    function openEditModal(id, name, method, type) {
        document.getElementById('editName').value = name;
        document.getElementById('editMethod').value = method;
        document.getElementById('editType').value = type;
        document.getElementById('editWidgetForm').action = "/widgets/" + id;

        var editModal = new bootstrap.Modal(document.getElementById('editWidgetModal'));
        editModal.show();
    }
</script>

</body>
</html>
