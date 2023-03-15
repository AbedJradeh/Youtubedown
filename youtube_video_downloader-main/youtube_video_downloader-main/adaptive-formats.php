<h3>YouTube Videos Adaptive Formats</h3>
<table class="striped">
    <tr>
        <th>Quality</th>
        <th>Type</th>
        <th>Download</th>
    </tr>
            <?php
            foreach ($adaptiveFormats as $format) {
                try {
                    $url = $format->url;
                } catch (Exception $e) {
                    $signature = $format->signatureCipher;
                    parse_str(parse_url($signature, PHP_URL_QUERY), $parse_signature);
                    $url = $parse_signature['url'];
                }
                ?>
                <tr>
        <td><?php if(@$format->qualityLabel) echo $format->qualityLabel; else echo "Unknown"; ?></td>
        <td><?php if(@$format->mimeType) echo explode(";",explode("/",$format->mimeType)[1])[0]; else echo "Unknown";?></td>
        <td><a
            href="./scripts/download_video.php?link=<?php print urlencode($url)?>&title=<?php print urlencode($title)?>&type=<?php if($format->mimeType) echo explode(";",explode("/",$format->mimeType)[1])[0]; else echo "mp4";?>">Download
                </a></td>
    </tr>
            <?php }?>
</table>