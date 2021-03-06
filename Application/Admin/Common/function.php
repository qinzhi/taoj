<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/27
 * Time: 15:56
 */

if(!function_exists('create_editor')){
    function create_editor($id,$value='',$config=array()){
        // Include the CKEditor class.
        include_once "Public/Admin/Ckeditor/ckeditor.php";
        // Create a class instance.
        $CKEditor = new CKEditor( 'http://' . $_SERVER['HTTP_HOST'] . PROJECT_RELATIVE_PATH . '/Public/Admin/Ckeditor/');
        // Path to the CKEditor directory, ideally use an absolute path instead of a relative dir.
        //   $CKEditor->basePath = '/ckeditor/'
        // If not set, CKEditor will try to detect the correct path.

        // Replace a textarea element with an id (or name) of "editor1".

        $_config['filebrowserBrowseUrl'] = PROJECT_RELATIVE_PATH . '/Public/Admin/Ckfinder/ckfinder.html';
        $_config['filebrowserImageBrowseUrl'] = PROJECT_RELATIVE_PATH . '/Public/Admin/Ckfinder/ckfinder.html?Type=Images';
        //$_config['filebrowserUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
        //$_config['filebrowserImageUploadUrl'] = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
        if(!empty($config)){
            $_config = array_merge($_config,$config);
        }
        $CKEditor->editor("describe",$value,$_config);
        //$CKEditor->replace("describe");
    }
}

function get_letter($string) {
    $charlist = mb_str_split($string);
    return implode(array_map("get_first_char", $charlist));
}
function mb_str_split($string) {
    // Split at all position not after the start: ^
    // and not before the end: $
    return preg_split('/(?<!^)(?!$)/u', $string);
}
function get_first_char($s0) {
    $fchar = ord(substr($s0, 0, 1));
    if (($fchar >= ord("a") and $fchar <= ord("z")) or ($fchar >= ord("A") and $fchar <= ord("Z")))
        return strtoupper(chr($fchar));
    $s = iconv("UTF-8", "GBK", $s0);
    $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
    if ($asc >= -20319 and $asc <= -20284)
        return "A";
    if ($asc >= -20283 and $asc <= -19776)
        return "B";
    if ($asc >= -19775 and $asc <= -19219)
        return "C";
    if ($asc >= -19218 and $asc <= -18711)
        return "D";
    if ($asc >= -18710 and $asc <= -18527)
        return "E";
    if ($asc >= -18526 and $asc <= -18240)
        return "F";
    if ($asc >= -18239 and $asc <= -17923)
        return "G";
    if ($asc >= -17922 and $asc <= -17418)
        return "H";
    if ($asc >= -17417 and $asc <= -16475)
        return "J";
    if ($asc >= -16474 and $asc <= -16213)
        return "K";
    if ($asc >= -16212 and $asc <= -15641)
        return "L";
    if ($asc >= -15640 and $asc <= -15166)
        return "M";
    if ($asc >= -15165 and $asc <= -14923)
        return "N";
    if ($asc >= -14922 and $asc <= -14915)
        return "O";
    if ($asc >= -14914 and $asc <= -14631)
        return "P";
    if ($asc >= -14630 and $asc <= -14150)
        return "Q";
    if ($asc >= -14149 and $asc <= -14091)
        return "R";
    if ($asc >= -14090 and $asc <= -13319)
        return "S";
    if ($asc >= -13318 and $asc <= -12839)
        return "T";
    if ($asc >= -12838 and $asc <= -12557)
        return "W";
    if ($asc >= -12556 and $asc <= -11848)
        return "X";
    if ($asc >= -11847 and $asc <= -11056)
        return "Y";
    if ($asc >= -11055 and $asc <= -10247)
        return "Z";
    return null;
}

/**
 * 删除目录下所有文件
 * <br/>
 * @param string $path
 */
