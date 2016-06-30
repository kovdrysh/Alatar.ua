<div class="container" style="margin-top: 40px;">
    <div class="page">
   
    <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?=Page::$local_const['static']['vacancy']?></h1>
            </div>
    </div>

    <?foreach($this->data as $row){?>
        <div class="row">
            <div class="col-md-4">
                <img class="img-responsive " src="/images/<?=$row['image']?>" alt="">
            </div>
            <div class="col-md-5">
                <h3><?=$row['caption']?></h3>
                <p><?=$row['info']?></p>
            </div>
        </div>
        <hr>
        <?}?>