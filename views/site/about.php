<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    li {
        cursor: pointer;
    }

    li:hover{
        background-color: #f9f9f9;
    }
</style>
<div class="site-about">
    <div class="container" style="width: 50%">
        <h3 align="center">Autocomplete Textbox</h3>
        <div ng-app="myapp" ng-controller="usercontroller">
            <label for="">Enter Country Name</label>
            <input type="text" name="counrty" id="country" ng-model="country" ng-keyup="complete(country)" >
            <ul class="list-group"  ng-model="hidethis" ng-hide="hidethis">
                <li class="list-group-item" ng-repeat="countrydata in filterCountry" ng-click="fillTextbox(countrydata)">{{countrydata}}</li>
            </ul>
        </div>

    </div>
</div>
