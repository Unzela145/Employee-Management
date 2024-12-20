<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>

    <!-- Link to an external CSS for better styling (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Global styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: white;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #28a745;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: inline-block;
        }

        a:hover {
            background-color: #218838;
        }

        /* Table Styling */
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            vertical-align: middle;
        }

        /* Button styling */
        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #c82333;
        }

        /* Action buttons */
        .action-buttons a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }

        .action-buttons a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Employee List</h1>

    <!-- Add Employee button -->
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{ route('employees.create') }}">Add Employee</a>
    </div>

    <!-- Employee Table -->
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->department }}</td>
                    <td class="action-buttons">
                        <!-- Edit and Delete Actions -->
                        <a href="{{ route('employees.edit', $employee->id) }}">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
