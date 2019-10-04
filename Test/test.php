
<?php
/////////////////////////////////////////////////////////////////
/// getID3() by James Heinrich <info@getid3.org>               //
//  available at https://github.com/JamesHeinrich/getID3       //
//            or https://www.getid3.org                        //
//            or http://getid3.sourceforge.net                 //
//                                                             //
// /demo/demo.write.php - part of getID3()                     //
// sample script for demonstrating writing ID3v1 and ID3v2     //
// tags for MP3, or Ogg comment tags for Ogg Vorbis            //
//  see readme.txt for more details                            //
//                                                            ///
/////////////////////////////////////////////////////////////////



$TaggingFormat = 'UTF-8';

header('Content-Type: text/html; charset='.$TaggingFormat);
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">';
echo '<html><head><title>getID3() - Sample tag writer</title></head><style type="text/css">BODY,TD,TH { font-family: sans-serif; font-size: 9pt;" }</style><body>';

require_once('../getID3-1.9.18/getid3/getid3.php');
// Initialize getID3 engine
$getID3 = new getID3;
getid3_lib::IncludeDependency(GETID3_INCLUDEPATH.'write.php', __FILE__, true);

$Filename = "../Musique/Gorillaz - Saturnz Barz (feat. Popcaan).mp3";

if (isset($_POST['WriteTags'])) {

	$TagFormatsToWrite = (isset($_POST['TagFormatsToWrite']) ? $_POST['TagFormatsToWrite'] : array());
	if (!empty($TagFormatsToWrite)) {
		echo 'starting to write tag(s)<BR>';

		$tagwriter = new getid3_writetags;
		$tagwriter->filename       = $Filename;
		$tagwriter->tagformats     = $TagFormatsToWrite;
		$tagwriter->overwrite_tags = true;
		$tagwriter->tag_encoding   = $TaggingFormat;

		if (!empty($_FILES['userfile']['tmp_name'])) {
			if (in_array('id3v2.4', $tagwriter->tagformats) || in_array('id3v2.3', $tagwriter->tagformats) || in_array('id3v2.2', $tagwriter->tagformats)) {
				if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
					if ($APICdata = file_get_contents($_FILES['userfile']['tmp_name'])) {

						if ($exif_imagetype = exif_imagetype($_FILES['userfile']['tmp_name'])) {

							$TagData['attached_picture'][0]['data']          = $APICdata;
							$TagData['attached_picture'][0]['picturetypeid'] = $_POST['APICpictureType'];
							$TagData['attached_picture'][0]['description']   = $_FILES['userfile']['name'];
							$TagData['attached_picture'][0]['mime']          = image_type_to_mime_type($exif_imagetype);

						} else {
							echo '<b>invalid image format (only GIF, JPEG, PNG)</b><br>';
						}
					} else {
						echo '<b>cannot open '.htmlentities($_FILES['userfile']['tmp_name']).'</b><br>';
					}
				} else {
					echo '<b>!is_uploaded_file('.htmlentities($_FILES['userfile']['tmp_name']).')</b><br>';
				}
			} else {
				echo '<b>WARNING:</b> Can only embed images for ID3v2<br>';
			}
		}

		$tagwriter->tag_data = $TagData;
		if ($tagwriter->WriteTags()) {
			echo 'Successfully wrote tags<BR>';
			if (!empty($tagwriter->warnings)) {
				echo 'There were some warnings:<blockquote style="background-color: #FFCC33; padding: 10px;">'.implode('<br><br>', $tagwriter->warnings).'</div>';
			}
		} else {
			echo 'Failed to write tags!<div style="background-color: #FF9999; padding: 10px;">'.implode('<br><br>', $tagwriter->errors).'</div>';
		}

	} else {

		echo 'WARNING: no tag formats selected for writing - nothing written';

	}
	echo '<HR>';

}


