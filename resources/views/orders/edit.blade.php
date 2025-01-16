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
    <title>Edit Order</title>
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
    <h2>Edit Order</h2>
    <a href="{{ route('orders.index', $order) }}" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali</a>

    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="customer_name">Nama Pelanggan</label>
            <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name', $order->customer_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="order_date">Tanggal Order</label>
            <input type="date" id="order_date" name="order_date" value="{{ old('order_date', $order->order_date) }}" required>
        </div>

        <button type="submit" class="btn-submit">Simpan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
