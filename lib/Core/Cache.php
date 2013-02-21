<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-1-18
 * Time: 下午4:31
 */
class DDCache
{
    public $CacheDir;

    public function __construct($cache_dir = '')
    {
        if (empty($cache_dir)) {
            $cache_dir = DD::C('cache.cache_dir');
            if ($cache_dir) {
                if ($cache_dir && substr($cache_dir, 0, 1) != '/') {
                    $cache_dir = "/" . $cache_dir;
                }
                if (is_dir(__ROOT__ . $cache_dir)) {
                    $this->CacheDir = __ROOT__ . $cache_dir;
                } elseif (mkdir(__ROOT__ . $cache_dir)) {
                    $this->CacheDir = __ROOT__ . $cache_dir;
                } else {
                    DD::ShowErr(DD::Lang("CANNOT_CREATE_CACHE_DIR"));
                }
            } else {
                DD::ShowErr(DD::Lang("NO_DEFINED_CACHE_DIR"));
            }
        }
    }

    public function set($key, $value, $expire = 0)
    {
        if (!empty($key) && !empty($value)) {
            $f = $this->CacheDir . "/" . urlencode($key) . ".dd_cache";
            $data = array(
                'value' => $value,
                'expire' => intval($expire),
                'time' => time(),
            );
            $rs = file_put_contents($f, serialize($data));
            if ($rs) {
                return true;
            } else {
                DD::ShowErr(Lang("FILE_WRITE_FAILED"));
            }
        } else {
            return false;
        }
    }

    public function get($key)
    {
        if (!empty($key)) {
            $f = $this->CacheDir . "/" . urlencode($key) . ".dd_cache";
            if (file_exists($f) && is_readable($f)) {
                $data = unserialize(file_get_contents($f));
                if (!empty($data) && ((time() - $data['time']) <= $data['expire'] || $data['expire'] === 0)) {
                    return $data['value'];
                }
            }
        }
        return null;
    }

    public function del($key)
    {
        if (!empty($key)) {
            $f = $this->CacheDir . "/" . urlencode($key) . ".dd_cache";
            if (file_exists($f) && unlink($f)) {
                return true;
            }
        }
        return false;
    }
}
