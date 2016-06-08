<?php
if(!IN_ADMIN) {
    echo '<script>window.location.href = "/404"</script>';
    return;
}
?>
<div class="container" style="margin-top: 40px;">
<div class="page">
<div class= "change-map">
	  <span>Змінити карту</span>
	  <input type = "text" class = "form-control" placeholder = "Вставте сюди новий iframe" id = "new-map-iframe">
	  <p class="help-block">Важливо! Перед зміненням карти обов'язково перегляньте відеоролик, який знаходиться нижче!</p>
	  <button type="button" class="btn btn-success" onclick="changeMap()">Змінити карту</button>

</div>
<div class="video-help"> 
	<span>Відеоурок по зміні карти</span>
	<iframe width="420" height="315" src="https://www.youtube.com/embed/P5nUh_KhWuw" frameborder="0" allowfullscreen></iframe>

</div>
<div class="back-to-menu">
	<a href = "/admin"><button type="button" class="btn btn-success">Повернутися до меню</button></a>
</div>

<style>
	.change-map > span, .video-help > span{
		font-size: 18pt;
		color:#555;
	}
	.form-control{
		margin-top: 20px;
	}
	.video-help{
		margin-top: 30px;
		min-height:200px;
	}
	iframe{
		margin-top: 20px;
	}
	.back-to-menu{
		margin-top: 20px;
		text-align: right;
	}
</style>