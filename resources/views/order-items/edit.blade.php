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
    <title>Edit Item Order</title>
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
        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        form label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }
        form input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            transition: border-color 0.3s ease;
        }
        form input:focus {
            border-color: #6c5ce7;
            outline: none;
        }
        .btn-submit {
            font-size: 14px;
            padding: 10px 20px;
            border-radius: 50px;
            color: white;
            background-color: #6c5ce7;
            text-decoration: none;
            text-align: center;
            display: inline-block;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #5a4db0;
            transform: translateY(-5px);
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
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Item Order</h2>
    <a href="{{ route('orders.show', ['order' => $order->id]) }}" class="btn-back">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>    

    <form action="{{ route('order-items.update', $orderItem) }}" method="POST" id="editOrderItemForm">
        @csrf
        @method('PUT')

        <input type="hidden" name="order_id" value="{{ $orderItem->order_id }}">

        <div class="mb-3">
            <label for="product_name">Nama Produk</label>
            <input type="text" id="product_name" name="product_name" value="{{ old('product_name', $orderItem->product_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="quantity">Jumlah</label>
            <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $orderItem->quantity) }}" required>
        </div>

        <div class="mb-3">
            <label for="price">Harga</label>
            <input type="number" id="price" name="price" value="{{ old('price', $orderItem->price) }}" required>
        </div>

        <button type="submit" class="btn-submit">Simpan</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<script>
    document.getElementById("editOrderItemForm").addEventListener("submit", function(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data item order ini akan disimpan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
</script>

</body>
</html>
