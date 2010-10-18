<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US">
<head>
    <title>It's Chinese To Me</title>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
    <meta name="description" content="Chinese women bloggers in translation" />
    <meta name="keywords" content="Chinese,women,bloggers,translation,net,art" />
    <meta name="robots" content="index, follow" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <link href="css/single_column.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
    <script src="js/picturepress.js" type="text/javascript"></script>
</head>
<body>

<div id="header">
    <div id="title">
        <h1><a href="index.html">It's Chinese To Me</a></h1>
        <h2>A visual decoder for women's blogs</h2>
    </div>
    
    <div class=topnav>
        <a href="index.php">about</a> / <a href="index.php">contact</a>
     </div>
</div>
     
<div id="blogmenu">
    <ul>
        <li><a href="blogger1.html"><img src="images/blogger1.jpg"/></a></li>
        <li><a href="blogger2.html"><img src="images/blogger2.jpg"/></a></li>
        <li><a href=""><img src="images/blogger3.jpg"/></a></li>
        <li><a href=""><img src="images/blogger4.jpg"/></a></li>
    </ul>
</div>

<div class="colmask fullpage chinese">
    <div class="col1">
        <p>Fill me with info about the project.</p>
        <p>&gt;Choose a blogger above</p>
    <?php foreach ($this->blogs as $blog_id => $blog): ?>
        <?php $post = $blog["posts"][0]; ?>
        <?php foreach ($post["words"] as $word): ?>
            <?php 
            $text = $word["text"]; 
            $local = $word["local"]; 
            $url = $word["url"]; 
            $width = $word["width"]; 
            $height = $word["height"]; 
            ?>
            <span class="ppword">
                <span class="pptext">
                    <?php echo $text; ?>
                </span>
				<?php if ($local): ?>
					<a href="<?php echo $url ?>" class="ppimage">
						<img src="<?php echo $local; ?>" width="<?php echo $width?>" height="<?php echo $height?>" />
					</a>
				<?php endif; ?>
            </span>
        <?php endforeach; ?>
    <?php endforeach; ?>
    </div>
</div>

<div id="footer">
    <p><!-- All images are licensed under the Creative Commons License for their respective owner. --> </p>
</div>

</body>
</html>
