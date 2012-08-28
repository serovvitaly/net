// <script>

<?
$rules = ORM::factory('rule')->find_all()->as_array();
foreach ($rules AS $rule) {
    $ruu[] = 'rule_' . $rule->id;
}
?>

Ext.define('APP.store.goods.List', {
    extend: 'Ext.data.Store',
    fields: ['id', 'title', '<?= implode('\',\'', $ruu) ?>'],
    proxy: {
        type: 'ajax',
        url: '/data/goods_list',
        reader: {
            type: 'json',
            root: 'goods'
        }
    },
    autoLoad: true
});