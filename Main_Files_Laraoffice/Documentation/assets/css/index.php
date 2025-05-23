<?php
include('config.php');
?>
<html lang="en-us">
<head>
	<meta charset="utf-8">	
	<title>LaraOffice</title>
	<link rel="icon" type="image/png" sizes="50x50" href ="assets\images\fav-icon.png">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="copyright" content="">
	<link rel="stylesheet" href="assets/css/font-awesome-4.7.0/css/font-awesome.min.css" media="all">
	<link rel="stylesheet" href="assets/css/documenter_style.css" media="all">

	
	<script src="assets/js/jquery.js"></script>	
	<script src="assets/js/jquery.scrollTo.js"></script>
	<script src="assets/js/jquery.easing.js"></script>	

	<script>document.createElement('section');var duration='500',easing='swing';</script>
	<script src="assets/js/script.js"></script>	

	<style>
		html{background-color:white;color:black;}
		::-moz-selection{background:#444444;color:#000000;}
		::selection{background:#444444;color:#000000;}
		#documenter_sidebar #documenter_logo{background-image:url();}
		a{color:#0000FF;}
		.btn {
			border-radius:3px;
		}
		.btn-primary {
			  background-image: -moz-linear-gradient(top, #0088CC, #0044CC);
			  background-image: -ms-linear-gradient(top, #0088CC, #0044CC);
			  background-image: -webkit-gradient(linear, 0 0, 0 0088CC%, from(#000000), to(#0044CC));
			  background-image: -webkit-linear-gradient(top, #0088CC, #0044CC);
			  background-image: -o-linear-gradient(top, #0088CC, #0044CC);
			  background-image: linear-gradient(top, #0088CC, #0044CC);
			  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0088CC', endColorstr='#0044CC', GradientType=0);
			  border-color: #2fd5e6 #2fd5e6 #2fd5e6;
			  color:#FFFFFF;
		}
		.btn-primary:hover,
		.btn-primary:active,
		.btn-primary.active,
		.btn-primary.disabled,
		.btn-primary[disabled] {
		  border-color: #2fd5e6 #2fd5e6 #2fd5e6;
		  background-color: #0044CC;
		}
		hr{border-top:1px solid #534051;border-bottom:1px solid #534051;}

		#documenter_sidebar, #documenter_sidebar ul a{
			/*background-color:#534051;*/
			background-color: #3c8dbc;
			color:#ffffff;
		}

		#documenter_sidebar ul a:hover {
   			background: #ffffff !important;
    		color: #b8c7ce !important;
    		border-top: 1px solid #b8c7ce !important;
    	}

		#documenter_sidebar ul a{-webkit-text-shadow:1px 1px 0px #000000;-moz-text-shadow:1px 1px 0px #000000;text-shadow:1px 1px 0px #000000;}
		#documenter_sidebar ul{border-top:1px solid #534051;}
		#documenter_sidebar ul a{border-top:1px solid #ff;border-bottom:1px solid #534051;color:#ffffff;}
		#documenter_sidebar ul a:hover{background:#dd4b39;color:#000000;border-top:1px solid #dd4b39;}
		#documenter_sidebar ul a.current{
			/*background:#dd4b39;*/
			background: #ffffff;
			/*color:#000000;*/
			color:#3c8dbc;
			/*border-top:1px solid #dd4b39;*/
			border-top:1px solid #3c8dbc;
		}
		#documenter_copyright{display:block !important;visibility:visible !important;}


		h1 {
			color:#3c8dbc;
			font-family:Georgia;
		}
		h3 {
			color: #3c8dbc;
			font-family:Comic Sans MS;
		}
		h6 {
			font-family:Lucida Sans Unicode;
		}
		h5 {
			color: #3c8dbc;
			font-family:Lucida Sans Unicode;
		}
		h4 {
			color: #3c8dbc;
		}
		h6.black{
			color: #222;
		}

		h6.blue{
			color: #1039ce;
		}
		h6.paleblue{
			color: #3c8dbc;
		}
		h5.blue{
			color: #1039ce !important;
		}

		.btn-xs {
			padding: 3px !important;
		    margin: 1px !important;
		    font-size: 15px !important;
		    font-family: -webkit-body !important;
		}

		

		.btn-default {
		    color: #fff;
		    background-color: #10cab8;
    			border-color: #10cab8;
		}	
		.btn-success {
		    color: #fff;
		    background-color: #398439;
    		border-color: #255625;
		}	
		.btn-info {
		    color: #fff;
		    background-color: #439e96;
    		border-color: #439e96;
		}	
		.btn-warning {
		    color: #fff;
		    background-color: #d58512;
    		border-color: #985f0d;
		}	
		.btn-danger {
		    color: #fff;
		    background-color: #f5534e;
    		border-color: #f96964;
		}	

		.btn-primary {
		    color: #fff;
		    background-color: #609fbd !important;
    		border-color: #4e87b9 !important;
		}
		.btn-basic {
		    color: #fff;
		    background-color: #609fbd !important;
    		border-color: #4e87b9 !important;
		}

		#documenter_nav li>a>.pull-right-container {
		    position: absolute;
		    right: 10px;
		    top: 50%;
		    margin-top: -7px;
		}
	</style>
	
</head>
<body class="documenter-project-tutor">

	<div id="documenter_sidebar">

		<br><br>

		<a href="#documenter_cover" id="documenter_logo"><img src="assets\images\logo2.png"
		align="center" width="173" height="56"></a>
		<?php
		$categories = $con->query("SELECT * FROM wp_terms 
INNER JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id
 WHERE taxonomy='lipikbcat' AND count > 0 and parent = 0 order by term_order");
		?>
		<ul id="documenter_nav">
			<?php while($row = $categories->fetch_object()) { 
				$kbs = $con->query("SELECT count(ID) as kbs FROM wp_posts 
 inner join wp_term_relationships ON wp_posts.ID = wp_term_relationships.object_id
 WHERE post_type='lipi_kb' AND post_status='publish' AND wp_term_relationships.term_taxonomy_id = " . $row->term_id)->fetch_object();
				?>
			<li><a href="#<?php echo $row->slug; ?>" title="requirements"><?php echo $row->name; ?>&nbsp;&nbsp;&nbsp;(<?php echo $kbs->kbs; ?>)<span class="pull-right-container" style="position: absolute;
    right: 10px;
    top: 50%;
    margin-top: -7px;">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span></a>
                <?php
                $kbs = $con->query("SELECT * FROM wp_posts 
 inner join wp_term_relationships ON wp_posts.ID = wp_term_relationships.object_id
 WHERE post_type='lipi_kb' AND post_status='publish' AND wp_term_relationships.term_taxonomy_id = " . $row->term_id);
                ?>
                <ul>
                	<?php while($kb = $kbs->fetch_object()) { ?>
                	<li><a href="#<?php echo $kb->post_name; ?>" title="requirements"><?php echo $kb->post_title; ?></a></li>
                	<?php } ?>
                </ul>


			</li>	
			<?php } ?>				
		</ul>
	</div>	

	<div id="documenter_content">	

<?php
$categories = $con->query("SELECT * FROM wp_terms 
INNER JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id
 WHERE taxonomy='lipikbcat' AND count > 0 and parent = 0 order by term_order");
 while($row = $categories->fetch_object()) {
 	echo '<h1 id="'.$row->slug.'">'.$row->name . '</h1>';
 	$kbs = $con->query("SELECT * FROM wp_posts 
 inner join wp_term_relationships ON wp_posts.ID = wp_term_relationships.object_id
 WHERE post_type='lipi_kb' AND post_status='publish' AND wp_term_relationships.term_taxonomy_id = " . $row->term_id);
 	while($kb = $kbs->fetch_object()) {
 		// $content = str_replace(['-', '`'], ['&#45;', "&#39;"], $kb->post_content);
 		$content = $kb->post_content;
 		//$content = preg_replace('/\s+/', ' ', $content);
 		?>
 		<section id="<?php echo $kb->post_name; ?>">
			<div class="page-header"><h3><?php echo $kb->post_title; ?></h3><hr class="notop"></div>
			<?php echo nl2br( $content ); ?>
		</section>
 		<?php
 	}
 }
?>
<section id="sources_and_credits">
	<div class="page-header"><h3>Sources and Credits</h3><hr class="notop"></div>
<h6 style="font-family:Lucida Sans Unicode;">
	* CodeIgniter 3.x (https://codeigniter.com/)</h6>
<h6 style="font-family:Lucida Sans Unicode;">
	* My SQL (https://www.mysql.com/)</h6>
<h6 style="font-family:Lucida Sans Unicode;">
	* Bootstrap v3.3.6 (http://getbootstrap.com), Copyright 2011-2014 Twitter, Inc. 
	Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)</h6>
<h6 style="font-family:Lucida Sans Unicode;">
	* Font Awesome: License: SIL OFL 1.1, http://scripts.sil.org/OFL</h6>
</section>




	</div>
</body>
</html>