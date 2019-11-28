<?php
/**
 * Paprika `config.php`
 */
return call_user_func( function(){

	// initialize

	/** コンフィグオブジェクト */
	$conf = new stdClass;

	// ログ関連

	/** ログ出力先ディレクトリ */
	$conf->realpath_log_dir = __DIR__.'/logs/';

	/** 
	 * 出力するログレベル
	 * ここに指定したレベル以上の情報がログファイルに出力されます。
	 * none, fatal, error, warn, info, debug, trace, all のいずれかを指定できます。
	 * デフォルトは all レベルです。
	 */
	$conf->log_reporting = 'warn';


	// データベース接続関連
	$conf->db = new stdClass;
	$conf->db->connection = 'sqlite';
	$conf->db->host = null;
	$conf->db->port = null;
	$conf->db->database = __DIR__.'/_database.sqlite';
	$conf->db->username = null;
	$conf->db->password = null;
	$conf->db->prefix = null;

	// Plugins
	$conf->prepend = [
		function( $paprika ){
		},
	];

	return $conf;
} );
