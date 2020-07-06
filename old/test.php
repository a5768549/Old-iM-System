<html>
<body>
<!--  静态的表单在页面再次提交之后， 不再显示   同时页面的CSS失效-->

<?php
$str=_POST['str1'];

function getBig5CodeFromUtf8($u8str)
{
    $b5str=mb_convert_encoding($u8str, 'CP950', 'UTF-8');
    return unpack('n', $b5str)[1];
}

for($i = 0;$i < mb_strlen($str,"utf-8");$i++)
{
$get_str = mb_substr($str,$i,1,"utf-8");
echo getBig5CodeFromUtf8($get_str);
echo '<br>';
}


?>
<body>
<html>
