<?php
// معلومات الاتصال بقاعدة البيانات
$host = 'sql313.infinityfree.com';
$user = 'if0_36333669';
$pass = 'YoP8tqegbLR';
$db = 'if0_36333669_moon';

// اسم الملف الذي سيتم حفظ النسخة الاحتياطية به
$backup_file = 'bazck.sql';

// استخدام دالة mysqldump لإنشاء نسخة احتياطية
exec("mysqldump --user={$user} --password={$pass} --host={$host} {$db} > {$backup_file}");

echo "تم إنشاء نسخة احتياطية بنجاح!";
?>