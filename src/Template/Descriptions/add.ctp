<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">

<?= $this->html->script('sumoselect/sumoselect.js');?>
<link href="https://yaireo.github.io/tagify/dist/tagify.css" rel="stylesheet">
<?= $this->html->css('jquery-confirm.css');?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.sumoselect/3.0.2/sumoselect.min.css" />
<style>
    .SumoSelect{
        width: inherit !important;
    }
</style>

<div class="container process index large-10 medium-8 columns content">
    <?= $this->Form->create($description) ?>
    
    <fieldset>
        <legend><?= __('Add More Informations') ?></legend> 
        <?php if ($language_id == "1") : ?>
            <style>
            .des_kh,.des_ch{
                display:none;
            }
            </style>   
            <?php elseif ($language_id == "2"):?>  
            <style>
            .des_kh{
                display: none;
            }
            </style>   
            <?php else :?>
            <style>
            .des_ch{
                display: none;
            }
            </style>
        <?php endif; ?>
        <?php
        // dump($description);
        // dump($language);
        // exit();

            echo $this->Form->control('process_id',["options"=>$process_id,"label"=>__("Process")]);
                    // echo $this->Form->control('title',['id'=>"title",'name'=>'title[]',"required"=>"required"]);
                    ?>
                      <div class="form-group">
                <div class="form-row">
                    <div class="col-12 col-sm-12"><label class="col-form-label">Title</label></div>
                    <div class="col">
                        <select multiple="multiple" name='title[]' class="search_title" required>
                            <?php foreach ($position_id as $positions_id):?>
                            <option value="<?php echo $positions_id['id']?>"><?php echo $positions_id['name']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                 <div class="form-row">
                    <span class="selects_title"></span>
                </div>
            </div>
                              <div id="repeater">
                                  <div class="repeater-heading" align="right" style="margin:30px 0px 0px 0px" >
                                      <button type="button" class="btn btn-primary repeater-add-btn"><?=__('Add More Field')?></button>
                                          </div>
                                              <div class="clearfix"></div>
                                                  <div class="items" data-group="programming_languages">
                                              <div class="item-content">
                                         <div class="form-group">
                                      <div class="row">
                                  <div class="col-md-9"> 
                                 <!-- //other information -->
                                <div class="infor">
                                <?php
                            echo $this->Form->control('subjects',['label'=>__("Subjects")]);?>
                        </div>
                    <div class="infor">
                    <?php
                echo $this->Form->control('staffs_id',['label'=>__("Staffs"),"options"=>$user_profiles,'name'=>'staffs_id']);?>
                    </div>
                        <div class="infor">
                        <?php 
                            echo $this->Form->control('tools',["type"=>"text",'name'=>'tools','label'=>__("Tools")]);
                            ?>
                                </div>
                              <!-- //discriptions -->
                                <!-- //En -->
                                    <div class="des_en" >
                                    <?php
                                        echo $this->Form->control('name',["type"=>'textarea','placeholder'=>__('Input Text English'),'label'=>__("English"),"required"=>" required"]);
                                        ?>
                                            </div>
                                                                                                    <!-- //Kh -->
                                                <div class="des_kh" >
                                                <?php 
                                            echo $this->Form->control('name_km_kh',["type"=>'textarea','placeholder'=>__('Input Text Khmer'),'label'=>__("Khmer")]);
                                            ?>
                                        </div>
                                         <!-- //Ch -->
                                    <div class="des_ch" >
                                    <?php 
                                echo $this->Form->control('name_zh_hk',["type"=>'textarea','placeholder'=>__('Input Text Chinese'),'label'=>__("Chinese")]);
                                ?>
                            </div>
                             <!-- //end of discriptions -->
                        <hr style='height:4px;color#0000;'>
                        <!-- //end of other information -->
                  </div>
                   <!-- //button remove -->
              <div style="height:10px;margin:30px;left:40px;top:30px;position:relative">
              <button id="remove-btn" onclick="$(this).parents(\'.items\').remove()" class="btn btn-danger"><?=__('Remove')?></button>
        
              </div>
              <!-- //end of button remove -->
              </div>
              </div>
              </div>
              </div>
              </div>
              <div class="clearfix"></div>
             <?= $this->Form->button(__('Submit')); ?>
    <?= $this->Form->end() ?>
    </fieldset>
    
