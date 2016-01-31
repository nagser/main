<?
$this->title = $name;
use \yii\helpers\Html;
?>
<div class="callout callout-danger">
	<h3 class="no-margin"><i class="fa fa-warning"></i> <?= Html::encode($message)?></h3>
	<ul class="no-margin">
		<li><?= Html::a('Перейти на главную', [\yii\helpers\Url::to(['/main/admin/index'])])?></li>
	</ul>
</div>
