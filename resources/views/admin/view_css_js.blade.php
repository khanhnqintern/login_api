<!DOCTYPE html>
<html lang="vi">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        /* Container */
        .container {
            max-width: 400px;
            /* Adjust the maximum size of the container */
            margin: 0 auto;
            /* Center the container */
        }

        /* Breadcrumb */
        .breadcrumb-item a {
            text-decoration: none;
            /* Remove underline from breadcrumb links */
            color: #6c757d;
            /* Text color for breadcrumb links */
        }

        .breadcrumb-item a:hover {
            text-decoration: underline;
            /* Underline breadcrumb links on hover */
        }

        /* Search input */
        .form-control {
            border: 1px solid #ced4da;
            /* Border of the input field */
            border-radius: .25rem;
            /* Rounded border radius of the input field */
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            /* Transition effect when input field is focused */
            font-size: 0.85rem;
            /* Font size */
            padding: 0.375rem 0.75rem;
            /* Spacing between content and border of the input field */
        }

        .form-control:focus {
            border-color: #007bff;
            /* Border color when input field is focused */
            outline: 0;
            /* Remove outline when focused */
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
            /* Box shadow effect when input field is focused */
        }

        /* Add To Do List button */
        .btn-primary {
            color: #fff;
            /* Text color of the button */
            background-color: #007bff;
            /* Background color of the button */
            border-color: #007bff;
            /* Border color of the button */
            border-radius: 1.875rem;
            /* Rounded border radius of the button */
            font-size: 0.85rem;
            /* Font size */
            padding: 0.375rem 0.75rem;
            /* Spacing between content and border of the button */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            /* Background color of the button on hover */
            border-color: #0056b3;
            /* Border color of the button on hover */
        }

        /* Table styles */
        .table {
            width: 100%;
            /* Width of the table */
            margin-bottom: 1rem;
            /* Spacing below the table */
            color: #212529;
            /* Text color within the table */
            vertical-align: top;
            /* Vertical alignment for content within cells */
        }

        .table th,
        .table td {
            padding: 0.75rem;
            /* Spacing between content and border of cells */
            vertical-align: top;
            /* Vertical alignment for content within cells */
            border-top: 1px solid #dee2e6;
            /* Top border of cells */
        }

        .table thead th {
            vertical-align: bottom;
            /* Vertical alignment for table headers */
            border-bottom: 2px solid #dee2e6;
            /* Bottom border of table headers */
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
            /* Top border between tbody elements */
        }

        /* Table header */
        .table-light th {
            background-color: #f8f9fa;
            /* Background color of table headers */
            border-color: #dee2e6;
            /* Border color of table headers */
            color: #212529;
            /* Text color of table headers */
            vertical-align: bottom;
            /* Vertical alignment for table headers */
        }

        /* Actions buttons */
        .actions-btns a {
            text-decoration: none;
            /* Remove underline from links */
            color: #007bff;
            /* Text color of links */
            margin-right: 5px;
            /* Right margin of links */
        }

        .actions-btns a:hover {
            text-decoration: underline;
            /* Underline links on hover */
        }

        .filter-label-left {
            margin-right: 10px;
            /* Spacing between label and select */
            display: inline-block;
            /* Display label on the same line with select */
            width: 150px;
            /* Width of the label */
            text-align: right;
            /* Right-align the label */
        }
    </style>
</head>

<body>
    @yield('Content')
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
