<?php
// أدخل التوكن الخاص ببوتك هنا
$botToken = "7612925129:AAFssIlnbSKR6g47eR03-BDMrLZUPA1CPN0";
$apiURL = "https://api.telegram.org/bot$botToken/";

// استلام التحديثات القادمة من Telegram
$content = file_get_contents("php://input");
$update = json_decode($content, true);

// تحقق من وجود بيانات
if (isset($update['message'])) {
    // استخراج معلومات الرسالة والمستخدم
    $chatId = $update['message']['chat']['id']; // ID المستخدم
    $username = $update['message']['from']['username'] ?? 'غير متوفر'; // اسم المستخدم
    $firstName = $update['message']['from']['first_name'] ?? ''; // الاسم الأول
    
    // نص الرسالة التي سيتم إرسالها
    $reply = "مرحباً، $firstName!\n";
    $reply .= "اسم المستخدم الخاص بك: @$username\n";
    $reply .= "معرّف المستخدم (ID): $chatId";
    echo $firstName;
    

    // إرسال الرد إلى المستخدم
    file_get_contents($apiURL . "sendMessage?chat_id=$chatId&text=" . urlencode($reply));
}
?>
