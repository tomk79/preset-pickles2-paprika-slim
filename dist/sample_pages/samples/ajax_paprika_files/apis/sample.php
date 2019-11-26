<?php
// chdir
chdir(__DIR__);

// autoload.php をロード
$tmp_path_autoload = __DIR__;
while(1){
    if( is_file( $tmp_path_autoload.'/vendor/autoload.php' ) ){
        require_once( $tmp_path_autoload.'/vendor/autoload.php' );
        break;
    }

    if( $tmp_path_autoload == dirname($tmp_path_autoload) ){
        // これ以上、上の階層がない。
        break;
    }
    $tmp_path_autoload = dirname($tmp_path_autoload);
    continue;
}
unset($tmp_path_autoload);

$paprika = new \picklesFramework2\paprikaFramework\fw\paprika(json_decode('{"file_default_permission":"775","dir_default_permission":"775","filesystem_encoding":"UTF-8","session_name":"PXSID","session_expire":1800,"directory_index":["index.html"],"realpath_controot":"../../../../","realpath_homedir":"../../../../paprika-files/","path_controot":"/","realpath_files":"./sample_files/","realpath_files_cache":"../../../../common/px_resources/c/sample_pages/samples/ajax_paprika_files/apis/sample_files/"}'), false);

// コンテンツが標準出力する場合があるので、それを拾う準備
ob_start();

// コンテンツを実行する
// クロージャーの中で実行
$execute_php_content = function()use($paprika){
?>
<?php
// AJAX API の実装サンプル
@header('Content-type: text/json');

$obj = array();
$obj['_SERVER'] = $_SERVER;
$obj['paprika'] = $paprika;
$obj['paprikaConf'] = array(
    'undefined'=>$paprika->conf('undefined'),
    'sample1'=>$paprika->conf('sample1'),
    'sample2'=>$paprika->conf('sample2'),
    'sample3'=>$paprika->conf('sample3'),
);
$obj['realpath_current_dir'] = $paprika->fs()->get_realpath('./');
echo json_encode( $obj );
exit;
?><?php
};
$execute_php_content();
$content = ob_get_clean();
if(strlen($content)){
    $paprika->bowl()->put($content);
}
echo $paprika->bowl()->bind_template();
exit;
?>
