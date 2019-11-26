<?php
/**
 * Paprika `config.php`
 */
return call_user_func( function(){

	// initialize

	/** コンフィグオブジェクト */
	$conf = new stdClass;

	// Plugins
	$conf->prepend = [
		function( $paprika ){
			$pdo = new \PDO(
				'sqlite:'.$paprika->env()->realpath_homedir.'_database.sqlite',
				null, null,
				array(
					\PDO::ATTR_PERSISTENT => false, // ←これをtrueにすると、"持続的な接続" になる
				)
			);
			$paprika->add_custom_method('pdo', function() use ($pdo){
				return $pdo;
			});
		},
	];

	return $conf;
} );
