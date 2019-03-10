<?php

$numbers = [
    1,2,3,4,5,6,7,8,9,10
];

$subs = $numbers;

$tables = [];
foreach($numbers as $number){
    foreach($subs as $sub){
        $tables[] = [
            'table' => $number . ' X ' . $sub,
            'answer' => ($number * $sub)
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <title>Tafels</title>

</head>
<body>
<div id="app">
    <div class="container">
        <div class="row">
            <div id="tafels">
                <div class="text-center tableText col-xs-12" >
                    <span v-on:click="change">{{ tableText }}</span>
                    <span v-on:click="showAnswer" v-bind:class="(answer) ? 'showAnswer' : 'hideAnswer'"> = </span>
                    <span v-bind:class="(showAnswerBoolean) ? 'showAnswer' : 'hideAnswer'">{{ answer }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script>
    new Vue({
        el: '#tafels',
        data: {
            tableText: 'Start >',
            tables: [
                <?php
                $start = true;
                foreach($tables as $table){
                    echo (!$start) ? "," : '';
                    echo  json_encode($table) ;
                    $start = false;
                } ?>
            ],
            showAnswerBoolean: false,
            answer: null
        },
        methods: {
            change() {
                var random =Math.floor(Math.random() * (+99 - +0)) + +0;
                var table = this.tables[random];
                this.tableText = table.table;
                this.answer = table.answer;
                this.showAnswerBoolean = false;
            },
            showAnswer(){
                this.showAnswerBoolean = true;
            }
        }
    });
</script>
<style>
    .tableText{
        font-size: 85px;
        color: blue;
    }
    .hideAnswer{
        display: none;
    }
    .showAnswer{
        display: inline;
    }
</style>
</body>
</html>

