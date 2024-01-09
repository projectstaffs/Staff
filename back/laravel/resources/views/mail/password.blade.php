<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <h1 style="color: #007BFF;">Здравствуйте {{ $name }},</h1>
    <p>Добро пожаловать на наш сайт! Мы рады приветствовать вас в нашем сообществе. Ваш аккаунт успешно создан, и вы теперь можете воспользоваться всеми возможностями нашего ресурса.</p>
    <h3>Данные вашего аккаунта:</h3>
    
    <ul style="color: #333;">
        <li> Электронная почта: {{ $email }} </li>
    </ul>    
    
    <p>Пожалуйста, сохраните эту информацию в надежном месте. Если вы забудете свои данные для входа, вы сможете восстановить доступ к своему аккаунту с помощью функции восстановления пароля на нашем сайте.</p>
    <p>Мы уверены, что вы найдете на нашем сайте множество интересных возможностей.</p>
    <p>Если у вас возникнут какие-либо вопросы или затруднения, не стесняйтесь обращаться в нашу службу поддержки. Мы всегда готовы помочь.</p>
    <p>С уважением,</p>
    <p>Команда <a href="http://localhost/" target="_blank" style="color: #00ff9d;">Babysitting</a> </p>

    <div class="text is_active">Some 111</div>
    <div class="text">Some 222</div>

    <a class="form_link" href="http://localhost/" target="_blank" >Текст ссылки</a>	
	<form class="form" action="http://localhost/api/test/" method="POST">
        <input type="hidden" name="email" value="vika@com">
        <button type="submit">Отправить</button>
    </form>
    <script>
        var body = document.querySelector('body');
        body.addEventListener('click', function (e) {
            if (e.target.classList.contains('text')) { // Переключение страниц
                if (e.target.classList.contains('is_active')) { return; }
                var previousActive = body.querySelector('.text.is_active');
                if (previousActive) { previousActive.classList.remove('is_active'); }
                e.target.classList.add('is_active');
            }        
        });
    </script>
</body>
</html>