Sistem Manajemen Item Pesanan




Sistem ini dirancang untuk mengelola pesanan dan item terkaitnya menggunakan Laravel. Berikut adalah panduan lengkap termasuk persyaratan, fitur, instalasi, dan contoh implementasi kode.

Persyaratan
Persyaratan Perangkat Lunak
PHP: Versi 8.0 atau lebih tinggi
Laravel: Versi 10.x
Database: MySQL atau database kompatibel lainnya
Composer: Versi terbaru
front-end (opsional)
Library dan Paket
SweetAlert2: Menyediakan modal dan notifikasi yang interaktif
Bootstrap: Digunakan untuk styling antarmuka pengguna (atau framework CSS lainnya)
Fitur
CRUD Pesanan:

Tambah pesanan baru dengan validasi.
Perbarui data pesanan yang ada.
Hapus pesanan dengan konfirmasi SweetAlert2.
Pencarian dan Paginasi:

Mencari pesanan berdasarkan nama pelanggan.
Menampilkan daftar pesanan dengan paginasi.
Pengelolaan Item Pesanan:

Tambahkan item ke dalam pesanan.
Hitung total pesanan secara otomatis.
Keamanan Data:

Validasi data input.
Menggunakan token CSRF untuk setiap formulir.
Instalasi
Langkah 1: Create project

composer create-project laravel/laravel:^10 order-management
Langkah 2: Instal Dependensi
Jalankan perintah berikut untuk menginstal semua dependensi Laravel:

composer install
npm install
npm run dev
Langkah 3: Konfigurasi Lingkungan
Salin file .env.example ke .env dan sesuaikan konfigurasi database:

env
Copy
Edit
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=order_management
DB_USERNAME=root
DB_PASSWORD=
Langkah 4: Jalankan Migrasi dan Seeder
Migrasikan skema database dan (opsional) isi data awal:

bash
Copy
Edit
php artisan migrate
php artisan db:seed
Langkah 5: Jalankan Server Lokal
Mulai server pengembangan lokal:

bash
Copy
Edit
php artisan serve
Contoh Implementasi
Contoh Controller
Berikut adalah contoh OrderController untuk mengelola pesanan:


<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Menampilkan daftar order dengan paginasi dan pencarian
    public function index(Request $request)
    {
        $search = $request->input('search'); // Input pencarian
        $orders = Order::when($search, function ($query, $search) {
            return $query->where('customer_name', 'like', "%$search%");
        })->paginate(10); // Paginasi 10 data per halaman

        return view('orders.index', compact('orders', 'search'));
    }

    // Menampilkan form untuk membuat order baru
    public function create()
    {
        return view('orders.create');
    }

    // Menyimpan order baru
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'order_date' => 'required|date',
        ]);

        Order::create([
            'customer_name' => $request->customer_name,
            'order_date' => $request->order_date,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order berhasil dibuat.');
    }

    // Menampilkan detail order
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    // Menampilkan form untuk mengedit order
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    // Mengupdate order
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'order_date' => 'required|date',
        ]);

        $order->update([
            'customer_name' => $request->customer_name,
            'order_date' => $request->order_date,
        ]);

        return redirect()->route('orders.index')->with('success', 'Order berhasil diupdate.');
    }

    // Menghapus order
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus.');
    }
}
Contoh Routing
Tambahkan rute berikut ke file routes/web.php:


use App\Http\Controllers\OrderController;
Route::resource('orders', OrderController::class);

Contoh Tampilan (Blade Template)
Form Update Pesanan (resources/views/orders/edit.blade.php):

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


Dukungan
terimakasih mohon maaf banyak kurangnya