function register() {
    if (document.getElementsByName("username")[0].value != "" && document.getElementsByName("password")[0].value != "" && document.getElementsByName("email")[0].value != "") {
        $.ajax({
            url: '/Api/user/Register.php',
            data: {
                name: document.getElementsByName("username")[0].value,
                password: document.getElementsByName("password")[0].value,
                email: document.getElementsByName("email")[0].value
            },
            success: function (response) {
                if (response.toString() == "{\"code\":1}") {
                    window.location.href = "../";
                } else {
                    window.alert("Такой пользователь уже существует!");
                    document.getElementsByName("username")[0].value = null;
                    document.getElementsByName("username")[0].style.borderColor = "RED";
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);

            }
        });
    }
    else {
        window.alert("Пожалуйста заполните все поля!");
    }
}