<?php
$downloadURL = urldecode($_GET['link']);
$type = urldecode($_GET['type']);
$title = urldecode($_GET['title']);
$fileName = $title.'.'.$type;
$hours = floor($video_duration_in_seconds / 3600);
      $minutes = floor(($video_duration_in_seconds / 60) % 60);
      $seconds = $video_duration_in_seconds % 60;

if (!empty($downloadURL) && substr($downloadURL, 0, 8) === 'https://') {
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment;filename=\"$fileName\"");
    header("Content-Transfer-Encoding: binary");

    readfile($downloadURL);

}
