<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="">
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $description; ?>">
        <meta name="keywords" content="<?php echo $keyword; ?>">

        <meta property="og:url"        content="<?php echo $og_url; ?>" />
        <meta property="og:type"       content="<?php echo $og_type; ?>" />
        <meta property="og:title"      content="<?php echo $og_title; ?>" />
        <meta property="og:description"content="<?php echo $og_description; ?>" />
        <meta property="og:image"      content="<?php echo $og_image; ?>" />

        <link rel="shortcut icon" href="<?php echo base_url() . "assets/dst/icon/dst999.ico" ?>" />
        <base href="<?php echo $base_url; ?>" />
        <?php
        foreach ($meta_data as $name => $content) {
            if (!empty($content))
                echo "<meta name='$name' content='$content'>" . PHP_EOL;
        }

        foreach ($stylesheets as $media => $files) {
            foreach ($files as $file) {
                $url = starts_with($file, 'http') ? $file : base_url($file);
                echo "<link href='$url' rel='stylesheet' media='$media'>" . PHP_EOL;
            }
        }

        foreach ($scripts['head'] as $file) {
            $url = starts_with($file, 'http') ? $file : base_url($file);
            echo "<script src='$url'></script>" . PHP_EOL;
        }
        ?>

    </head>