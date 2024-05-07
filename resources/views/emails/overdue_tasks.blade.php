<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo công việc quá hạn</title>
</head>
<body>
    <p>Bạn đang nhận được email này vì bạn có một hoặc nhiều công việc quá hạn. Dưới đây là danh sách các công việc:</p>

    <ul>
        <li><strong>Tên công việc:</strong> {{ $task->task_name }}</li>
        <li><strong>Mô tả công việc:</strong> {{ $task->describe }}</li>
        <li><strong>Ngày bắt đầu:</strong> {{ $task->start_date }}</li>
        <li><strong>Ngày kết thúc:</strong> {{ $task->end_date }}</li>
    </ul>

    <p>Vui lòng hoàn thành các công việc trên càng sớm càng tốt để tránh gây bất tiện. Cảm ơn bạn!</p>
</body>
</html>
