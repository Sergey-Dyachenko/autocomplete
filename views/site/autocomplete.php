<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 06.03.2019
 * Time: 22:20
 */

use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\helpers\Html;

echo 'Names'. '<br>';

echo AutoComplete::widget([
        'name' => 'User',
        'id' => 'ddd',
        'clientOptions' => [
                'source' => $data,
                'autoFill' => true,
                'select' => new JsExpression("function(event, ui){
                    $('#city-state_name').val(ui.item.id);
                }")],
]);
?>


<?= Html::activeHiddenInput($model[0], 'name')?>



