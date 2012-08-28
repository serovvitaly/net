<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Админка 1.0</title>
    
    <link rel="stylesheet" type="text/css" href="/public/extjs-4/resources/css/ext-all.css">
    <script type="text/javascript" src="/public/extjs-4/ext-debug.js"></script>
    
    <script type="text/javascript">
    
        Ext.application({
            name: 'APP',
            appFolder: 'app',
            launch: function(){
                Ext.create('Ext.container.Viewport', {
                    layout: 'fit',
                    items: [
                        Ext.create('APP.view.goods.Main')
                    ]
                });
            }
        });
    
    </script>
    
</head>
<body>
  
</body>
</html>
