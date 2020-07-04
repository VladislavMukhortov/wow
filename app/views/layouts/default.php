<!DOCTYPE>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?= $title?></title>
        <link rel="stylesheet" href="/public/css/main.css">
        <link rel="stylesheet" href="/public/css/guide.css">
        <link rel="stylesheet" href="/public/css/login.css">
    </head>
    <body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <header>
            <img class="head-img" src="/public/img/main.png">
            <div class="wrapper-menu">    
                <span class="logo"><a href="/">LOGO</a></span>
                <span class="menu-its">
                    <a class="menu-item" href="/">Главная</a>
                    <a class="menu-item" href="/guide/index">Гайды</a>
                    <!-- <span class="menu-item"><a href="/">Билды</a></span> -->
                    <a class="menu-item" href="/bis/index">BIS - калькулятор</a>
                    <a class="menu-item" href="/girls/index">Сексуальные телочки</a>
                    <a class="menu-item" href="/forum/index">Форум</a>
                    <a class="menu-item" href="/pictures/index">Обои</a>
                    <span style="margin-left: 180px"></span>
                    <a class="menu-item" href="/login/index">Войти</a>
                    <a class="menu-item" href="/register/index">Зарегистрироваться</a>
                </span>
                
            </div>
            <div class="content-container"><div class="content"><?= $content?></div></div>
        </header>
    <footer>
        <div class="footer-container"></div>
    </footer>
    <script>
        $(document).ready(function(){
            let url = $(location).prop('href');
            let curDir = url.split("/");
            // console.log(cur[3]);
            let a = $(".menu-its").find("a");
            a.each(function(){
                let link = $(this).attr("href");
                let curLink = link.split("/");
                if(curLink[1] == curDir[3]){
                    $(this).addClass("active");
                    $(this).removeClass("menu-item");
                } 
            });

            
            
            // if(){}
        });
    </script>
    </body>
</html>