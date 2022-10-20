if($config['photo']['photo_static'][$type]['removeCacheThumb'])
{
	/* Xóa Cache Thumb */
	removeCacheThumb("../upload!@#cache");
}

/* Xóa Cache */
function recursiveRemove(string $path)
{
    if (is_dir($path)) {
        foreach (scandir($path) as $entry) {
            if (!in_array($entry, ['.', '..'], true)) {
                recursiveRemove($path . DIRECTORY_SEPARATOR . $entry);
            }
        }
        rmdir($path);
    } else {
        unlink($path);
    }
}
function removeCacheThumb($dir)
{
    if (is_dir($dir)) {
        $structure = glob(rtrim($dir, "/") . '/*');
        if (is_array($structure)) {
            foreach ($structure as $file) {
                if (is_dir($file)) recursiveRemove($file);
                else if (is_file($file)) @unlink($file);
            }
            copy("../upload/.htaccess", "../upload!@#cache/.htaccess");
        }
    }
}