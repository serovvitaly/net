<script type="text/javascript">
var editor_data = [];
</script>


<div class="container-fluid" style="margin-top: 20px;">

<div class="btn-group" style="margin-bottom: 10px; text-align: right;">
  <a href="#" class="btn btn-small btn-success" onclick="return false;">Добавить элемент</a>
  <a href="#" id="editor-save"  class="btn btn-small btn-primary">Сохранить</a>
  <a href="#" id="editor-clear" class="btn btn-small">Сбросить</a>
</div>
      
  <div class="tabbable tabs-left row-fluid">
      <ul class="nav nav-tabs span2">
        <li class="active"><a href="#lA" data-toggle="tab">Список товаров</a></li>
        <li class=""><a href="#lB" data-toggle="tab">Section 2</a></li>
        <li class=""><a href="#lC" data-toggle="tab">Section 3</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="lA">
          <!-- -->
          
          <table class="table table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>#</th>
                  <th>Наименование</th>
                  <?
                  foreach ($rules AS $rule) {
                  ?>
                  <th style="text-align: right;"><?= $rule->note ?></th>
                  <?
                  }
                  ?>
                </tr>
              </thead>
              <tbody>
              <?
              if ($goods) {
                  foreach ($goods AS $good) {
              ?>
                <tr>
                  <td><a href="#" title="Развернуть" class="collapser"><i class="icon-plus"></i></a></td>
                  <td><?= $good->id ?></td>
                  <td><?= $good->title ?></td>
                  <?
                  foreach ($rules AS $rule) {
                  ?>
                  <td style="text-align: right;"><span class="s-editor" id="s-editor-<?= $good->id ?>-<?= $rule->id ?>"><?= number_format($good->prices->where('rule_id', '=', $rule->id)->find()->price, 2) ?></span></td>
                  <?
                  }
                  ?>
                </tr>
              <?
                  }
              }
              ?>              
              </tbody>
          </table>
          <!-- -->
        </div>
        <div class="tab-pane" id="lB">
          <p>Howdy, I'm in Section B.</p>
        </div>
        <div class="tab-pane" id="lC">
          <p>What up girl, this is Section C.</p>
        </div>
      </div>
  </div>
      
</div>

<script type="text/javascript" src="/public/jquery/plugins/collection.js"></script>

<script type="text/javascript">
$('.s-editor').editor();

$('.collapser').click(function(){
    alert('exp');
});    
    
/*$('.s-editor').dblclick(function(){
    $('.s-editor').show();
    $('.f-editor').remove();
    
    this.el_id  = $(this).attr('id');
    this.el_mix = this.el_id.split('-');
    
    this.good = this.el_mix[2];
    this.rule = this.el_mix[3];
    
    this.current_value = $(this).html();
    
    console.log(editor_data);
    
    editor_data.push({
        good : this.good, 
        rule : this.rule, 
        before_price : this.current_value, 
    })
    
    
    $(this).hide();
    $(this).after('<input type="text" class="f-editor" style="width:100px; margin:0; padding:0; text-align:right;" id="f-editor-" value="' + this.current_value + '" />')
           .change(function(el){console.log(el)})
    ;
});*/
</script>