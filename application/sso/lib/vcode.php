<?php
namespace application\sso\lib;

// 验证码类
class vcode {
	private $charset = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789'; // 随机因子
	private $code; // 验证码
	private $codelen = 4; // 验证码长度
	private $width = 100; // 宽度
	private $height = 20; // 高度
	private $img; // 图形资源句柄
	private $font; // 指定的字体
	private $fontsize = 14; // 指定字体大小
	private $fontcolor; // 指定字体颜色
	private $filename;
	private $protocol = 'http://';
	                    
	// 构造方法初始化
	public function __construct($codelen=4,$width=100,$height=20,$fontsize=14) {
		$this->codelen = $codelen;
		$this->width = $width;
		$this->height = $height;
		$this->fontsize = $fontsize;
		$this->font = '/opt/lampp/htdocs/hyf_v2.0/application/sso/lib/tahoma.ttf';
	}
	
	// 生成随机码
	private function createCode() {
		$_len = strlen ( $this->charset ) - 1;
		for($i = 0; $i < $this->codelen; $i ++) {
			$this->code .= $this->charset [mt_rand ( 0, $_len )];
		}
	}
	
	// 生成背景
	private function createBg() {
		$this->img = imagecreatetruecolor ( $this->width, $this->height );
		$color = imagecolorallocate ( $this->img, mt_rand ( 157, 255 ), mt_rand ( 157, 255 ), mt_rand ( 157, 255 ) );
		imagefilledrectangle ( $this->img, 0, $this->height, $this->width, 0, $color );
	}
	
	// 生成文字
	private function createFont() {
		$_x = $this->width / $this->codelen;
		for($i = 0; $i < $this->codelen; $i ++) {
			$this->fontcolor = imagecolorallocate ( $this->img, mt_rand ( 0, 156 ), mt_rand ( 0, 156 ), mt_rand ( 0, 156 ) );
			imagettftext ( $this->img, $this->fontsize, mt_rand ( - 30, 30 ), $_x * $i + mt_rand ( 1, 5 ), $this->height / 1.2, $this->fontcolor, $this->font, $this->code [$i] );
		}
	}
	
	// 生成线条、雪花
	private function createLine() {
		for($i = 0; $i < 6; $i ++) {
			$color = imagecolorallocate ( $this->img, mt_rand ( 0, 156 ), mt_rand ( 0, 156 ), mt_rand ( 0, 156 ) );
			imageline ( $this->img, mt_rand ( 0, $this->width ), mt_rand ( 0, $this->height ), mt_rand ( 0, $this->width ), mt_rand ( 0, $this->height ), $color );
		}
		for($i = 0; $i < 100; $i ++) {
			$color = imagecolorallocate ( $this->img, mt_rand ( 200, 255 ), mt_rand ( 200, 255 ), mt_rand ( 200, 255 ) );
			imagestring ( $this->img, mt_rand ( 1, 5 ), mt_rand ( 0, $this->width ), mt_rand ( 0, $this->height ), '*', $color );
		}
	}
	
	// 输出
	private function outPut() {
		$this->filename = md5(request()->header['host'] . request()->header['user-agent'] . time() . rand(1, 100));
//		$uri = '/static/vcode/'.$this->filename.'.png';
        $uri = '/vcode/'.$this->filename.'.png';
		$filepath = app_dir() . 'static' . $uri;
		if (!is_dir(app_dir() . 'static/vcode')) {
            mkdir(app_dir() . 'static/vcode', 0777, true);
        }
		imagepng ( $this->img, $filepath );
		imagedestroy ( $this->img );
		// $GLOBALS['response']->header('Content-Type', 'image/png');
		// $im = file_get_contents($filepath);
		// unlink($filepath);
		// return $im;

		return $this->protocol . request()->header['host'] . $uri;
	}
	
	// 对外生成
	public function doimg() {
		$this->createBg ();
		$this->createCode ();
		$this->createLine ();
		$this->createFont ();
		return $this->outPut ();
	}
	
	// 获取验证码
	public function getCode() {
		return strtolower ( $this->code );
	}

	// 获取验证码的文件名
	public function getFileName() {
		return $this->filename;
	}
}