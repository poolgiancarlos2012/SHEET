<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->layout->getTitle(); ?></title>  
	<meta name="description" content="<?php echo $this->layout->getDescripcion(); ?>">
	<meta name="keywords" content="<?php echo $this->layout->getKeywords(); ?>" />
	<?php echo $this->layout->css; ?> 

</head>
<body style = "background: url(<?=base_url()?>public/Librerias/Metis/assets/img/pattern/irongrip.png) repeat #444;">
	<?php echo $content_for_layout; ?>
	<?php echo $this->layout->js; ?> 
</body>
</html>
