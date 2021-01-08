<!DOCTYPE html>
<html>
<head>
  <title>Weather34 Updater/Backup Panel</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
  
  <style type="text/css">
    body{font-family:Arial,Helvetica,sans-serif;line-height:150%;width:60%;min-width:500px;margin:0 auto;background-color:white;color:#f3f4f7;-webkit-appearance:none;font-size:14px}
	a{text-transform:none;text-decoration:none;color:#262830}
	h1{font-size:1.2em;font-weight:500}
	label{display:block;margin-top:10px;-webkit-appearance:none}
  fieldset{border:0;background-color:#262830;margin:10px 0 10px 0;-webkit-appearance:none;-webkit-border-radius:3px;border-radius:3px;
    -webkit-box-shadow:0 1px 1px rgba(0,0,0,.25),0 2px 2px rgba(0,0,0,.2),0 4px 4px rgba(0,0,0,.15);box-shadow:0 1px 1px rgba(0,0,0,.25),0 2px 2px rgba(0,0,0,.2),0 4px 4px rgba(0,0,0,.15);
    -webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
  
  .select{
    background-color:#555;
    -webkit-box-shadow:0 1px 1px rgba(0,0,0,.25),0 2px 2px rgba(0,0,0,.2),0 4px 4px rgba(0,0,0,.15);
    box-shadow:0 1px 1px rgba(0,0,0,.25),0 2px 2px rgba(0,0,0,.2),0 4px 4px rgba(0,0,0,.15);
    -webkit-appearance:none;
    width:350px  ;height:2em;
    font-size:16px;
    padding:5px;
    color:#fff;
    border:0;
  }
    .status{margin:0;margin-top:10px;margin-bottom:10px;padding:10px;font-size:1em;
    border:0;-webkit-border-radius:3px;border-radius:3px;
    background-color:#E0E5EC;
  box-shadow: 6px 6px 6px rgb(163,177,198,0.6), -6px -6px 6px    rgba(255,255,255, 0.5);  
    -webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;color:#444}
	.status--ERROR{background-color:#d87040;color:#fff;font-size:120%}
	.status--SUCCESS{background-color:#01a4b5;font-weight:700;color:#fff;font-size:120%}.small{font-size:.7rem;font-weight:400}
	.form-field{border:0;padding:8px;width:280px;-webkit-appearance:none;-webkit-border-radius:3px;border-radius:3px;}
  .info{margin-top:0;font-size:90%;color:silver}
  .submit{background-color:#01a4b5;border:0;color:#fff;font-size:15px;padding:10px 24px;margin:20px 0 20px 0;text-decoration:none;-webkit-appearance:none;-webkit-border-radius:3px;border-radius:3px}.submit:hover{background-color:#d87040;cursor:pointer;-webkit-appearance:none}.version{color:#555;font-size:70%}orange{color:#01a4b5}blue{color:#01a4b5}blue1{color:#fff;width:30px;background:#d87040;padding:3px;-webkit-border-radius:2px;border-radius:2px}.weather34-box{display:-webkit-box;display:-ms-flexbox;display:flex;position:absolute;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;margin-top:15px}.weather34-box select{background-color:#d87040;color:#fff;padding:12px;width:450px;border:none;font-size:14px;box-shadow:0 5px 25px rgba(0,0,0,.2);-webkit-appearance:none;appearance:none;outline:0}.weather34-box::before{content:"Select";font-family:Arial,Helvetica,sans-serif;position:absolute;top:0;right:0;width:20%;text-align:center;font-size:14px;line-height:45px;color:#fff;background-color:#01a4b5;pointer-events:none;font-weight:400;outline:0;-webkit-border-radius:2px;border-radius:2px}.weather34-box:hover::before{color:rgba(255,255,255,.6);background-color:0}.weather34-box select option{position:relative;padding:30px;background-color:#d87040;-webkit-border-radius:2px;border-radius:2px;margin-top:40px;height:100px;line-height:45px;color:#fff;text-shadow:1px 1px 3px rgba(61,70,77,.2);border:1px solid #01a4b5;-webkit-appearance:none;appearance:none;outline:0}.login-screen{background-color:#262830;padding:20px;border-radius:5px;margin:0 auto}.app-title{text-align:center;color:#ccc;background-color:none}.login-form{text-align:center;background-color:#262830}.control-group{margin-bottom:10px}input{text-align:center;background-color:#777;border:0;border-radius:3px;font-size:16px;font-weight:200;padding:10px 0;width:250px;transition:border .5s;color:#fff;border:2px solid rgba(86,95,103,1);box-shadow:none;margin:0 auto;margin-top:10px}input:focus{border:0;box-shadow:none}.btn{border:2px solid transparent;background:rgba(86,95,103,1);color:#fff;font-size:16px;line-height:25px;padding:10px 0;text-decoration:none;text-shadow:none;border-radius:3px;box-shadow:none;transition:.25s;display:block;width:150px;margin:10px;text-align:center;-webkit-appearance:none}.btn:hover{background-color:rgba(86,95,103,1)}.login-link{font-size:12px;color:#444;display:block;margin-top:12px}.loginformarea{margin:0 auto;text-align:center;background:#262830}white{color:#fff}.input-button,.modal-button{font-size:18px;padding:10px 40px}.input-block input,.input-button,.modal-button{font-family:Arial,sans-serif;border:0}.icon-button,.input-block input,.input-button,.modal-button{outline:0;cursor:pointer}.modal-button{color:#fff;border-radius:5px;background:#01a4b5;width:220px;text-align:center}.modal-button:hover{border-color:rgba(255,255,255,.2);background:rgba(144,177,42,1);color:#f8f8f8}.input-button{color:#7d695e;border-radius:5px;background:#fff}.input-button:hover{background:rgba(144,177,42,1);color:#fff}
	
  incorrect-password{font-weight:500;font-size:14px;color:#d87040}

	.success {position:absolute;background:#01a4b5;width:50%;border-radius:3px;margin: 0 auto;top:10%;font-size:1em;color:#ffffff;padding:10px;}
	.success a{color:#ffffff;font-weight:600}
  </style>
</head>
<body>


<?php
error_reporting(0);
/**
 * The Unzipper extracts .zip or .rar archives and .gz files on webservers.
 * It's handy if you do not have shell access. E.g. if you want to upload a lot
 * of files (php framework or image collection) as an archive to save time.
 * As of version 0.1.0 it also supports creating archives.
 *
 * @author  Andreas Tasch, at[tec], attec.at
 * @license GNU GPL v3
 * @package attec.toolbox
 * @version 4.34
 */
define('VERSION', '4.34 Based on original by Andreas Tasch');

$timestart = microtime(TRUE);
$GLOBALS['status'] = array();

$unzipper = new Unzipper;
if (isset($_POST['dounzip'])) {
  //check if an archive was selected for unzipping
  $archive = isset($_POST['zipfile']) ? strip_tags($_POST['zipfile']) : '';
  $destination = isset($_POST['extpath']) ? strip_tags($_POST['extpath']) : '';
  $unzipper->prepareExtraction($archive, $destination);
}

if (isset($_POST['dozip'])) {
  $zippath = !empty($_POST['zippath']) ? strip_tags($_POST['zippath']) : '.';
  // Resulting zipfile e.g. zipper--2016-07-23--11-55.zip
  $zipfile = 'weather34-backup-' . date("Y-m-d-H-i") . '.zip';
  Zipper::zipDir($zippath, $zipfile);
}

$timeend = microtime(TRUE);
$time = $timeend - $timestart;

/**
 * Class Unzipper
 */
class Unzipper {
  public $localdir = '.';
  public $zipfiles = array();

  public function __construct() {

    //read directory and pick .zip and .gz files
    if ($dh = opendir($this->localdir)) {
      while (($file = readdir($dh)) !== FALSE) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'zip'
          || pathinfo($file, PATHINFO_EXTENSION) === 'gz'
         
        ) {
          $this->zipfiles[] = $file;
        }
      }
      closedir($dh);

      if (!empty($this->zipfiles)) {
        $GLOBALS['status'] = array('info' => 'Weather34 Aurora update files found, ready to use for Update');
      }
      else {
        $GLOBALS['status'] = array('info' => 'No Weather34 Aurora Update .zip found. So only Backup functionality available.');
      }
    }
  }

  /**
   * Prepare and check zipfile for extraction.
   *
   * @param $archive
   * @param $destination
   */
  public function prepareExtraction($archive, $destination) {
    // Determine paths.
    if (empty($destination)) {
      $extpath = $this->localdir;
    }
    else {
      $extpath = $this->localdir . '/' . $destination;
      // todo move this to extraction function
      if (!is_dir($extpath)) {
        mkdir($extpath);
      }
    }
    //allow only local existing archives to extract
    if (in_array($archive, $this->zipfiles)) {
      self::extract($archive, $extpath);
    }
  }

  /**
   * Checks file extension and calls suitable extractor functions.
   *
   * @param $archive
   * @param $destination
   */
  public static function extract($archive, $destination) {
    $ext = pathinfo($archive, PATHINFO_EXTENSION);
    switch ($ext) {
      case 'zip':
        self::extractZipArchive($archive, $destination);
        break;
      
    }

  }

  /**
   * Decompress/extract a zip archive using ZipArchive.
   *
   * @param $archive
   * @param $destination
   */
  public static function extractZipArchive($archive, $destination) {
    // Check if webserver supports unzipping.
    if (!class_exists('ZipArchive')) {
      $GLOBALS['status'] = array('error' => 'Error: Your PHP version does not support unzip functionality.');
      return;
    }

    $zip = new ZipArchive;

    // Check if archive is readable.
    if ($zip->open($archive) === TRUE) {
      // Check if destination is writable
      if (is_writeable($destination . '/')) {
        $zip->extractTo($destination);
        $zip->close();
        $GLOBALS['status'] = array('success' => 'Weather34 Updated successfully');
      }
      else {
        $GLOBALS['status'] = array('error' => 'Error: Directory not writeable by webserver.');
      }
    }
    else {
      $GLOBALS['status'] = array('error' => 'Error: Cannot read Weather34 Update .zip archive.');
    }
  }

  /**
   * Decompress a .gz File.
   *
   * @param $archive
   * @param $destination
   */
  public static function extractGzipFile($archive, $destination) {
    // Check if zlib is enabled
    if (!function_exists('gzopen')) {
      $GLOBALS['status'] = array('error' => 'Error: Your PHP has no zlib support enabled.');
      return;
    }

    $filename = pathinfo($archive, PATHINFO_FILENAME);
    $gzipped = gzopen($archive, "rb");
    $file = fopen($filename, "w");

    while ($string = gzread($gzipped, 4096)) {
      fwrite($file, $string, strlen($string));
    }
    gzclose($gzipped);
    fclose($file);

    // Check if file was extracted.
    if (file_exists($destination . '/' . $filename)) {
      $GLOBALS['status'] = array('success' => 'Weather34 Updated successfully.');
    }
    else {
      $GLOBALS['status'] = array('error' => 'Error unzipping file.');
    }

  }
}

/**
 * Class Zipper
 *
 * Copied and slightly modified from http://at2.php.net/manual/en/class.ziparchive.php#110719
 * @author umbalaconmeogia
 */
class Zipper {
  /**
   * Add files and sub-directories in a folder to zip file.
   *
   * @param string     $folder
   *   Path to folder that should be zipped.
   *
   * @param ZipArchive $zipFile
   *   Zipfile where files end up.
   *
   * @param int        $exclusiveLength
   *   Number of text to be exclusived from the file path.
   */
  private static function folderToZip($folder, &$zipFile, $exclusiveLength) {
    $handle = opendir($folder);

    while (FALSE !== $f = readdir($handle)) {
      // Check for local/parent path or zipping file itself and skip.
      if ($f != '.' && $f != '..' && $f != basename(__FILE__)) {
        $filePath = "$folder/$f";
        // Remove prefix from file path before add to zip.
        $localPath = substr($filePath, $exclusiveLength);

        if (is_file($filePath)) {
          $zipFile->addFile($filePath, $localPath);
        }
        elseif (is_dir($filePath)) {
          // Add sub-directory.
          $zipFile->addEmptyDir($localPath);
          self::folderToZip($filePath, $zipFile, $exclusiveLength);
        }
      }
    }
    closedir($handle);
  }

  /**
   * Backup a folder (including itself).  
   */
  public static function zipDir($sourcePath, $outZipPath) {
    $pathInfo = pathinfo($sourcePath);
    $parentPath = $pathInfo['dirname'];
    $dirName = $pathInfo['basename'];

    $z = new ZipArchive();
    $z->open($outZipPath, ZipArchive::CREATE);
    $z->addEmptyDir($dirName);
    if ($sourcePath == $dirName) {
      self::folderToZip($sourcePath, $z, 0);
    }
    else {
      self::folderToZip($sourcePath, $z, strlen("$parentPath/"));
    }
    $z->close();
    $GLOBALS['status'] = array('success' => 'Created Backup ' . $outZipPath . " ");		
    exit( '<center><div class="success">
    Backup performed and processed successfully!  <a href="console-setup.php"><br>Click Here Return to setup screen</a> <br>	
    '.strtoupper(key($GLOBALS['status']))."<br>" .reset($GLOBALS['status']) .date('jS F Y g:i:a')
  
  );echo "</div></center>";
    }
  }
?>

<p class="status status">
  You are currently in the Aurora Update/Backup Screen  please becareful and ensure you have uploaded the latest update zip file to the template directory <?php echo date('l jS F Y g:i:a'); ?> 
</p>

<form action="" method="POST">
  <fieldset>
    <h1>Weather34 Aurora Updater</h1>
    <label for="zipfile">Select update file you want to use for Updating Template.  <br>example: <blue>aurora-update-02-11-2020.zip</blue></label>
    <select name="zipfile" size="1" class="select">
      <?php foreach ($unzipper->zipfiles as $zip) {
        echo "<option>$zip</option>";
      }
      ?>
    </select>
    <label for="extpath">Update path (optional):</label>
    <input type="text" name="extpath" class="form-field" />
    <p class="info">Please leave empty current template directory will be used.</p>
    <input type="submit" name="dounzip" class="submit" value="Update Weather34 Template"/>
  </fieldset>

  <fieldset>
    <h1>Weather34 Backup</h1>
    <label for="zippath">Backup File Path (optional):</label>
    <input type="text" name="zippath" class="form-field" />
    <p class="info">Please leave empty current directory will be used and back up will be created in this directory</p>
    <input type="submit" name="dozip" class="submit" value="Back Up Weather34 Template"/>
  </fieldset>
</form>

<p class="status status--<?php echo strtoupper(key($GLOBALS['status'])); ?>">
  Status: <?php echo reset($GLOBALS['status']); ?><br/>
  <span class="small">Processing Time: <?php echo $time; ?> seconds</span>
</p>

<p class="version">Version: Weather<blue>34</blue> <?php echo VERSION; ?></p>
</body>
</html>