function clear_dir($dirname){
    if ($dir = @dir($dirname)) {
        $dir->rewind();
        while ($file = $dir->read()) {
            if (!in_array($file, array('.', '..', '.svn', '.gitignore', 'Thumbs.db'))) {
                if (is_dir($dirname . '/' . $file)) {
                    clear_dir($dirname . '/' . $file);
                    !@rmdir($dirname . '/' . $file);
                } else {
                    !@unlink($dirname . '/' . $file);
                }
            }
        }
        $dir->close();
    }
}



/**
 * 清除无效目录名<br />
 * <br />
 * @param $array
 */
function clear_invalid_dir(&$array){
    if(is_array($array)){
        foreach ($array	as $key => $value){
            switch ($value){
                case '.':
                case '..':
                case '.svn':
                case '.gitignore':
                case 'Thumbs.db':
                    unset($array[$key]);
                    break;
            }
        }
    }
}

/**
 * 扫描目录和文件
 * <br/>
 * @param string $dir_path
 * @param integer $level = 1
 * @param string||method $filter = null
 */
function scan_dir($dir_path, $level = 1, $filter = null){
    $returns	=	array();
    if(is_dir($dir_path)){
        $handle_dir	=	dir($dir_path);
        while($file = $handle_dir->read()){
            if($filter == null){
                if(in_array($file, array('.', '..', '.svn', '.gitignore', 'Thumbs.db'))){
                    continue;
                }
            }
            $returns[]	=	$file;
        }
        $handle_dir->close();
    }
    return $returns;
}

/**
 * 创建目录
 * <br/>
 * @param string $path
 * @param integer $mode = 0755
 */
function create_dir($path, $mode = 0777){
    if( !is_dir($path) ){
        mkdir($path, $mode, TRUE);
    }
}

/**
 * 写入内容到文件(文件不存在则创建)
 * <br/>
 * @param string $path
 * @param string $data
 */
function write_file($file_path, $data, $mode = 0777){
    file_put_contents($file_path,$data);
    @chmod($file_path, $mode);

}

/**
 * 读取文件内容
 * <br />
 * @param string $file_path
 */
function read_file($file_path){
    if(is_file($file_path))
        return file_get_contents($file_path);
    return null;
}

/**
 * 删除路径的文件
 * <br/>
 * @param string $path
 */
function delete_file($file_path){
    if(is_dir($file_path)){
        @rmdir($file_path);
    }elseif(is_file($file_path)){
        @unlink($file_path);
    }
}

/**
 * 删除目录下所有文件
 * <br/>
 * @param string $path
 */
//clear_all_dir($path, array('-less.css'))
function clear_all_dir($dirname, $onlyFileType = null){
    if(strpos($onlyFileType,'php')!= -1) {
        $onlyFileType = null;
    }
    if ($dir = @dir($dirname)) {
        $dir->rewind();
        while ($file = $dir->read()) {
            if (!in_array($file, array('.', '..', '.svn', '.gitignore', 'Thumbs.db'))) {
                if (is_dir($dirname . '/' . $file)) {
                    clear_all_dir($dirname . '/' . $file, $onlyFileType);
                    !@rmdir($dirname . '/' . $file);
                } else {
                    if($onlyFileType !== null) {
                        $type = explode($onlyFileType, $file);
                        if(count($type) == 2 && empty($type[1])){
                            //!@unlink($dirname . '/' . $file);
                        }
                    } else {
                        //!@unlink($dirname . '/' . $file);
                    }
                }
            }
        }
        $dir->close();
    }
}


/**
 * 获取文件夹第一个有效文件
 * @param $dir_path
 */
function get_first_file($dir_path){
    $dirs	=	scan_dir($dir_path);
    clear_invalid_dir($dirs);
    if(count($dirs)>0){
        foreach ($dirs as $value){
            if(!empty($value)){
                return $dir_path.'/'.$value;
            }
        }
    }
    return null;
}