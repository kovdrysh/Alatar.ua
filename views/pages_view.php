<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 07.06.2016
 * Time: 22:41
 */
if(!IN_ADMIN) {
    echo '<script>window.location.href = "/404"</script>';
    return;
}
?>
<div class="container" style="margin-top: 40px;">
    <div class="page">
        <div class="cont admin-browse-view" style="width: 960px; margin-left: auto; margin-right: auto;">
            <?if($action == 'browse'){?>
                <H2>Перегляд сторінок системи</H2>
                <span id="add-news-icon" title="Додати сторінку"> <a href="/<?=$table_name?>/add"><i class="fa fa-plus fa-lg"></i> <H4>Додати нову сторінку</H4></a></span>
            <?}?>
            <div class="admin-view-tabel-div">
                <?=$table_view?>
            </div>
        </div>

<style>

</style>