<?php

function translate($NameProduct, $AmountProduct, $lang) { // $NameProduct - наименование продукта в единственном числе, $AmountProduct - кол-во продукта, $lang - язык (en - English, ru - Русский, esp - особый северный)

$words = array( // ИНициализируем ассоциативный массив слов
            "fish" => array(
                "declension"   => array(
                                    "0" => "fish",
                                    "1" => "fish"
                                ),
                "lang"     => "en",
                "ru"       => "рыба",                    
                "esp"      => ""                              
            ),
            "apple" => array(
                "declension" => array(
                                    "0" => "apples",
                                    "1" => "apple"
                                ),
                "lang"   => "en",
                "ru"     => "яблоко",                    
                "esp"    => ""
            ),
            "man" => array(
                "declension" => array(
                                    "0" => "people",
                                    "1" => "men"
                                ),
                "lang"   => "en",
                "ru"     => "человек",                    
                "esp"    => ""
            ),
            "cooler" => array(
                "declension" => array(
                                    "0" => "coolers",
                                    "1" => "cooler"
                                ),
                "lang"   => "en",
                "ru"     => "вентилятор",                    
                "esp"    => ""
            ),
            "goose" => array(
                "declension" => array(
                                    "0" => "geese",
                                    "1" => "goose"
                                ),
                "lang"   => "en",
                "ru"     => "гусь",                    
                "esp"    => ""
            ),
            "рыба" => array(
                "declension"    => array(
                                "0" => "рыб",
                                "1" => "рыба",
                                "2" => "рыбы",
                                "3" => "рыбы",
                                "4" => "рыбы"
                            ),               
                "lang"      => "ru",
                "en"        => "fish",                    
                "esp"       => ""
            ),
            "человек" => array(
                "declension"    => array(
                                "0" => "человек",
                                "1" => "человек",
                                "2" => "человека",
                                "3" => "человека",
                                "4" => "человека"
                            ),
                "lang"      => "ru",
                "en"        => "man",                    
                "esp"       => ""
            ),
            "яблоко" => array(
                "declension"    => array(
                                "0" => "яблок",
                                "1" => "яблоко",
                                "2" => "яблока",
                                "3" => "яблока",
                                "4" => "яблока"
                            ),
                "lang"      => "ru",
                "en"        => "apple",                    
                "esp"       => ""
            ),
            "вентилятор" => array(
                "declension"    => array(
                                "0" => "вентиляторов",
                                "1" => "вентилятор",
                                "2" => "вентилятора",
                                "3" => "вентилятора",
                                "4" => "вентилятора"
                            ),
                "lang"      => "ru",
                "en"        => "cooler",                    
                "esp"       => ""
            ),
            "гусь" => array(
                "declension"    => array(
                                "0" => "гусей",
                                "1" => "гусь",
                                "2" => "гуся",
                                "3" => "гуся",
                                "4" => "гуся"
                            ),
                "lang"      => "ru",
                "en"        => "goose",                    
                "esp"       => ""
            )
        ); 

// Основная часть

   if(isset($words[$NameProduct])){       
        if ($words[$NameProduct]["lang"] == $lang){
            if (array_key_exists($AmountProduct, $words[$NameProduct]["declension"])) {
                $SumLine = $AmountProduct.' '.$words[$NameProduct]["declension"][$AmountProduct];
            } else {
                $SumLine = $AmountProduct.' '.$words[$NameProduct]["declension"][0];
            }
        }else {
            if (array_key_exists($AmountProduct, $words[$words[$NameProduct][$lang]]["declension"])) {
                $SumLine = $AmountProduct.' '.$words[$words[$NameProduct][$lang]]["declension"][$AmountProduct];
            } else {
                $SumLine = $AmountProduct.' '.$words[$words[$NameProduct][$lang]]["declension"][0];
            }  
        }            
        return $SumLine;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST">

    <table>
        <tr>
            <td><label for="NameProduct">Товар:</label></td>
            <td><input type="text" name="NameProduct" placeholder="Товар в ед. числе" /></td>
        </tr>
        <tr>
            <td><label for="AmountProduct">Кол-во товара:</label></td>
            <td><input type="text" name="AmountProduct" placeholder="Введите кол-во товара" /></td>
        </tr>
        <tr>
            <td><label for="lang">Выбор языка:</label></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="radio" name="lang" id="lang" value="en" />English</td>
        </tr>
        <tr>
            <td></td>
            <td><input type="radio" name="lang" id="lang" value="ru" />Русский</td>
        </tr>
        <tr>
            <td></td>
            <td><input type="radio" name="lang" id="lang" value="esp" />Особый северный</td>
        </tr>
        
    </table>

    <input type="submit" value="Отправить" name="button" />

</form>

<div><hr /></div>

<div>
<?php

// Получаем методом POST данные из формы на странице index.html
$NameProduct = '';
$AmountProduct = '';
$lang = '';

if(isset($_POST['button'])){
    $NameProduct = isset($_POST['NameProduct'])?$_POST['NameProduct']:'';
    $AmountProduct = isset($_POST['AmountProduct'])?$_POST['AmountProduct']:'';
    $lang = isset($_POST['lang'])?$_POST['lang']:'';

    if($NameProduct == '' || $AmountProduct == '' || $lang == ''){
        echo '<span style="color: green; background: palegreen; font-style: italic">Исходных данных недостаточно</span>';		
    } 
}

$result = translate($NameProduct, $AmountProduct, $lang);
if(isset($result)){
    echo $result;
}
?>

</div>

</body>
</html>