$(document).ready(function () {
    $('.logOut').click(function (e) {
        e.preventDefault();

        $.ajax({
            url:'logout.php',
            type: 'post',
            success: function (  ) {
                window.location.href = 'login.php';
            }
        });

    });


});
