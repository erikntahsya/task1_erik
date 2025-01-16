<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <title>Orders List 😎</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fc;
            color: #333;
        }
        .container {
            margin-top: 60px;
        }
        h2 {
            font-family: 'Roboto', sans-serif;
            color: #4a4a4a;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
        }
        h2:hover {
            transform: translateY(-5px);
            color: #6c5ce7;
        }
        .title {
            color: #007bff;
            text-transform: uppercase;
            font-weight: 700;
        }
        table {
            border-radius: 12px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }
        table:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            transform: translateY(-4px);
        }
        th, td {
            text-align: center;
            padding: 12px 15px;
        }
        th {
            background-color: #6c5ce7;
            color: white;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        th:hover {
            background-color: #5a4db0;
        }
        td {
            font-size: 14px;
        }
        .btn-create {
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 50px;
            color: white;
            background-color: #6c5ce7;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        .btn-create:hover {
            background-color: #5a4db0;
            transform: translateY(-4px);
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .btn-custom, .btn-delete {
            padding: 10px 18px;
            font-size: 14px;
            border-radius: 30px;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            font-weight: 600;
        }
        .btn-custom {
            background-color: #6c5ce7;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #5a4db0;
            transform: translateY(-4px);
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .btn-delete {
            background-color: #e74c3c;
            color: white;
            border: none;
        }
        .btn-delete:hover {
            background-color: #c0392b;
            transform: translateY(-4px);
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .table-responsive {
            margin-top: 30px;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 6px 12px;
            font-size: 14px;
            color: #6c5ce7;
            border-radius: 30px;
            transition: background-color 0.3s ease;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #6c5ce7;
            color: white;
        }
        .emoji {
            font-size: 24px;
            color: #6c5ce7;
        }
        .card {
            background-color: #fff;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-4px);
        }
        .card-header {
            background-color: #6c5ce7;
            color: white;
            font-weight: 600;
            border-radius: 15px;
            padding: 15px;
            transition: background-color 0.3s ease;
        }
        .card-header:hover {
            background-color: #5a4db0;
        }
        /* Additional Styles */
        .card-header {
            background: linear-gradient(45deg, #6c5ce7, #5a4db0);
        }

        table th {
            background: linear-gradient(45deg, #6c5ce7, #5a4db0);
        }

        tbody tr:hover {
            background-color: #f0f0f0;
        }

        .table-responsive table tbody td {
            border-bottom: 1px solid #e5e5e5;
        }

        .dataTables_wrapper .dataTables_info {
            font-size: 14px;
            color: #333;
        }

        .dataTables_wrapper .dataTables_filter input {
            font-size: 14px;
            padding: 5px;
            border-radius: 5px;
        }

        /* Hover Animations */
        .btn-custom, .btn-delete {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
        }

        .btn-custom:hover, .btn-delete:hover {
            transform: translateY(-5px);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.15);
        }

        footer {
            background-color: #6c5ce7;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 14px;
        }
        .sidebar {
        width: 250px;
        height: 100%;
        background: linear-gradient(45deg, #6c5ce7, #5a4db0);
        position: fixed;
        top: 0;
        left: -250px;
        transition: all 0.3s ease-in-out;
        z-index: 1000;
        color: white;
        padding: 15px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
    }
    .sidebar.open {
        left: 0;
    }
    .sidebar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .close-btn {
        background: none;
        border: none;
        color: white;
        font-size: 20px;
        cursor: pointer;
    }
    .sidebar-menu {
        list-style: none;
        padding: 0;
        margin-top: 20px;
    }
    .sidebar-menu li {
        margin-bottom: 15px;
    }
    .sidebar-menu li a {
        color: white;
        text-decoration: none;
        font-size: 16px;
        font-weight: 600;
        transition: color 0.3s ease-in-out;
    }
    .sidebar-menu li a:hover {
        color: #f0f0f0;
    }
    .btn-open {
        position: fixed;
        top: 20px;
        left: 20px;
        background-color: #6c5ce7;
        color: white;
        border: none;
        font-size: 20px;
        cursor: pointer;
        padding: 10px 15px;
        border-radius: 50%;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
    }
    .btn-open:hover {
        background-color: #5a4db0;
    }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6c5ce7;">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('orders.index') }}">Orders List</a>
            </li>
        </ul>
    </div>
</nav>
<div id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <h3>Menu</h3>
        <button id="closeSidebar" class="close-btn">&times;</button>
    </div>
    <ul class="sidebar-menu">
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Orders</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Customers</a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="#">Settings</a></li>
    </ul>
</div>
<button id="openSidebar" class="btn-open">☰</button>

<div class="container">
    <div class="card">
        <h2>Daftar Orders</h2>

        @if(session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
        <div class="mb-3 text-end">
            <a href="{{ route('orders.create') }}" class="btn btn-create"><i class="fas fa-plus-circle"></i> Tambah Order</a>
        </div>
        <div class="table-responsive">
            <table id="ordersTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-dark">Nama Pelanggan <i class="fas fa-user"></i></th>
                        <th class="text-dark">Tanggal Order <i class="fas fa-calendar-alt"></i></th>
                        <th class="text-dark">Aksi <i class="fas fa-cogs"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order) }}" class="btn-custom"><i class="fas fa-eye"></i> Detail</a>
                            <a href="{{ route('orders.edit', $order) }}" class="btn-custom"><i class="fas fa-edit"></i> Edit</a>
                            <form id="deleteForm-{{ $order->id }}" action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn-delete" onclick="confirmDelete({{ $order->id }})"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2025 Order Management System. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    
    $(document).ready(function() {
        $('#ordersTable').DataTable();
    });

    
    function confirmDelete(orderId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Order ini akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim form penghapusan jika dikonfirmasi
                document.getElementById('deleteForm-' + orderId).submit();
            }
        });
    }

    // Event listener untuk membuka dan menutup sidebar
    document.getElementById('openSidebar').addEventListener('click', function() {
        document.getElementById('sidebar').classList.add('open');
    });

    document.getElementById('closeSidebar').addEventListener('click', function() {
        document.getElementById('sidebar').classList.remove('open');
    });
</script>

</body>
</html>
