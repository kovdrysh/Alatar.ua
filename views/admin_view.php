<?php
if(!IN_ADMIN) {
    //echo '<script>window.location.href = "/404"</script>';
    include '/views/404_view.php';
    exit;
}
?>
<div class="container" style="margin-top: 40px;">
    <div class="page">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Можливості адміністратора</h1>
            </div>
        </div>

        <ul class="admin-possibilities">
            <li><a href="/pages_ukr/browse">Сторінки сайту українською</a></li>
            <li><a href="/pages_en/browse">Сторінки сайту англійською</a></li>
            <li><a href="/products_ukr/browse">Товари українською</a></li>
            <li><a href="/products_en/browse">Товари англійською</a></li>
            <li><a href="/menu_ukr/browse">Категорії товарів українською</a></li>
            <li><a href="/menu_en/browse">Категорії товарів англійською</a></li>
            <li><a href="/map/browse">Змінити карту</a></li>
            <li><a href="/orders/browse">Переглянути замовлення</a></li>
            <li><a href="/vacancies_ukr/browse">Вакансії українською</a></li>
            <li><a href="/vacancies_en/browse">Вакансії англійською</a></li>
        </ul>

<style>
    
    .admin-possibilities{
        list-style: none;
        padding:0;
    }
    .admin-possibilities a{
        font-size: 15pt;
        text-decoration: none;
        color: #464646;
    }
    .admin-possibilities a:hover{
        font-weight: bold;
    }
    .admin-possibilities li{
        padding: 7px 20px;
        margin-bottom: 10px;
        border-radius: 5px;
        border-left: 10px solid #f05d22;
        box-shadow: 2px -2px 5px 0 rgba(0,0,0,.1),
                    -2px -2px 5px 0 rgba(0,0,0,.1),
                    2px 2px 5px 0 rgba(0,0,0,.1),
                    -2px 2px 5px 0 rgba(0,0,0,.1);
        font-size: 20px;
        letter-spacing: 2px;
        background:white;
        transition: 0.3s all linear;
    }
    .admin-possibilities li:nth-child(2){border-color: #fcba30;/**/}
    .admin-possibilities li:nth-child(3){border-color: #FFFB00;/*#fcba30;*/}
    .admin-possibilities li:nth-child(4){border-color: #8bc63e;}
    .admin-possibilities li:nth-child(5){border-color: #00CCFF;/*#493224;*/}
    .admin-possibilities li:nth-child(6){border-color: #0B7EFF;}
    .admin-possibilities li:nth-child(7){border-color: #7154FF;}
    .admin-possibilities li:nth-child(8){border-color: #fcba30;}
    .admin-possibilities li:nth-child(9){border-color: #FFFB00;}
    .admin-possibilities li:hover {
        border-left: 10px solid transparent;
    }
    .admin-possibilities li:nth-child(1):hover {
        border-right: 10px solid #f05d22;
    }
    .admin-possibilities li:nth-child(2):hover {
        border-right: 10px solid #fcba30;
    }
    .admin-possibilities li:nth-child(3):hover {
        border-right: 10px solid #FFFB00;
    }
    .admin-possibilities li:nth-child(4):hover {
        border-right: 10px solid #8bc63e;
    }
    .admin-possibilities li:nth-child(5):hover {
        border-right: 10px solid #00CCFF;
    }
    .admin-possibilities li:nth-child(6):hover {
        border-right: 10px solid #0B7EFF;
    }
    .admin-possibilities li:nth-child(7):hover {
        border-right: 10px solid #7154FF;
    }
    .admin-possibilities li:nth-child(8):hover {
        border-right: 10px solid #fcba30;
    }
    .admin-possibilities li:nth-child(9):hover {
        border-right: 10px solid #FFFB00;
    }
    .admin-possibilities li:nth-child(10):hover {
        border-right: 10px solid #f05d22;
    }
    .admin-div h2{
        margin-top: -5px;
    }
</style>