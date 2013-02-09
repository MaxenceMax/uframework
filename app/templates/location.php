<!DOCTYPE HTML>
<html>
	<head>
		<title>A location</title>
	</head>
	<body>
		<?= $location->getName() ?>		
		<form action="/locations/<?= $location->getId() ?>" method="POST">
		    <input type="hidden" name="_method" value="PUT">
		    <input type="text" name="name" value="<?= $location->getName() ?>">
		    <input type="submit" value="Update">
		</form>
		<?php if($location->getComments() != null):?>
		<table>
			<?php foreach ($location->getComments() as $comment) :?>
			<tr>
				<td><?= $comment->getUsername()?><td>
				<td><?= $comment->getBody()?><td>
			</tr>
			<?php endforeach;?>
		</table>
		<?php endif;?>
		<form action="/locations/<?= $location->getId() ?>" method="POST">
		    <input type="hidden" name="_method" value="DELETE">
		    <input type="submit" value="Delete">
		</form>
		<a href="/locations/">Back</a>
	</body>
</html>
