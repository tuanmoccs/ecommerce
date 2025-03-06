<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    @include('head')
</head>

<body>

@include('header')
<div class="gioithieu">
    <div class="thegioithieu">
        <div class="thegioithieu_img">
            <img src="./images/TuanAnh.jpg" alt="">
        </div>
        <h2>TRINH TUAN ANH</h2>
        <p>trinhmoc18@gmail.com</p>
        <div class="thexahoi">
            <a href="https://www.facebook.com/">
                <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="https://www.tiktok.com/@beaugirl21?lang=vi">
                <i class="fa-brands fa-tiktok"></i>
            </a>
            <a href="">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="">
                <i class="fa-brands fa-github"></i>
            </a>
        </div>
    </div>
</div>

<style>


    .gioithieu {
        margin-top: 10px;
        min-height: 100vh;
        background: linear-gradient(90deg, #ffba00 0%, #ff6c00 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .thegioithieu {
        background: #242628;
        height: 300px;
        width: 280px;
        border-radius: 10px;
        text-align: center;
        overflow: hidden;
        margin: 0 25px;
    }

    .thegioithieu_img {
        height: 100px;
        width: 100px;
        border-radius: 50%;
        border: 4px solid #f2726a;
        overflow: hidden;
        margin: 0 auto;
        transform: translateY(20px);
        cursor: pointer;
        transition: 0.5s;
    }

    .thegioithieu_img img {
        object-fit: cover;
        height: 100%;
        width: 100%;
        object-position: center;
    }

    .thegioithieu_img:hover {
        height: 150px;
        width: 150px;
        border-radius: 10px;
        transition: 0.3s ease-in-out;
    }

    .thegioithieu h2 {
        margin-top: 50px;
        color: white;
    }

    .thegioithieu p {
        color: #f2726a;
    }

    .thexahoi {
        margin: 25px 0px;
    }

    .thexahoi a {
        color: white;
        margin: 10px 20px;
        font-size: 20px;
        cursor: pointer;
        transition: 0.3s ease-in-out;
    }

    .thexahoi a:hover {
        transform: scale(0.9);
    }


</style>
@include('footer')
</body>

</html>
