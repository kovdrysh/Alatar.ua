<?php
if(!IN_ADMIN) {
    echo '<script>window.location.href = "/404"</script>';
    return;
}
?>
<div class="container" style="margin-top: 40px;">
    <div class="page">
    <div id = "for-buttons">
    	<button type="button" class="btn btn-primary" onclick="createFormForNewContact()">Додати нову інформацію</button>
    	<button type="button" class="btn btn-primary" onclick="getContactsFromDB()">Редагувати вже існуюче</button>
    </div>
    
    <div class="back-to-menu">
	<a href = "/admin"><button type="button" class="btn btn-success">Повернутися до меню</button></a>
</div>
	
<style>

#for-buttons{
	margin-bottom: 20px;
}
input{
	margin-bottom: 20px;
}

.back-to-menu{
	margin-top: 20px;
	text-align: right;
}

</style>