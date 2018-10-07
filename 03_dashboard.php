<?php
# Step 1 : Include je file yg dah ada PHP session initialization dan DB connection string tadi, jadi tak perlu ulang banyak kali connect ke DB.
include 'database.php';

# Step 2 : Cek sama ada user dah login ke belum.
if(isset($_SESSION['users_id']) && isset($_SESSION['users_email']) && isset($_SESSION['users_name']) && isset($_SESSION['users_level']))
{
?>
<h3>Selamat datang, <?php echo $_SESSION['users_name']; ?>!</h3>
<p>
	<input type="button" value="Logout" onclick="location='04_logout.php';" />
</p>
<?php
}
else
{
?>
Maaf, anda tidak dibenarkan akses ke bahagian ini.
<p>
	<input type="button" value="Balik ke login form" onclick="location='01_input.php';" />
</p>
<?php
}
?>
