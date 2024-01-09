<!DOCTYPE html>
<html>
<head>
       
</head>
<body>
    <h1 style="color: #007BFF;">Здравствуйте {{ $name }},</h1>
    <ul style="color: #333;">
        <li> Электронная почта: {{ $email }} </li>
    </ul>   
    
    <p>С уважением,</p>
    <p>Команда <a href="http://localhost/" target="_blank" style="color: #00ff9d;">Babysitting</a> </p>

    <a class="form_link" href="http://localhost/" target="_blank" >Текст ссылки</a>	
	<form class="form" action="http://localhost/api/test/" method="POST">
        <input type="hidden" name="email" value="vika@com">
        <button type="submit">Отправить</button>
    </form>
</body>
</html>
