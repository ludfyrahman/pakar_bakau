
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a href="<?=base_url()."dashboard"?>">Dashboard</a></li>
    <?php
        $var = str_replace("http://", "", base_url(uri_string()));
        $link = explode('/', $var);
        for($i = 2; $i < count($link);$i++){
    ?>
    <li class="breadcrumb-item text-sm" aria-current="page"><a href="#" class='text-white'><?=  $link[$i] ?></a></li>
    <?php } ?>
</ol>