if (!empty($Filename)) {
	echo '<form action="'.htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES).'" method="post" enctype="multipart/form-data">';
	if (file_exists($Filename)) {

		// Initialize getID3 engine
		$getID3 = new getID3;
		$OldThisFileInfo = $getID3->analyze($Filename);
		getid3_lib::CopyTagsToComments($OldThisFileInfo);
		
		echo $OldThisFileInfo['tags']['id3v2'];
		$ValidTagTypes = ValidTagTypes($OldThisFileInfo);
		
		echo '<b>Write Tags</b>';
		foreach ($ValidTagTypes as $ValidTagType) {
			echo '<input type="checkbox" name="TagFormatsToWrite[]" value="'.$ValidTagType.'"';
			if (count($ValidTagTypes) == 1) {
				echo ' checked="checked"';
			} else {
				switch ($ValidTagType) {
					case 'id3v2.2':
					case 'id3v2.3':
					case 'id3v2.4':
						if (isset($OldThisFileInfo['tags']['id3v2'])) {
							echo ' checked="checked"';
						}
						break;

					default:
						if (isset($OldThisFileInfo['tags'][$ValidTagType])) {
							echo ' checked="checked"';
						}
						break;
				}
			}
			echo '>'.$ValidTagType.'<br>';
		}
		if (count($ValidTagTypes) > 1) {
			echo '<hr><input type="checkbox" name="remove_other_tags" value="1"> Remove non-selected tag formats when writing new tag<br>';
		}
		

		echo '<input type="file" name="userfile" accept="image/jpeg, image/gif, image/png"><br>';
		echo '<select name="APICpictureType">';
		
		$APICtypes = getid3_id3v2::APICPictureTypeLookup('', true);
		foreach ($APICtypes as $key => $value) {
			echo '<option value="'.htmlentities($key, ENT_QUOTES).'">'.htmlentities($value).'</option>';
		}
		echo '</select></td></tr>';
		echo '<input type="submit" name="WriteTags" value="Save Changes"> ';
		echo '<input type="reset" value="Reset">';

	} else {

		echo '<tr><td align="right"><b>Error</b></td><td>'.htmlentities($Filename).' does not exist</td></tr>';

	}
	echo '</table>';
	echo '</form>';

}

echo '</body></html>';


function ValidTagTypes ($OldThisFileInfo)
{
	switch ($OldThisFileInfo['fileformat']) {
		case 'mp3':
		case 'mp2':
		case 'mp1':
			$ValidTagTypes = array('id3v1', 'id3v2.3', 'ape');
			break;

		case 'mpc':
			$ValidTagTypes = array('ape');
			break;

		case 'ogg':
			if (!empty($OldThisFileInfo['audio']['dataformat']) && ($OldThisFileInfo['audio']['dataformat'] == 'flac')) {
				//$ValidTagTypes = array('metaflac');
				// metaflac doesn't (yet) work with OggFLAC files
				$ValidTagTypes = array();
			} else {
				$ValidTagTypes = array('vorbiscomment');
			}
			break;

		case 'flac':
			$ValidTagTypes = array('metaflac');
			break;

		case 'real':
			$ValidTagTypes = array('real');
			break;

		default:
			$ValidTagTypes = array();
			break;
	}

	return $ValidTagTypes;
}









/*
<?php

    require "../Outil/lecteur-liens.php";
	require $require_lecteur_fichier;
	$tabliens = array();
	$tabliens = ScanFichiers('/home/Samba/Test/');
	for($p=0;$p<sizeof($tabliens);$p++)
	{
		echo $tabliens[$p]." - ";
	}
	echo "<br>";

	if($_GET["chgp"]=="chercher")
        {
            if(isset($_POST["searchEngine"]))
            {
                
                $motachercher = $_POST["searchEngine"];
                    
                $tablienss = ChercherFicher($motachercher,'/home/Samba/Test/');
                
			}
			
			for($i=0;$i<sizeof($tablienss);$i++)
			{
				echo "<br>";
				echo "I = ".$i;
				echo $tablienss[$i];
				echo "<br>";
			}
        }

	echo "<br>";
	
?>

<head>
	<link href="https://vjs.zencdn.net/7.6.0/video-js.css" rel="stylesheet">
  
	<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
	<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  </head>
  
  <body>
  <br>
  	<form action="test.php?chgp=chercher" method="post">
                <input type="search" name="searchEngine" placeholder="Recherche..." />
                <input type="submit" value="Valider" />
	</form>

	<br>
	<br>
			
	<video id='my-video' class='video-js' controls preload='auto' width='640' height='264'
	poster='MY_VIDEO_POSTER.jpg' data-setup='{}'>
	  <source src='Video/Ainzawa.mp4' type='video/mp4'>
	  <source src='MY_VIDEO.webm' type='video/webm'>
	  <p class='vjs-no-js'>
		To view this video please enable JavaScript, and consider upgrading to a web browser that
		<a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
	  </p>
	</video>
  
	<script src='https://vjs.zencdn.net/7.6.0/video.js'></script>
  </body>
*/