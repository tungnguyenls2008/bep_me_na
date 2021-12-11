<?php
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
<style>
    @font-face {
        font-family: 'Montserrat', sans-serif;
        font-style: normal;
        font-weight: 200;
    }

    @font-face {
        font-family: 'Montserrat', sans-serif;
        font-style: normal;
        font-weight: 300;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-weight: 300;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        color: white;
        font-weight: 300;
    }

    body ::-webkit-input-placeholder {
        /* WebKit browsers */
        font-family: 'Montserrat', sans-serif;
        color: white;
        font-weight: 300;
    }

    body :-moz-placeholder {
        /* Mozilla Firefox 4 to 18 */
        font-family: 'Montserrat', sans-serif;
        color: white;
        opacity: 1;
        font-weight: 300;
    }

    body ::-moz-placeholder {
        /* Mozilla Firefox 19+ */
        font-family: 'Montserrat', sans-serif;
        color: white;
        opacity: 1;
        font-weight: 300;
    }

    body :-ms-input-placeholder {
        /* Internet Explorer 10+ */
        font-family: 'Montserrat', sans-serif;
        color: white;
        font-weight: 300;
    }

    .wrapper {
        background: #50a3a2;
        background: linear-gradient(to bottom right, #508da3 0%, #0077fe 100%);
        position: absolute;
        /*top: 50%;*/
        left: 0;
        width: 100%;
        height: 100%;
        /*margin-top: -200px;*/
        overflow: hidden;
    }

    .wrapper.form-success .container h1 {
        transform: translateY(85px);
    }

    .wrapper.form-success .container h3 {
        visibility: hidden;
        opacity: 0;
        transition: visibility 0s 1s, opacity 1s linear;
    }

    .container {
        max-width: 600px;
        padding: 80px 0;
        height: 800px;
        text-align: center;
        margin: 10% auto 0;
    }

    .container h1 {
        font-size: 40px;
        transition-duration: 1s;
        transition-timing-function: ease-in-put;
        font-weight: 200;
    }

    .form {
        padding: 20px 0;
        position: relative;
        z-index: 2;
    }

    .form input {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        outline: 0;
        border: 1px solid rgba(255, 255, 255, 0.4);
        background-color: rgba(255, 255, 255, 0.2);
        width: 250px;
        border-radius: 3px;
        padding: 10px 15px;
        margin: 0 auto 10px auto;
        display: block;
        text-align: center;
        font-size: 18px;
        color: white;
        transition-duration: 0.25s;
        font-weight: 300;
    }

    .form input:hover {
        background-color: rgba(255, 255, 255, 0.4);
    }

    .form input:focus {
        background-color: white;
        width: 300px;
        color: #53e3a6;
    }

    .form button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        outline: 0;
        border: 1px solid rgba(255, 255, 255, 0.4);
        background-color: rgba(255, 255, 255, 0.2);
        width: 200px;
        border-radius: 10px;
        padding: 10px 15px;
        margin: 0 auto 10px auto;
        display: block;
        text-align: center;
        font-size: 18px;
        color: white;
        transition-duration: 0.5s;
        font-weight: 300;
    }

    .form button:hover {
        background-color: rgba(255, 255, 255, 0.4);
    }

    .bg-bubbles {
        /*position: absolute;*/
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    .bg-bubbles li {
        position: absolute;
        list-style: none;
        display: block;
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.15);
        bottom: -60px;
        -webkit-animation: square 25s infinite;
        animation: square 5s infinite;
        transition-timing-function: linear;
    }

    .bg-bubbles li:nth-child(1) {
        left: 10%;
    }

    .bg-bubbles li:nth-child(2) {
        left: 20%;
        width: 80px;
        height: 80px;
        -webkit-animation-delay: 2s;
        animation-delay: 2s;
        -webkit-animation-duration: 17s;
        animation-duration: 17s;
    }

    .bg-bubbles li:nth-child(3) {
        left: 25%;
        -webkit-animation-delay: 4s;
        animation-delay: 4s;
    }

    .bg-bubbles li:nth-child(4) {
        left: 40%;
        width: 60px;
        height: 60px;
        -webkit-animation-duration: 22s;
        animation-duration: 22s;
        background-color: rgba(255, 255, 255, 0.25);
    }

    .bg-bubbles li:nth-child(5) {
        left: 70%;
    }

    .bg-bubbles li:nth-child(6) {
        left: 80%;
        width: 120px;
        height: 120px;
        -webkit-animation-delay: 3s;
        animation-delay: 3s;
        background-color: rgba(255, 255, 255, 0.2);
    }

    .bg-bubbles li:nth-child(7) {
        left: 32%;
        width: 160px;
        height: 160px;
        -webkit-animation-delay: 7s;
        animation-delay: 7s;
    }

    .bg-bubbles li:nth-child(8) {
        left: 55%;
        width: 20px;
        height: 20px;
        -webkit-animation-delay: 15s;
        animation-delay: 15s;
        -webkit-animation-duration: 40s;
        animation-duration: 40s;
    }

    .bg-bubbles li:nth-child(9) {
        left: 25%;
        width: 10px;
        height: 10px;
        -webkit-animation-delay: 2s;
        animation-delay: 2s;
        -webkit-animation-duration: 40s;
        animation-duration: 40s;
        background-color: rgba(255, 255, 255, 0.3);
    }

    .bg-bubbles li:nth-child(10) {
        left: 90%;
        width: 160px;
        height: 160px;
        -webkit-animation-delay: 11s;
        animation-delay: 11s;
    }

    @-webkit-keyframes square {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(-700px) rotate(600deg);
        }
    }

    @keyframes square {
        0% {
            transform: translateY(0);
        }
        100% {
            transform: translateY(-700px) rotate(600deg);
        }
    }

</style>
<div class="wrapper">
    <div class="container">
        @include('flash::message')
        <h1>Xin chào, mời bạn nhập Mã định danh cửa hàng</h1>
        <h3>*Viết liền chữ thường không dấu</h3>
        <div class="form">
            <input type="text" placeholder="Mã cửa hàng" id="organization_id" name="organization_id"
            >
            <button type="submit" id="login-button" class="btn btn-outline-success">Tiếp tục</button>
        </div>

    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<script>
    $(function () {
        $("#login-button").click(function (event) {
            if ($("#organization_id").val() != '') {
                var organization_id = $("#organization_id").val();
                $('.form').fadeOut(500);
                $('.wrapper').addClass('form-success');
                $('.wrapper.form-success .container h1').html('Xin đợi trong giây lát')
                setTimeout(function () {
                    $.ajax({
                        type: 'POST',
                        url: '{{route('organization-check')}}',
                        data: {
                            organization_id: organization_id,
                            _token: '{{ csrf_token() }}'
                        },
                        //dataType: 'json',
                        success: function (data) {
                            if (data == true) {
                                window.location.href = '{{route('login')}}'
                                //return false;
                            } else {
                                $('.wrapper.form-success .container h1').html('Cửa hàng của bạn đang<br> Tạm khóa,' +
                                    '<br>Xin liên hệ số đường dây nóng 8888-8888 để được giải quyết,' +
                                    '<br>Xin thứ lỗi vì sự bất tiện.' +
                                    '<br><a href="{{route('landing')}}">Trở về trang chủ</a>')
                                $('.wrapper.form-success .container h1').css('z-index',2)
                                $('.bg-bubbles').css('z-index',0)
                            }
                        },
                        error: function (data) {
                            //console.log(data)
                        }
                    });
                }, 500)
            }
            //event.preventDefault();

        });
    })
</script>
