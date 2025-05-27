<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kiểm tra mã giảm giá</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f4f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .discount-form {
            background: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        .discount-form h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .discount-form input[type="text"],
        .discount-form input[type="number"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        .discount-form button {
            width: 100%;
            padding: 12px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .discount-form button:hover {
            background: #45a049;
        }

        .message {
            text-align: center;
            margin-top: 10px;
            padding: 10px;
            border-radius: 8px;
            font-weight: bold;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="discount-form">
        <h2>Nhập mã giảm giá</h2>

        @if (session('success'))
            <div class="message succes">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="message error">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('discount.check') }}">
            @csrf
            <input type="text" name="code" placeholder="Nhập mã giảm giá" required>
            <input type="number" name="order_value" placeholder="Giá trị đơn hàng" required>
            <button type="submit">Kiểm tra</button>
        </form>
    </div>
</body>
</html>
