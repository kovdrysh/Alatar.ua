<?php
if(!IN_ADMIN) {
    echo '<script>window.location.href = "/404"</script>';
    return;
}
?>
<div class="container" style="margin-top: 40px;">
<div class="page">
	<!--<div class= "change-map">
          <span>Змінити карту</span>
          <input type = "text" class = "form-control" placeholder = "Вставте сюди новий iframe" id = "new-map-iframe">
          <p class="help-block">Важливо! Перед зміненням карти обов'язково перегляньте відеоролик, який знаходиться нижче!</p>
          <button type="button" class="btn btn-success" onclick="changeMap()">Змінити карту</button>
    --><div class="cont admin-browse-view" style="width: 80%; margin-left: auto; margin-right: auto;">
		<?if($action == 'browse'){?>
			<H2>Перегляд мапи</H2>
			<span id="add-news-icon" title="Додати мапу"> <a href="/<?=$table_name?>/add"><i class="fa fa-plus fa-lg"></i> <H4>Додати нову мапу</H4></a></span>
		<?}?>
		<div class="admin-view-tabel-div">
			<?=$table_view?>
		</div>
	</div>
<?if($action == 'edit'){?>
	<div class="video-help">
		<span>Відеоурок по зміні карти</span>
		<iframe width="420" height="315" src="https://www.youtube.com/embed/P5nUh_KhWuw" frameborder="0" allowfullscreen></iframe>
	</div>
<?}?>
	<!--
<div class="back-to-menu">
	<a href = "/admin"><button type="button" class="btn btn-success">Повернутися до меню</button></a>
</div>
-->

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

	.admin-view-table td:nth-child(3) .browse-div-text{
		line-height: 3.5em;
		word-break: normal;
	}

	.admin-view-table tr:not(:first-of-type){
		height: 4.5em;
	}

	.admin-view-table td:last-of-type .browse-div-text{
		line-height: 14pt;
		vertical-align: middle;
		width: 100%;
	}
	.admin-view-table span{
		display: block;
		width: 100%;
	}
	.admin-view-table td{

		padding: 0px 15px;
	}
	.admin-view-table tr{
		max-width: 50%;
	}
	table{
		width:100%;
	}

	#add-news-icon{

	}
	.admin-view-tabel-div{
		max-width: 90%;
		margin-top: 20px;
	}
	.admin-browse-view h4{
		display: inline-block;
	}
</style>