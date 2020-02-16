<?php

use yii\helpers\Html;

?>
<div id="lang" style="font-size: 16px">
        <?= $current->name;?>
        <?php foreach ($langs as $lang):?>
                <?= Html::a($lang->name, '/'.$lang->url.Yii::$app->getRequest()->getLangUrl()) ?>
        <?php endforeach;?>
</div>

