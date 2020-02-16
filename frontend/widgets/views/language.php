<?php

use yii\helpers\Html;

?>
<div id="lang">
        <?= $current->name;?>
        <?php foreach ($langs as $lang):?>
                <?= Html::a($lang->name, '/'.$lang->url.Yii::$app->getRequest()->getLangUrl()) ?>
        <?php endforeach;?>
</div>

