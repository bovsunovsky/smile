<?php

use common\models\Lang;

$lang = Lang::getCurrent()->url;

?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2><?= $category->{'name_' . $lang} ?></h2>
            <p><?= $category->{'description_' . $lang} ?></p>
            <?php foreach ($product as $item) { ?>
                <p>
                    <a href="/product/product-view?id=<?= $item->id ?>"><?= $item->{'name_' . $lang} ?></a>
                </p>
            <?php } ?>
        </div>
        <div>

        </div>
    </div>
</div>
