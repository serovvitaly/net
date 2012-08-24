(function( $ ){
    
    /**
    * Ajax Editor
    */
    $.fn.editor = function(options){
        
        var opt = {
            button_save  : '#editor-save',
            button_clear : '#editor-clear'
        }
        
        if (options) {
            $.extend(opt, options);
        }
        
        var me = this;
        
        me.data = [];
        
        me.edit_start = function(el){
            
            el.current_value = $(el).html();
            
            el.el_id  = $(el).attr('id');
            el.el_mix = el.el_id.split('-');
            
            el.good = el.el_mix[2];
            el.rule = el.el_mix[3];
            
            me.data.push({
                good : el.good, 
                rule : el.rule, 
                before_price : el.current_value,
                element: el 
            })
            
            $(el).after('<input type="text" class="f-editor" style="width:90px; margin:0; padding:0; text-align:right;" id="f-editor-'+el.good+'-'+el.rule+'" value="' + el.current_value + '" />');
            
            $(el).hide();
        }
        
        me.edit_stop_all  = function(){
            
            this.good = el.el_mix[2];
            this.rule = el.el_mix[3];
            
            $.each(me.data, function(index, item){
                $(item.element).addClass('red');
            });
            
            $('.f-editor').remove();
            me.show();
            
        }
        
        me.editor_element = '';
        
        me.result = this.each(function(){
            
            
            $(this).dblclick(function(){
                me.edit_stop_all();
                me.edit_start(this);
            });
            
            
        });
        
        $(opt.button_save).click(function(){
            me.edit_stop_all();
            alert('SAVE');
            return false;
        });
        
        $(opt.button_clear).click(function(){
            
            if (confirm('Хотите сбросить?')) {
                alert('CLEAR');
            }
            
            return false;
            
        });
        
        return me.result;
        
    };
    
})(jQuery);