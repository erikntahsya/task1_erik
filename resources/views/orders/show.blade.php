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
    <title>Detail Order 😎</title>
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
        }
        h3 {
            color: #007bff;
            font-weight: 600;
            margin-top: 30px;
        }
        table {
            border-radius: 12px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table th {
            background-color: #6c5ce7;
            color: white;
            font-weight: 600;
        }
        table td {
            text-align: center;
            padding: 12px 15px;
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
        }
        .btn-create:hover {
            background-color: #5a4db0;
            transform: translateY(-5px);
        }
        .btn-custom, .btn-delete {
            padding: 10px 18px;
            font-size: 14px;
            border-radius: 30px;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }
        .btn-custom {
            background-color: #6c5ce7;
            color: white;
        }
        .btn-custom:hover {
            background-color: #5a4db0;
            transform: translateY(-4px);
        }
        .btn-delete {
            background-color: #e74c3c;
            color: white;
        }
        .btn-delete:hover {
            background-color: #c0392b;
            transform: translateY(-4px);
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
        .btn-back {
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 30px;
            color: white;
            background-color: #e74c3c;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        .btn-back:hover {
            background-color: #c0392b;
            transform: translateY(-4px);
        }
        .sidebar {
        width: 250px;
        height: 100%;
        background: linear-gradient(45deg, #6c5ce7, #5a4db0);
        position: fixed;
        top: 0;
        left: -250px;
        transition: all 0.3s ease-in-out;
        z-index: 300000;
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
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #6c5ce7; z-index: auto">
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
        <h3 class="text-white">Menu</h3>
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
    <!-- Tombol Back -->
    <a href="{{ route('orders.index', $order) }}" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali</a>

    <h2>Detail Order</h2>
    <p>Nama Pelanggan: {{ $order->customer_name }}</p>
    <p>Tanggal Order: {{ $order->order_date }}</p>
    <p>Total Harga: {{ $order->total_amount }}</p>

    <h3>Items</h3>
    <div class="table-responsive">
        <table id="itemsTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->subtotal }}</td>
                    <td>
                        <a href="{{ route('order-items.edit', $item) }}" class="btn-custom"><i class="fas fa-edit"></i> Edit</a>                        <form action="{{ route('order-items.destroy', $order) }}" method="POST" class="d-inline" id="deleteForm-{{ $item->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn-delete" onclick="confirmDelete({{ $item->id }})"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h3>Tambah Item</h3>
    <form action="{{ route('order-items.store') }}" method="POST">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order->id }}">

        <div class="mb-3">
            <label for="product_name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="product_name" name="product_name" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <button type="submit" class="btn-create">Tambah Item</button>
    </form>
</div>

<!-- Footer -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#itemsTable').DataTable();

        // Event listener untuk tombol buka sidebar
        document.getElementById('openSidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.add('open');
        });

        // Event listener untuk tombol tutup sidebar
        document.getElementById('closeSidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.remove('open');
        });
    });

    // SweetAlert2 Confirmation for Deleting
    function confirmDelete(itemId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Item ini akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform form submission if confirmed
                document.getElementById('deleteForm-' + itemId).submit();
            }
        });
    }
</script>

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

</body>
</html>
