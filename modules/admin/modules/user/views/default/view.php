<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\modules\user\Module;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\modules\user\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Module::t('module', 'ADMIN_USERS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('module', 'BUTTON_UPDATE'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('module', 'BUTTON_DELETE'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('module', 'CONFIRM_DELETE'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            'created_at:datetime',
            'updated_at:datetime',
            'last_visit:datetime',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => $model->getStatusLabelName(),
            ],
            [
                'attribute' => 'role',
                'value' => $model->getRoleName(),
            ],
        ],
    ]) ?>

</div>
