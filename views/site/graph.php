<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Graph';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>
<script src="//www.amcharts.com/lib/4/core.js"></script>
<script src="//www.amcharts.com/lib/4/charts.js"></script>
<script src="//www.amcharts.com/lib/4/themes/animated.js"></script>
<div id="chartdiv"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script>
    /**
     * ---------------------------------------
     * This demo was created using amCharts 4.
     *
     * For more information visit:
     * https://www.amcharts.com/
     *
     * Documentation is available at:
     * https://www.amcharts.com/docs/v4/
     * ---------------------------------------
     */

    am4core.useTheme(am4themes_animated);

    // Create chart instance
    var chart = am4core.create("chartdiv", am4charts.XYChart);

    // Add data



    chart.data = [{
        "category": "Research",
        "value": 450,
        "breakdown": {
            "personnel": 250,
            "equipment": 150,
            "other": 50
        }
    }, {
        "category": "Marketing",
        "value": 1200,
        "breakdown": {
            "personnel": 600,
            "equipment": 400,
            "other": 200
        }
    }, {
        "category": "Distribution",
        "value": 1850,
        "breakdown": {
            "personnel": 1200,
            "equipment": 600,
            "other": 50
        }
    }];

    // Create axes
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "category";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.minGridDistance = 30;

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

    // Create series
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueY = "value";
    series.dataFields.categoryX = "category";
    series.columns.template.propertyFields.dummyData = "breakdown";
    series.columns.template.tooltipText = "[bold]{category}[/]\nPersonnel: {dummyData.personnel}\nEquipment: {dummyData.equipment}\nOther: {dummyData.other}";

</script>
<style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    }

    #chartdiv {
        width: 100%;
        height: 250px;
    }

</style>