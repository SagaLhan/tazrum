<?php
    use yii\helpers\Html;
    use yii\helpers\HtmlPurifier;
?>
<div class="panel panel-shout">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-2">
                <div class="btn-group">
                    <button type="button" class="btn btn-shout dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Quote</a></li>
                        <li><?= Html::a('Verwijderen', ['/shout/delete', 'id' => $model->id]) ?></li>
                    </ul>
                </div>
                <small><?= Yii::$app->formatter->asTime($model->created_on, 'short') ?></small>
                <?= $this->render('/site/_username', ['user' => $model->user]) ?>:
            </div>
            <div class="col-md-10">
                <?= HtmlPurifier::process($model->text) ?>
            </div>
        </div>
    </div>
</div>