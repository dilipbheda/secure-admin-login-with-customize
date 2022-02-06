<?php session_start();
if ( ! class_exists( 'Secure_Login_Captcha_Code' ) ) {
	class Secure_Login_Captcha_Code {
		/**
		 * Calling public constructor.  
		 */
		public function __construct( $width, $height ) {
			// Generate random string.
			$str = md5( microtime() );
			$str = substr( $str, 0, 6 );
			$_SESSION['captcha'] = $str;
			// Create image using imagecreate function.
			$image = imagecreate( $width, $height );
			// Allocate image background color using imagecolorallocate.
			imagecolorallocate( $image, 255, 255, 255 );
			// Add captcha code font.
			$font = '../fonts/Haziness.ttf';
			// Font color
			$fontcolor = imagecolorallocate( $image, 0, 0, 0 );
			// Image line color.
			$line_color = imagecolorallocate( $image, mt_rand( 0, 255 ), mt_rand( 0, 255 ), mt_rand( 0, 255 ) ); 
			// Image pixel color.
			$pixel_color = imagecolorallocate($image, mt_rand( 0, 255 ), mt_rand( 0, 255 ), mt_rand( 0, 255 ) );
			// Create image line using imageline function.
			for( $i = 0; $i < 10; $i++ ) {
				imageline( $image, 0, mt_rand()%50, 200, mt_rand()%50, $line_color );
			}
			// Set image pixel using imagesetpixel.
			for( $i = 0; $i < 1000; $i++ ) {
				imagesetpixel( $image, mt_rand()%200, mt_rand()%50, $pixel_color );
			}
			// Add text using imagettftext.
			imagettftext ( $image , 30, 10 , 25, 45 , $fontcolor , $font, $str );
			// Set header
			header("Content-type: image/png");
			// Image  type.
			imagepng($image);
			// Destory image using imagedestory function.
			imagedestroy($image);
		}
	}
	new Secure_Login_Captcha_Code( 170, 45 );
}
