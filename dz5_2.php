<?php
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
ini_set('display_errors',1);
header('Content-type: text/html; charset=utf-8');

$news='Четыре новосибирские компании вошли в сотню лучших работодателей
Выставка университетов США: открой новые горизонты
Оценку «неудовлетворительно» по качеству получает каждая 5-я квартира в новостройке
Студент-изобретатель раскрыл запутанное преступление
Хоккей: «Сибирь» выстояла против «Ак Барса» в пятом матче плей-офф
Здоровое питание: вегетарианская кулинария
День святого Патрика: угощения, пивной теннис и уличные гуляния с огнем
«Красный факел» пустит публику на ночные экскурсии за кулисы и по закоулкам столетнего здания
Звезды телешоу «Голос» Наргиз Закирова и Гела Гуралиа споют в «Маяковском»';
$news=  explode("\n", $news);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Документ без названия</title>
</head>
<body>
    <p><b>Форма для отправки в массив POST</b></p>
    <form method = "POST" action = "dz5_2.php">
        
        <p><input type = "text" name = "id"></p>
        <p><input type = "submit" name = "submit" value = "submit"></p>
        
    </form>

</body>
</html>

<?php 

// print_r($_POST);
   
function display_all($news)   // функция вывода всего списка
    {  
        foreach ($news as $value) 
            {
                echo $value . "<br>";
            }
    }

function display_the_one_news($id, $news)   // функция вывода конкретной новости
        {     
            if ($id <= (count($news)-1))   //(1/3) Если новость присутствует
                {                
                    echo $news[$id] . "<br>";  //(2/3) - вывести ее на сайте    
                } 
            else 
                {
                    display_all($news);            //(3/3) иначе мы выводим весь список
                }
        }
        
if(!empty($news)){
        if (isset($_POST['submit']))     //если нажимали кнопку submit
            {
                $id = $_POST['id'];
        
                if (is_numeric($id))  
                    { 
                        display_the_one_news($id, $news); 
                    }
                else                          // если параметр не был передан - выводить 404 ошибку
                    {                           
                        header("HTTP/1.0 404 Not Found");  
                        echo "Страница не найдена";
                    }
            }
    }
 else 
     {
        echo 'Список новостей пуст';
     }