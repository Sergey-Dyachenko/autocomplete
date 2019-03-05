<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 05.03.2019
 * Time: 21:57
 */

namespace app\assets;

use yii\web\View;
use yii\web\AssetBundle;

class AngularAsset extends AssetBundle
{
    public $sourcePath = '@bower';
    public $js = [
        'angular/angular.js',
        'angular-animate/angular-animate.min.js',
        'angular-bootstrap/ui-bootstrap.min.js',
        'angular-bootstrap/ui-bootstrap-tpls.min.js'
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}