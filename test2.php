<?php
$str1 = "ᶤᶜᵉ ᴷᵘᶰᵍ";
$str = mb_convert_encoding($str1, "UTF-8", "auto");
echo $str;
?>
