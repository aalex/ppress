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
	<script type="text/javascript">
		$(document).ready(function() {
			$('.toggle').hide();

			$('.bloglink').click(function () {
				$('.toggle').hide();
				var container = $(this).attr('href');
				container = container.substr(container.indexOf('#')+1);

				$('.toggle.' + container).show();
			});

            /** clicks on the first a#bloglink in the page. */
			$('.bloglink:first').click();
		});
	</script>
</head>
<body>

<div id="header">
    <div id="title">
        <h1><a href="index.html">It's Chinese To Me</a></h1>
        <h2>A visual decoder for women's blogs</h2>
    </div>
    
    <div class=topnav>
        <a class="bloglink" href="#about">About</a>
     </div>
</div>
     
<div id="blogmenu">
	<ul>
		<?php foreach ($this->blogs as $blog_id => $blog): ?>
			<li class="bloginfo">
				<a class="bloglink" href="#blog<?php echo $blog_id ?>"><img src="images/blogger<?php echo $blog_id ?>.jpg"/></a>
				<span class="toggle blog<?php echo $blog_id ?> bloggerbio">
                    <p>
					<?php echo $blog['intro'] ?>
                    </p>
				</span>
			</li>
		<?php endforeach; ?>
	</ul>
</div>

<div class="colmask fullpage chinese">
    <div class="col1">
    <div class="toggle about"> <!-- FIXME there is no way to come back to this -->
        <p>Fill me with info about the project.</p>
        <p>&gt;Choose a blogger above</p>
    </div>
    <?php foreach ($this->blogs as $blog_id => $blog): ?>
		<div class="toggle blog<?php echo $blog_id ?>">
        <?php $post = $blog["posts"][0]; ?>
        <?php foreach ($post["words"] as $word): ?>
            <?php 
            $text = $word["text"]; 
            $local = $word["local"]; 
            $url = $word["url"]; 
            $width = $word["width"]; 
            $height = $word["height"]; 
            if ($text):
            ?>
            <span class="ppword">
				<?php if ($local): /* if there is an image to show */?>
					<a href="<?php echo $url ?>" class="ppimage">
						<img src="<?php echo $local; ?>" width="<?php echo $width?>" height="<?php echo $height?>" />
					</a>
                <?php else: ?>
                    <span class="noimage">&nbsp;</span>
				<?php endif; ?>
                <span class="pptext">
                    <?php echo $text; ?>
                </span>
            </span>
            <?php endif; ?>
        <?php endforeach; ?>
		</div>
    <?php endforeach; ?>
    </div>
</div>

<div id="footer">
    <p><!-- All images are licensed under the Creative Commons License for their respective owner. --> </p>
</div>

</body>
</html>
