<?php
$cakeDescription = 'Hello Yorkmars';
?>
<!DOCTYPE html>
<html>
<head>

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
.infor{
    display: inline-block;
    padding:0px 8px 0px 8px;
    width:33%;
}
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
    .sub{
        display:inline-block;
        style:none;
    }
    .language{
        display:inline-block;
        width:200%;
        position:relative;
        right:100px;
        height:50px;
    }
    .ssname{
        font-family: 'Open Sans', sans-serif;
    }
    .subname{
        padding:0 0 0 5px;
        width:50%;
    }
    .name{
        padding:0 5px 0 0;
        width:50%;
    }
    .discription{
        display:inline-block;
        width:100%;
        padding:0px 8px 0px 8px;
    }
    .foreach{
        display: block;
        width:100%
    }
    div.lang{
        display: inline;
    }
    </style>
</head>
<body>
   <nav class="top-bar expanded" data-topbar role="navigation">
         <ul class="title-area large-2 medium-4 columns">
            <li class="name">
                <h1><a href="#"><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <!-- <= $this->Form->create($proces,["enctype"=>"multipart/form-data","id"=>"programmer_form"]) ?> -->
        <div class="top-bar-section">
            <ul class="right">
            <!-- <li><= $this->Html->link('en_US',['controller'=>"App",'action' => 'change-language','en_US']) ?> </li>
            <li><= $this->Html->link('km_KH',['controller'=>"App",'action' => 'change-language','km_KH']) ?></li>
            <li><= $this->Html->link('zh_HK',['controller'=>"App",'action' => 'change-language','zh_HK']) ?></li> -->
            <!-- <= $this->Form->end() ?> -->
            <!-- <li>< $this->Html->image('icon/english.png',['alt'=>'English','url'=>['controller'=>"App",'action' => 'change-language','en_US']]) ?></li>
            <li>< $this->Html->image('icon/cambodia.png',['alt'=>'Cambodia','url'=>['controller'=>"App",'action' => 'change-language','km_KH']]) ?></li>
            <li>< $this->Html->image('icon/chinase.png',['alt'=>'Chinase','url'=>['controller'=>"App",'action' => 'change-language','zh_HK']]) ?></li> -->
            <li><?= $this->Html->link(__('List of Process'), ['controller'=>"Process",'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('List of All Informations'), ['controller'=>"Descriptions",'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Add Process'), ['controller'=>"Process",'action' => 'add']) ?></li> 
            <li><?= $this->Html->link(__('Add More Informations'), ['controller'=>"Descriptions",'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('Export File Excel'), ['action' => 'exportdata','controller'=>"Process"]) ?></li>
            <li><?= $this->Html->link(__('Languages'),['controller'=>"Languages",'action' => 'language',1]) ?></li>
            <li>
            <!-- <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            Dropdown button
                        </button> -->
                            <!-- <div class="dropdown-menu"> -->
                            <?= $this->Form->create($language) ?>
                            <div class="lang" style = "display:none">
                            <?= $this->Form->control('language',["value"=>"en_US"])?></div>
                            <div class="lang">
                            <?= $this->Form->button('English') ?></div>
                            <?= $this->Form->end() ?>
                            <?= $this->Form->create($language) ?>    
                            <div class="lang"  style = "display:none">
                             <?= $this->Form->control("language",["value"=>"km_KH"])?> </div> 
                              <div class="lang">
                            <?= $this->Form->button('ខ្មែរ') ?></div>
                            <?= $this->Form->end() ?>
                            <?= $this->Form->create($language) ?>
                            <div class="lang"  style = "display:none">
                            
                            <?= $this->Form->control("language",["value"=>"zh_HK"])?> </div>
                            <div class="lang">
                            <?= $this->Form->button('中文') ?></div>
                            <?= $this->Form->end() ?>
                              <!-- <a class="dropdown-item" href="#">Link 1</a>
                              <a class="dropdown-item" href="#">Link 2</a>
                              <a class="dropdown-item" href="#">Link 3</a> -->
                            <!-- </div>
                            <div> -->
                            </li>
            <!-- </ul>
            <ul class="right"> -->
                <li ><a id="MyClockDisplay" class="clock"></a></li>
                </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
    <script>
    //Start User Friendly Form
    $(document).ready(function()
    { 
 $('#title').tokenfield({
  autocomplete:{
   source: ['Factory Manager','CTO','CEO','Accountant','TI&IE','Web Developer','QA Manager','CakePHP','Admin','QC','Washing','Cutting Manager','Line Manger','Cheife','IT Support'],
   delay:100
  },
  showAutocompleteOnFocus: true
 });

//end User Friendly form
//Start Data Group
 $(document).ready(function(){

$('#repeater').createRepeater();

$('#repeater_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
        data:$(this).serialize(),
        success:function(data)
        {
            $('#repeater_form')[0].reset();
            $('#repeater').createRepeater();
            $('#success_result').html(data);
        }
    })
});
});


jQuery.fn.extend({
createRepeater: function () {
var addItem = function (items, key) {
    var itemContent = items;
    var group = itemContent.data("group");
    var item = itemContent;
    // var input = item.find('input,select');
    // input.each(function (index, el) {
    //     var attrName = $(el).data('name');
    //     var skipName = $(el).data('skip-name');
    //     if (skipName != true) {
    //         $(el).attr("name", group + "[]" );
    //     } else {
    //         if (attrName != 'undefined') {
    //             $(el).attr("name", attrName);
    //         }
    //     }
    // })
    var itemClone = items;

    /* Handling remove btn */
    var removeButton = itemClone.find('.remove-btn');

    if (key == 0) {
        removeButton.attr('disabled', true);
    } else {
        removeButton.attr('disabled', false);
    }

    $("<div class='items'>" + itemClone.html() + "<div/>").appendTo(repeater);
};
/* find elements */
var repeater = this;
var items = repeater.find(".items");
var key = 0;
var addButton = repeater.find('.repeater-add-btn');
var newItem = items;

if (key == 0) {
    items.remove();
    addItem(newItem, key);
}
//data Group
//start show time
/* handle click and add items */
addButton.on("click", function () {
    key++;
    addItem(newItem, key);
});
}
});
function showTime(){
        var date = new Date();
        var dd = date.getDate();
        var mm = date.getMonth()+1; //January is 0!
        var yyyy = date.getFullYear();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var session = "AM";

        if(h == 0){
            h = 12;
        }

        if(h > 12){
            h = h - 12;
            session = "PM";
        }

        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;

        var time =  dd+"/"+mm+"/"+yyyy+" "+h + ":" + m + ":" + s + " " + session;
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;
        setTimeout(showTime, 1000);
    }

    showTime();
    $(document).ready(function () {

        $.ajax({
            url: '/defect/check',
            beforeSend: function(xhr){
                xhr.setRequestHeader('X-CSRF-Token', <?= json_encode($this->request->param('_csrfToken')); ?>);
            },
            dataType: "json",
            success:function (data) {

                for(var i = 0;i<data.length;i++){
                    console.log(data[i]);
                }
                if(data.count > 0){
                    $('.Defect').html('<span class="badge badge-danger " style="font-size:12px !important">'+data.count+'</span>');
                }
            }
        });

    });
});
//end show times
</script>
</body>
</html>