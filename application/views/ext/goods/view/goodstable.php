// <script>

Ext.define('APP.goods.view.GoodsTable', {
    extend: 'Ext.grid.Panel',
    border: false,
    plugins: [
        Ext.create('Ext.grid.plugin.CellEditing', {
            clicksToEdit: 2
        })
    ],
    actionSave: function(){
        console.log(this.store.getUpdatedRecords());
    },
    dockedItems: [{
        xtype: 'toolbar',
        dock: 'top',
        width: 500,
        padding: '2 2 3',
        items: [{
            text: 'Добавить товар'
        },'-',{
            text: 'Сохранить изменения',
        //    handler: parent.actionSave
        },{
            text: 'Сбросить'
        }]
    }],    
    store: Ext.create('APP.store.goods.List'),
    columns: [
        {text: '#', dataIndex: 'id', width: 50, xtype: 'rownumberer'},
        {text: 'Наименование', dataIndex: 'title', flex: 1, editor: 'textfield'},
        <?
        $rules = ORM::factory('rule')->find_all()->as_array();
        foreach ($rules AS $rule) {
        ?>
        {text: '<?= $rule->note ?>', dataIndex: 'rule_<?= $rule->id ?>', width: 150, type: 'float', editor: 'textfield'},
        <?
        }
        ?>
    ],
    initComponent: function(){
        
        var me = this;
        
        Ext.apply(this, {
            dockedItems: [{
                xtype: 'toolbar',
                dock: 'top',
                width: 500,
                padding: '2 2 3',
                items: [{
                    text: 'Добавить товар'
                },'-',{
                    text: 'Сохранить изменения',
                    handler: function(){
                        console.log(me.store.getProxy().update({
                            params: {}
                        }));
                    }
                },{
                    text: 'Сбросить',
                    handler: function(){
                        me.store.clearFilter();
                    }
                }]
            }]
        });
        
        
        this.callParent();
    }
});