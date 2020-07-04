<?dump($userArr);?>
<div class="login-container">
    <h1 class="login-title">Регистрация</h1>
    <form method="POST" id="register-form">
        <label class="label-name" for="name">Имя</label>
        <input name="name" type="text">
        <label class="label-email" for="email">Email</label>
        <input name="email" type="email">
        <label class="label-password" for="password">Пароль</label>
        <input name="password" type="password">
        <label class="label-confirm" for="confirm-password">Повторите пароль</label>
        <input name="confirm-password" type="password"> 
        <button type="submit" class="login-dtn" name="register" value="register">Зарегистрироваться</button> 
    </form>
    
</div>

<script>
        
    $(".login-dtn").on("click", function(e){    
        e.preventDefault();  
        let pattern = /\S+@\S+\.\S+/;
        let form = $("#register-form").serialize();
        let name = $("[name = name]").val();
        let email = $("[name = email]").val();
        let password = $("[name = password]").val();
        let confirm = $("[name = confirm-password]").val();
        if(name.length <= 4){
            $(".label-name").html("Имя не менее 3 символов").css({'color': 'red'});
        }
        else{
            $(".label-name").html("Имя").css({'color': 'black'});
        }
        if(!pattern.test(email)){
            $(".label-email").html("Введите свой настоящий email").css({'color': 'red'});
        }
        else{
            $(".label-email").html("Email").css({'color': 'black'});
        }
        if(password.length <= 7){
            $(".label-password").html("Пароль не менее 6 символов").css({'color': 'red'});
        }
        else{
            $(".label-password").html("Пароль").css({'color': 'black'});
        }
        if(password != confirm){
            $(".label-confirm").html("Пароли не совпадают").css({'color': 'red'});
        }
        else if(confirm.length != 0 && password == confirm){
            $(".label-confirm").html("Подтвердите пароль").css({'color': 'black'});

            $.ajax({ 
 
                url: "/register/ajax", 
                dataType: 'json',
                type: "POST",
                data: {ggg: "ggg"},
                    success: function(data) {
                        console.log(data); // Возвращаемые данные выводим в консоль
                    } 
                });
            }

    });
</script>