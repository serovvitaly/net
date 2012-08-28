// <script>

Ext.define('APP.view.goods.Main', {
    extend: 'Ext.panel.Panel',
    layout: 'border',
    border: false,
    items: [{
        region: 'west',
        width: 300,
        minSize: 200,
        maxSize: 400,
        split: true,
        collapsible: true,
        title: 'Каталог'
    },{
        region: 'center',
        title: 'Товары',
        layout: 'fit',
        items: [
            Ext.create('APP.goods.view.GoodsTable')
        ]
    }]
});