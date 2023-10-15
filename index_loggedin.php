<?php 
require_once($_SERVER["DOCUMENT_ROOT"] . "/incl/header.php"); 
require_once($_SERVER["DOCUMENT_ROOT"] . "/incl/logincheck.php"); 


$greetings = array(
				"'Lo " . $account->screen_name . "! Tudo bem?",
				"Ahoy " . $account->screen_name . "!",
				"Hala " . $account->screen_name . "!",
				"Mabuhay " . $account->screen_name . "!",
				"Ni hao " . $account->screen_name . "!",
				"Kumusta " . $account->screen_name . "!",
				"Howdy " . $account->screen_name . "!",
				"Hi " . $account->screen_name . "!",
				"Hei " . $account->screen_name . "!",
				"Thar she blows, " . $account->screen_name . "!",
				"Guten Tag  " . $account->screen_name . "!",
				"Hello " . $account->screen_name . "!",
				"Yo " . $account->screen_name . "!",
				"Welcome " . $account->screen_name . "!",
				"Moyo " . $account->screen_name . "!",
				"Ola " . $account->screen_name . "!",
				"G'day " . $account->screen_name . "!",
				"Bonjour " . $account->screen_name . "!",
				"Fuck off, " . $account->screen_name . ".",
				"Tere " . $account->screen_name . "!",
				"Szia " . $account->screen_name . "!",
				"Kia ora " . $account->screen_name . "!",
				"Konnichiwa " . $account->screen_name . "!",
				"Aloha " . $account->screen_name . "!",
				"Sawubona " . $account->screen_name . "!",
				"Ahoj " . $account->screen_name . "!",
				"Merhaba, " . $account->screen_name . "!",
				"Oi " . $account->screen_name . "!",
				"Salaam " . $account->screen_name . "!",
				"Kaixo " . $account->screen_name . "!",
				"Mingalaba " . $account->screen_name . "!",
				"Hoi " . $account->screen_name . "!",
				"Salut " . $account->screen_name . "!",
				"Yasou " . $account->screen_name . "!",
				"Shalom " . $account->screen_name . "!",
				"Namaste " . $account->screen_name . "!",
				"Góðan daginn " . $account->screen_name . "!",
				"Fáilte " . $account->screen_name . "!",
				"Ciao " . $account->screen_name . "!",
				"Bangawoyo " . $account->screen_name . "!",
				"Labdien " . $account->screen_name . "!",
				"Mbote " . $account->screen_name . "!",
				"Olá " . $account->screen_name . "!",
				"Jambo " . $account->screen_name . "!",
				"Hej " . $account->screen_name . "!",
				"Moyo " . $account->screen_name . "!",
				"Sawubona " . $account->screen_name . "!",
				"Ya'at'eeh " . $account->screen_name . "!"
			);

?>

<h1><img src="<?php echo $account->display_picture; ?>" width="48" height="48" border="0" align="absmiddle" class="BuddyIconH"><?php echo array_rand(array_flip($greetings)); ?></h1>

	<table>
		<tr>
			<td id="Hint"> 
				<?php if($account->display_picture == "/images/buddyicon.jpg") {
					echo "<div class=\"StartAlert\">Create yourself a <a href=\"iconbuilder.php\">buddy icon!</a></div>";
				}
				?>
				<h3 style="margin-top: 10px;">&raquo; <a href="#">Your groups</a></h3>
				<h3 style="margin-top: 10px;">&raquo; <a href="#">Your contacts</a></h3>
				<h3 style="margin-top: 10px;">&raquo; <a href="profile_edit.php">Your profile</a></h3>
				<h3 style="margin-top: 10px;">&raquo; <a href="account.php">Your account</a></h3>
				<h3 style="margin-top: 10px;">&raquo; <a href="#"><?php echo $website["instance_name"]; ?> Mail</a></h3>
				<img src="/images/spaceball.gif" alt="spacer image" width="220" height="1"> 
			</td>
			
			<td id="GoodStuff" valign="top">
			<h3 style="margin-top: 10px;">&raquo; <a href="upload.php">Upload photos</a></h3>
			
				<div>
					<h3 style="margin-top: 10px; margin-bottom: 10px">&raquo; <a href="profile_photos.php?id=<?php echo $user_id; ?>">Your photos</a></h3>
					<?php
					$stmt = $conn->prepare("SELECT * from photos WHERE uploaded_by=$user_id ORDER BY id DESC LIMIT 4");
					$stmt->execute();
					foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $photo) {
						echo "<a href=\"/photo.php?id=". $photo->id . "\"><img src=\"/uploads/" . $photo->id . ".t.jpg\" style=\"margin-left: 4px; margin-right: 14px\"></a>";
					}
					?>
				</div>

				<div>	
					<h3 style="margin-top: 10px; margin-bottom: 10px">&raquo; <a href="/photos.php">Everyone's photos</a></h3>
					<?php
					$stmt = $conn->prepare("SELECT * from photos ORDER BY id DESC LIMIT 4");
					$stmt->execute();
					foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $photo) {
						// Fetch user info
						$stmt = $conn->prepare("SELECT * FROM users WHERE id=:t0");
						$stmt->bindParam(':t0', $photo->uploaded_by);
						$stmt->execute();
						foreach($stmt->fetchAll(PDO::FETCH_OBJ) as $uploader);
						echo "<p class=\"StreamList\">
						<a href=\"/photo.php?id=" . $photo->id . "\"><img src=\"/uploads/" . $photo->id . ".t.jpg\" border=\"0\"></a><br>
						From <a href=\"/profile_photos.php?id=" . $photo->uploaded_by . "\">". $uploader->screen_name . "</a>
					</p>";
					}
					?>
				</div>
			<td>
			<img src="/images/spaceball.gif" alt="spacer image" width="10" height="1" style="border: none;"> 
			</td>
			</td>
		</tr>
	</table>

<?php require_once($_SERVER["DOCUMENT_ROOT"] . "/incl/footer.php"); ?>