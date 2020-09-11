<?php
function acak($panjang){
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
        $pos = rand(0, strlen($karakter)-1);
        $string .= $karakter{$pos};
    }
    return $string;
}

function upload_file($file,$path){
  if($_FILES[$file]['name']!=""){
  	$ekstensi_diperbolehkan	= array('png','jpg','jpeg','xlxx','doc','docx','pdf');
  	$nama_file=$_FILES[$file]['name'];
  	$x = explode('.', $nama_file);
  	$ekstensi = strtolower(end($x));
  	$ukuran	= $_FILES[$file]['size'];
  	$file_tmp = $_FILES[$file]['tmp_name'];

  	$nama = acak(26).'.'.$ekstensi;

  	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
  	    if($ukuran < 5220350){			//5 MB
  			move_uploaded_file($file_tmp, $path.''.$nama);

  			return $nama;
  		}
  		else{
  			echo "Ukuran terlalu besar";
  		}
  	}
  	else{
  		echo "File tidak diijinkan";
  	}
  }
}

function crop_image($path){
  if($_FILES['image']['name']!=""){
      $image = $_FILES;
      $NewImageName = rand(4,10000)."-". $image['image']['name'];
      $destination = realpath($path).'/';
      move_uploaded_file($image['image']['tmp_name'], $destination.$NewImageName);
      // $image = imagecreatefromjpeg($destination.$NewImageName);
      $image = imagecreatefromstring(file_get_contents($destination.$NewImageName));
      $filename = $destination.$NewImageName;

      $thumb_width = 800;
      $thumb_height = 600;

      $width = imagesx($image);
      $height = imagesy($image);

      $original_aspect = $width / $height;
      $thumb_aspect = $thumb_width / $thumb_height;

      if ( $original_aspect >= $thumb_aspect )
      {
         // If image is wider than thumbnail (in aspect ratio sense)
         $new_height = $thumb_height;
         $new_width = $width / ($height / $thumb_height);
      }
      else
      {
         // If the thumbnail is wider than the image
         $new_width = $thumb_width;
         $new_height = $height / ($width / $thumb_width);
      }

      $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

      // Resize and crop
      imagecopyresampled($thumb,
                         $image,
                         0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                         0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                         0, 0,
                         $new_width, $new_height,
                         $width, $height);
      imagejpeg($thumb, $filename, 80);

      return $NewImageName;
    }
  }

?>