<script>
  function addCreate(){
       $.confirm({
                            title: 'Add New Tag',
                            content: '' +
                            '<form action="#" method="post" class="formName">' +
                            '<div class="form-group">' +
                            '<input type="text" name="weight" class="weight form-control" required >'+
                            '</div>' +
                            '</form>',
                            buttons: {
                                formSubmit: {
                                    text: '<?php echo __('Submit')?>',
                                    btnClass: 'btn-blue',
                                    action: function () {
                                        var dataValue = this.$content.find('.weight').val();
                                        if(!dataValue){
                                            $.alert('provide a valid name');
                                            return false;
                                        }
                                        $.ajax({
                                           url: '/descriptions/add',
                                            dataType: 'json',
                                            data:{'val':dataValue },
                                            method: 'post',
                                            beforeSend: function(xhr){
                                                xhr.setRequestHeader('X-CSRF-Token', <?= json_encode($this->request->param('_csrfToken')); ?>);
                                            }
                                        }).done(function (jdata) {
                                            console.log(jdata.message);
                                            console.log(jdata.result);

                                           if(jdata.message == 'success'){
                                            $('.search_tags')[0].sumo.add( jdata.result,dataValue,0);
                                            $('.search_tags')[0].sumo.selectItem(0);
                                           }else{
                                               $.alert('Duplicate Label / Tag')
                                           }
                                        });
                                       // $('.'+faction).html(name);
                                       // $('.'+faction).val(name);

                                    }
                                },
                        <?php echo __('Cancel')?>: function () {

                        },
                    },
                        onContentReady: function () {
                            // bind to events
                            var jc = this;
                            this.$content.find('form').on('submit', function (e) {
                                // if the user submits the form by pressing enter in the field.
                                e.preventDefault();
                                jc.$$formSubmit.trigger('click'); // reference the button and click it
                            });
                        }
                    });
   }
 $(document).ready(function() {

$('#summernote').summernote({
    callbacks: {
        onInit: function(contents) {
            console.log(contents);
            $('#summernotesubmit').val(htmlEncode($('#summernote').summernote('code')));
        },
        onChange: function(contents, $editable) {
            console.log('onChange:', contents, $editable);
            $('#summernotesubmit').val(htmlEncode(contents));
        },
        onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable);
        }
    }
});
$('.search_tags').on('change',function(e){
    e.preventDefault();
    console.log($(this).find(":selected").text());
    
     var option_all = $(".search_tags option:selected").map(function () {
        return '<span class="badge badge-secondary">'+$(this).text()+'</span>';
    }).get().join(' ');
   
    $('.selected_tags').html(option_all);
});
$('.search_title').on('change',function(e){
    e.preventDefault();
    console.log($(this).find(":selected").text());
    
     var option_all = $(".search_title option:selected").map(function () {
        return '<span class="badge badge-secondary">'+$(this).text()+'</span>';
    }).get().join(' ');
   
    $('.selects_title').html(option_all);
});        

});

$('.search_test, .search_tags, .search_title').SumoSelect({
        search: true, 
        searchText: 'Enter Here',
        okCancelInMulti: true,
        triggerChangeCombined: true,
        forceCustomRendering: true
    });


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>

<script src="https://yaireo.github.io/tagify/dist/tagify.js"></script>

<?= $this->html->css('bootstrap-toggle/bootstrap-toggle.min.css');?>
<?= $this->html->script('bootstrap-toggle/bootstrap-toggle.min.js');?>

<?= $this->html->script('jquery.vticker.min.js');?>


<?= $this->html->script('jquery-confirm.js');?>
