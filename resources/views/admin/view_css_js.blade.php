<!DOCTYPE html>
<html lang="vi">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        /* Container */
        .container {
            max-width: 400px;
            /* Điều chỉnh kích thước tối đa của container */
            margin: 0 auto;
            /* Canh giữa container */
        }

        /* Breadcrumb */
        .breadcrumb-item a {
            text-decoration: none;
            /* Loại bỏ gạch chân từ đường link breadcrumb */
            color: #6c757d;
            /* Màu chữ cho đường link breadcrumb */
        }

        .breadcrumb-item a:hover {
            text-decoration: underline;
            /* Gạch chân đường link breadcrumb khi di chuột qua */
        }

        /* Search input */
        .form-control {
            border: 1px solid #ced4da;
            /* Viền của ô nhập */
            border-radius: .25rem;
            /* Bo tròn góc của ô nhập */
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            /* Hiệu ứng chuyển đổi khi focus vào ô nhập */
            font-size: 0.85rem;
            /* Kích thước font chữ */
            padding: 0.375rem 0.75rem;
            /* Khoảng cách giữa nội dung và viền của ô nhập */
        }

        .form-control:focus {
            border-color: #007bff;
            /* Màu viền khi ô nhập được focus */
            outline: 0;
            /* Loại bỏ đường viền xung quanh khi focus */
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
            /* Hiệu ứng bóng khi focus vào ô nhập */
        }

        /* Add To Do List button */
        .btn-primary {
            color: #fff;
            /* Màu chữ của nút */
            background-color: #007bff;
            /* Màu nền của nút */
            border-color: #007bff;
            /* Màu viền của nút */
            border-radius: 1.875rem;
            /* Bo tròn góc của nút */
            font-size: 0.85rem;
            /* Kích thước font chữ */
            padding: 0.375rem 0.75rem;
            /* Khoảng cách giữa nội dung và viền của nút */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            /* Màu nền của nút khi di chuột qua */
            border-color: #0056b3;
            /* Màu viền của nút khi di chuột qua */
        }

        /* Table styles */
        .table {
            width: 100%;
            /* Chiều rộng của bảng */
            margin-bottom: 1rem;
            /* Khoảng cách dưới của bảng */
            color: #212529;
            /* Màu chữ trong bảng */
            vertical-align: top;
            /* Canh giữa dọc cho nội dung trong ô */
        }

        .table th,
        .table td {
            padding: 0.75rem;
            /* Khoảng cách giữa nội dung và viền của ô */
            vertical-align: top;
            /* Canh giữa dọc cho nội dung trong ô */
            border-top: 1px solid #dee2e6;
            /* Đường viền trên của ô */
        }

        .table thead th {
            vertical-align: bottom;
            /* Canh giữa dọc cho tiêu đề bảng */
            border-bottom: 2px solid #dee2e6;
            /* Đường viền dưới của tiêu đề bảng */
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
            /* Đường viền giữa các phần tử tbody */
        }

        /* Table header */
        .table-light th {
            background-color: #f8f9fa;
            /* Màu nền của tiêu đề bảng */
            border-color: #dee2e6;
            /* Màu viền của tiêu đề bảng */
            color: #212529;
            /* Màu chữ của tiêu đề bảng */
            vertical-align: bottom;
            /* Canh giữa dọc cho tiêu đề bảng */
        }

        /* Actions buttons */
        .actions-btns a {
            text-decoration: none;
            /* Loại bỏ gạch chân từ đường link */
            color: #007bff;
            /* Màu chữ của đường link */
            margin-right: 5px;
            /* Khoảng cách phải của các đường link */
        }

        .actions-btns a:hover {
            text-decoration: underline;
            /* Gạch chân đường link khi di chuột qua */
        }

        .filter-label-left {
            margin-right: 10px;
            /* Khoảng cách giữa nhãn và select */
            display: inline-block;
            /* Hiển thị nhãn trên cùng một dòng với select */
            width: 150px;
            /* Độ rộng của nhãn */
            text-align: right;
            /* Căn lề phải của nhãn */
        }
    </style>
</head>

<body>
    @yield('noi_dung')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.8/axios.min.js"
        integrity="sha512-PJa3oQSLWRB7wHZ7GQ/g+qyv6r4mbuhmiDb8BjSFZ8NZ2a42oTtAq5n0ucWAwcQDlikAtkub+tPVCw4np27WCg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @yield('js')
</body>

</html>
