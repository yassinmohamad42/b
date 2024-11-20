<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على البيانات من النموذج
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // إعدادات البريد الإلكتروني
    $to = "hassenmarwa246@gmail.com"; // هذا هو البريد الإلكتروني المستلم
    $subject = "رسالة جديدة من نموذج التواصل";
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "Content-Type: text/html; charset=UTF-8\r\n";

    // محتوى الرسالة
    $body = "<h2>رسالة جديدة من نموذج التواصل</h2>" .
            "<p><strong>الاسم:</strong> $name</p>" .
            "<p><strong>البريد الإلكتروني:</strong> $email</p>" .
            "<p><strong>الرسالة:</strong><br>$message</p>";

    // إرسال البريد الإلكتروني
    if (mail($to, $subject, $body, $headers)) {
        echo "تم إرسال رسالتك بنجاح. شكرًا لتواصلك معنا!";
    } else {
        echo "حدث خطأ أثناء إرسال الرسالة. حاول مرة أخرى.";
    }
} else {
    echo "يرجى ملء النموذج.";
}
?>
