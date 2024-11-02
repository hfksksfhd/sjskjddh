
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $whatsapp_number = htmlspecialchars($_POST['whatsapp_number']);
    $reason = htmlspecialchars($_POST['reason']);

    // تعريف الإيميلات وكلمات المرور
    $credentials = [
        'ryansharpp92@gmail.com' => 'a735685289a',
        'rosannzarl@gmail.com' => 'a735685289a'
    ];

    // إعداد الموضوع والرسالة
    $subject = "طلب فك الحظر عن واتساب من $name";
    $message = "
        الاسم: $name\n
        رقم الواتساب: $whatsapp_number\n
        سبب الطلب: $reason
    ";

    $all_sent = true;
    foreach ($credentials as $email => $password) {
        // إعداد رأس الرسالة باستخدام البريد الإلكتروني
        $headers = "From: $email";  
        
        // إرسال البريد الإلكتروني
        if (!mail($email, $subject, $message, $headers)) {
            $all_sent = false;
        }
    }

    // التحقق من نجاح الإرسال
    if ($all_sent) {
        $status_message = "<p style='color: green;'>تم إرسال طلبك بنجاح.</p>";
    } else {
        $status_message = "<p style='color: red;'>حدث خطأ أثناء إرسال الطلب.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب فك الحظر عن واتساب</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
            color: #333;
        }
        h1 {
            color: #4CAF50;
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            margin: 0 auto;
        }
        input, textarea {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 1em;
        }
        button {
            padding: 12px 25px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #218838;
        }
        footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>

    <h1>طلب فك الحظر عن واتساب</h1>

    <?php
    if (isset($status_message)) {
        echo $status_message;
    }
    ?>

    <form action="" method="POST">
        <input type="text" name="name" placeholder="الاسم الكامل" required><br>
        <input type="text" name="whatsapp_number" placeholder="رقم الواتساب مع كود الدولة" required><br>
        <textarea name="reason" placeholder="سبب فك الحظر" required></textarea><br>
        <button type="submit">إرسال الطلب</button>
    </form>

    <footer>
        <p>تم البرمجة بواسطة 𝑺𝑨𝑯𝑹 𝑨𝑳𝑰𝑨𝑳𝑰</p>
    </footer>

</body>
</html>
