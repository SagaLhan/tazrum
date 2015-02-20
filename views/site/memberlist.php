<?php
    use yii\grid\GridView;
    /* @var $this yii\web\View */
    $this->title = 'Ledenlijst';
    $this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => '/site/memberlist'];
	
	function renderUsername (app\models\User $user) {
		return Yii::$app->getView()->render('_username', ['user' => $user]);
	}
	
?>
<div class="site-index">
    <div class="body-content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Ledenlijst</h4>
            </div>
            <div class="panel-body bg-tazrum-gradient">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        ['attribute' => 'name', 'content' => 'renderUsername'],
                        'topics',
                        'posts',
                        'shouts',
                        'polls',
                        'articles',
                        'location',
                        'email',
                        'birth_date',
                        'registered_on'
                    ]
                ]) ?>
             </div>
        </div>
    </div>
</div>
