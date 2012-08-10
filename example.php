<?php
require_once 'memegenerator.class.php';

$meme = new MemeGenerator('username','password'); // from http://www.memegenerator.com

if($_GET)
{
	$result = ($meme->meme($_GET['top'], $_GET['bottom'], $_GET['q']));
	$image = $result['result'];
	
	if($result['success'] == 'true')
	{
		$output = '<a href="'.$image['instanceUrl'].'"><img src="'.$image['instanceImageUrl'].'"/></a>';
	}
	else
	{
		$output = 'No Meme Found called: '.$_GET['q'];
	}
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<header>
<title>MemeBro</title>
</header>
<h1>MemeBro</h1>
<h2>Make your Meme with Meme Bro</h2>
<form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
<input type="text" name="top" value="<?php echo $_GET['top']; ?>" placeholder="Top"/><br>
<input type="text" name="bottom" value="<?php echo $_GET['bottom']; ?>" placeholder="Bottom"/><br>
<input type="text" name="q" value="<?php echo $_GET['q']; ?>" placeholder="Meme"/><br>
<input type="submit" value="Submit"/><br>

<?php echo $output ?>
</form>
</html>