function login(){
    $.ajax({
        url: '/Api/user/Auth.php',
        data: {
            username: document.getElementsByName("username")[0].value,
            password: document.getElementsByName("password")[0].value
        },
        success: function (response) {
            if (response.id != null && response.token != null){
                window.location.href = "/Note";
            }
               else{
                window.alert("Пользователь не найден!")
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);

        }
    });
}
