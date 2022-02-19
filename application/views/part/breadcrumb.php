
<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=base_url()."dashboard"?>">Dashboard</a></li>
        <?php
            $var = str_replace("http://", "", base_url(uri_string()));
            $link = explode('/', $var);
            for($i = 2; $i < count($link);$i++){
        ?>
        <li class="breadcrumb-item" aria-current="page"><a href="#"><?=  $link[$i] ?></a></li>
        <?php } ?>
    </ol>
</nav>