<?php
$a = 5;
$b = '05';
?>

1.
<?php var_dump($a == $b);         // Почему true? ?>
<br> Потому что, integer 5 и string 5 они равны, по типу если сравнить будет false (неявное преобразование типа)
<br> <br>

2.
<?php var_dump((int)'012345');     // Почему 12345? ?>
<br> Потому что, при приведении строку в числовое, если строка числовая, представляет целое число и не превышает максимально допустимого значения для типа int, то она приводится к типу int.
<br> <br>

3.
<?php var_dump((float)123.0 === (int)123.0); // Почему false? ?>
<br> В PHP, если стоит три равно, при сравнении учитывается и тип данных, так как они разные выводит false
<br> <br>

4.
<?php var_dump((int)0 === (int)'hello, world'); // Почему true? ?>
<br> При приведении строку в числовое, так как в строке нет числовых значении допустимого для integer, он даст - 0, и конечно у обеих сторон тип данных одиноковый
<br> <br>