<?php
# Step 1 : Include je file yg dah ada PHP session initialization dan DB connection string tadi, jadi tak perlu ulang banyak kali connect ke DB.
include 'database.php';

# Step 2 : Cek sama ada user dah login ke belum.
if(isset($_SESSION['users_id']) && isset($_SESSION['users_email']) && isset($_SESSION['users_name']) && isset($_SESSION['users_level']))
{
	echo 'Terima kasih '.$_SESSION['users_name'].' kerana menggunakan system ini.';
	session_destroy(); # Hapuskan PHP session yg dah diset sebelum ni. Maksudnya user kena login semula kalau nak access ke dashboard.
}
else
echo 'Anda belum login ke system ataupon sudah logout.';
?>
<p>
	<input type="button" value="Balik ke login form" onclick="location='01_input.php';" />
</p>
