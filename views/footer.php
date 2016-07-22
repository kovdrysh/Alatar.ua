<?
defined('_INDEX') or die;
?>
</div>
</div>
<div class="footer-container">
    <div class="container">
        <footer id = "footer">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="footer-col col-lg-4 col-sm-4 col-xs-6">
                        <h4><?=Page::$local_const['static']['contacts']?></h4>
                        <p><i class="fa fa-home"></i> <?=Page::$local_const['static']['adress']?></p>
                        <p><i class="fa fa-phone"></i> 093-238-32-62</p>
                        <p><i class="fa fa-envelope-o"></i> alatar@gmail.com</p>

                    </div>
                    <div class="footer-col col-lg-4 col-sm-4 col-xs-6 ">
                        <h4><?=Page::$local_const['static']['delivery']?></h4>
                            <p><i class="fa fa-car"></i> <?=Page::$local_const['static']['self_delivery']?></p>
                            <p><i class="fa fa-truck"></i> <?=Page::$local_const['static']['our_transport']?></p>
                    </div>

                    <div class = "col-lg-3 col-sm-3 col-xs-12 ">
                        <h4 class = "main-text"><?=Page::$local_const['static']['Alatar_footer']?></h4>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
<script src="/script/jquery.js"></script>
<script type="text/javascript" src="/script/enterAdmin.js"></script>
<?if($_SESSION['admin']){?>
<script type="text/javascript" src="/script/add_product.js"></script>
<script type="text/javascript" src="/adminka/script/jquery-ui.min.js"></script>
<script type="text/javascript" src="/adminka/script/search.js"></script>
<script type="text/javascript" src="/adminka/script/admin_fw_src.js"></script>
<script type="text/javascript" src="/adminka/script/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<?}?>

<script type="text/javascript" src="/script/bootstrap.min.js"></script>
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    });

    $('.lang').click(function () {
        $.ajax({
            url: '/Localization.php',
            data: 'language=' + this.id,
            type: 'POST',
            success:function(output){
                //location.reload(true);
            }
        });
    });


</script>

</body>

</html>

<style>
html {
    position: relative;
}
#footer{
	bottom: 0;
    margin: 50px 0 0 0;
}
.page {
    display: table-row;
    height: 100%;
}
.container{
    position: relative;
    display: table;
    height: 85%;
}
    .main-text{
        text-align: center;
    }
</style>