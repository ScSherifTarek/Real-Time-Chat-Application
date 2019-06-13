<?php

include('../config.php');
session_start();

switch ($_REQUEST['action']) {
	case 'sendMessage':
		$query = $db->prepare('INSERT INTO messages SET user=?, message=?');
		$run = $query->execute([
			$_SESSION['user'],
			$_REQUEST['message']
		]);

		if($run)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
		break;

	case 'getMessages':
		$query = $db->prepare('SELECT * FROM messages');
		$run = $query->execute();
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		$messages = '';
		foreach ($result as $message) {
			$messages .= '	
							<div class="single-message">
								<strong>'.$message->user.': </strong>
								'.$message->message.'
								<span>'.date('m-d-Y h:i a', strtotime($message->date)).'</span>
							</div>
						';
		}
		echo $messages;
		break;
}