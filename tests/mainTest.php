<?php
/**
 * Test for pickles2/px2-paprika
 */

class mainTest extends PHPUnit_Framework_TestCase{

	/**
	 * setUp
	 */
	public function setUp(){
		$this->fs = new \tomk79\filesystem();

		require_once(__DIR__.'/helper/builtinserver.php');
		start_builtin_server();
	}

	/**
	 * tearDown
	 */
	public function tearDown(){
	}

	/**
	 * プレビュー表示時のテスト
	 */
	public function testPublish(){
		// Pickles 2 パブリッシュを実行
		$output = $this->passthru( [
			'php',
			__DIR__.'/../src_px2/.px_execute.php' ,
			'/?PX=publish.run' ,
		] );

		// トップページのソースコードを検査
		$indexHtml = $this->fs->read_file( __DIR__.'/../dist/index.html' );
		// var_dump($indexHtml);
		$this->assertTrue( !!preg_match('/\<title\>ホーム \| Pickles 2 Paprika Slim\<\/title\>/si', $indexHtml) );

	}//testPublish()

	/**
	 * プレビュー表示時のテスト
	 */
	public function testMain(){

		$client = new \GuzzleHttp\Client([
			'base_uri' => 'http://'.WEB_SERVER_HOST.':'.WEB_SERVER_PORT.'/',
			'timeout'  => 2.0,
		]);
		$response = $client->get('/', []);
		$this->assertEquals($response->getStatusCode(), 200);
		$this->assertTrue( !!preg_match('/\<title\>ホーム \| Pickles 2 Paprika Slim\<\/title\>/si', $response->getBody()) );

	}//testMain()




	/**
	 * コマンドを実行し、標準出力値を返す
	 * @param array $ary_command コマンドのパラメータを要素として持つ配列
	 * @return string コマンドの標準出力値
	 */
	private function passthru( $ary_command ){
		$cmd = array();
		foreach( $ary_command as $row ){
			$param = '"'.addslashes($row).'"';
			array_push( $cmd, $param );
		}
		$cmd = implode( ' ', $cmd );
		ob_start();
		passthru( $cmd );
		$bin = ob_get_clean();
		return $bin;
	}// passthru()

}
