AJAX通信する方法は、最もシンプルで直感的な実装方法です。

ページの内容を記述するコンテンツファイルとは別に、 <code>*.php</code> 拡張子のAPIプログラムを用意し、これとAJAX通信をして、クライアントサイドJavaScriptで画面の表示を更新する方法です。

<p>この方法では、 コンテンツのHTMLは静的に出力されます。 <code>*.php</code> のAPIプログラムは、プレビュー環境でもパブリッシュ先でも動的に実行されます。 グローバル空間に <code>$paprika</code> が存在するように環境が整えられます。</p>

<p>次の例は、 API <a href="./ajax_paprika_files/apis/sample.php" target="_blank">sample.php</a> から取得したJSONの内容を表示したものです。</p>
<script type="text/javascript">
$(window).on('load', function(e){
    $.ajax({
        'url': './ajax_paprika_files/apis/sample.php',
        'success': function(data, dataType){
            console.log(data, dataType);
            $('.cont-sample').append("DOCUMENT_ROOT: "+data._SERVER.DOCUMENT_ROOT);
        },
        'error': function(XMLHttpRequest, textStatus, errorThrown){
            console.error(XMLHttpRequest, textStatus, errorThrown);
        },
        'complete': function(XMLHttpRequest, textStatus){
            console.log(XMLHttpRequest, textStatus);
        }
    });
})
</script>
<div class="cont-sample"></div>
