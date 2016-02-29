<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="../jquery.emojiarea.css">
        <link rel="stylesheet" href="stylesheet.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="../jquery.emojiarea.js"></script>
        <script src="../packs/basic/emojis.js"></script>
        <script type="text/javascript">
            
            * {
    margin: 0;
    padding: 0;
}
body {
    font-family: Helvetica, arial, sans-serif;
    font-size: 13px;
    font-weight: 300;
    padding: 100px;
    -webkit-font-smoothing: antialiased;
}
h2, h3, h4 {
    font-weight: normal;
}
h1, h2, h3, h4, p, form {
    margin: 0 0 15px 0;
}
textarea, .emoji-wysiwyg-editor {
    width: 100%;
    height: 100px;
    border: 1px solid #d0d0d0;
    padding: 15px;
    font-size: 13px;
    font-family: Helvetica, arial, sans-serif;
    font-weight: normal;
    border-radius: 3px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.1);
    -moz-box-shadow: inset 0 1px 1px rgba(0,0,0,0.1);
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.1);
    -webkit-font-smoothing: antialiased;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.example {
    position: relative;
}
.value {
    background: #f8f8f8;
    box-shadow: inset 0 1px 2px rgba(0,0,0,0.2);
    border-radius: 3px;
    padding: 15px;
}   
        </script>
    </head>
    <body>
        <h1>jquery.emojiarea.js Example</h1>
        
        <div class="example">
            <h2>Plain-Text</h2>
            <form><textarea rows="5" class="emojis-plain">Hello :neckbeard:</textarea></form>
        </div>
        
        <div class="example">
            <h2>WYSIWYG</h2>
            <form><textarea rows="5" class="emojis-wysiwyg">Hello :neckbeard:</textarea></form>
            <h3>Value:</h3>
            <div class="value"><pre id="emojis-wysiwyg-value"></pre></div>
        </div>
        
        <script>
        $('.emojis-plain').emojiarea({wysiwyg: false});
        
        var $wysiwyg = $('.emojis-wysiwyg').emojiarea({wysiwyg: true});
        var $wysiwyg_value = $('#emojis-wysiwyg-value');
        
        $wysiwyg.on('change', function() {
            $wysiwyg_value.text($(this).val());
        });
        $wysiwyg.trigger('change');
        </script>
    </body>
</html>