<?php
if (! function_exists('sanitizeHtml')) {
    /**
     * OUTPUTのコンテンツを変換する
     *
     * @param string $value
     * @return string
     */
    function sanitizeHtml($content){
        $apply_tags = [
              'h1', 'h2', 'h3', 'h4', 'h5','ol','ul','li','em','strong','s',
              'b', 'a', 'img', 'u', 'br','P','span','pre',
              'table', 'tr', 'th', 'td', 'tbody', 'thead'
        ];

        $content = htmlspecialchars($content);
        if (!is_array($apply_tags) || count($apply_tags) == 0 ) return $content;

        foreach($apply_tags as $tag) {
            if (strpos($tag, '/') === false) {
                $content = preg_replace_callback("/&lt;\/?". $tag . "( .*?&gt;|\/?&gt;)/i",function ($matches) {
                        $target_str = $matches[0];
                        $target_str = str_replace("&lt;", "<", $target_str);
                        $target_str = str_replace("&gt;", ">", $target_str);
                        $target_str = str_replace("&quot;", "\"", $target_str);
                        return $target_str;
                    },$content);
            }
        }
        return $content;
    }

    
}