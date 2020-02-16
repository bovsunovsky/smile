<?php

use common\models\Lang;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$lang = Lang::getCurrent()->url;

?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2><?= $product->{'name_' . $lang} ?></h2>
            <h2>Категория <?= $product->categ->{'name_' . $lang} ?></h2>
            <p><?= $product->{'description_' . $lang} ?></p>
            <img src="/uploads/<?= $product->image ?>" width="300" alt="">
            <div>
                <?php if(isset($feedback)): ?>
<!--                    <ul>-->
                        <?php foreach ($feedback as $item) : ?>

                            <div class="card">
                                <div class="card-body">
                                    <div><?= $item->comment ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
<!--                    </ul>-->

                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-4">
            <p>Отзывы о товаре</p>
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($feedBackModel, 'product_id')->hiddenInput()->label(false) ?>

            <?= $form->field($feedBackModel, 'comment')->textArea(['maxlength' => true]) ?>

            <?= $form->field($feedBackModel, 'user_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($feedBackModel, 'user_email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($feedBackModel, 'status')->hiddenInput(['value' => 1])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>