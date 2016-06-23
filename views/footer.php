<?
?>
</div>
<footer id = "footer" style="margin-top: 40px;">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="col-lg-3 col-sm-3 col-xs-6">
            	<h4><?=Page::$local_const['contacts']?></h4>
            	<p><i class="fa fa-home"></i> <?=Page::$local_const['adress']?></p>
                <p><i class="fa fa-phone"></i> 093-238-32-62</p>
                <p><i class="fa fa-envelope-o"></i> alatar@gmail.com</p>
            	         
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-6 ">
            	<h4><?=Page::$local_const['delivery']?></h4>
            	    <p><i class="fa fa-car"></i> <?=Page::$local_const['self_delivery']?></p>
                    <p><i class="fa fa-truck"></i> <?=Page::$local_const['our_transport']?></p>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-6 my-hide">
            	<h4><?=Page::$local_const['payment']?></h4>
            	    <p><i class="fa fa-money"></i> <?=Page::$local_const['cash_payment']?></p>
                    <p><i class="fa fa-bank"></i> <?=Page::$local_const['bank_payment']?></p>
            </div>
            <div class = "col-lg-3 col-sm-3 col-xs-12 ">
            	<h4 class = "main-text"><?=Page::$local_const['Alatar_footer']?></h4>
            </div>
        </div>
    </div>
</footer>


</div>
<script src="/script/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/script/bootstrap.min.js"></script>
<!--<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>-->
<script type="text/javascript" src="/script/add_product.js"></script>
<script type="text/javascript" src="/script/left_menu.js"></script>
<script type="text/javascript" src="/script/order.js"></script>
<script type="text/javascript" src="/script/enterAdmin.js"></script>
<script type="text/javascript" src="/script/map_change.js"></script>
<script type="text/javascript" src="/script/contacts_change.js"></script>
<script type="text/javascript" src="/script/delivery_change.js"></script>
<script type="text/javascript" src="/script/vacancy_change.js"></script>
<script type="text/javascript" src="/script/order_success.js"></script>
<script type="text/javascript" src="/adminka/script/jquery-ui.min.js"></script>
<script type="text/javascript" src="/adminka/script/search.js"></script>
<script type="text/javascript" src="/adminka/script/admin_fw_src.js"></script>
<script type="text/javascript" src="/adminka/script/jquery-ui-timepicker-addon.js"></script>


<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
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
                location.reload(true);
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
    height: 100%;
}
    .main-text{
        text-align: center;
    }
</style>