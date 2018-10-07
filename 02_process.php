<?php
# Step 1 : Include je file yg dah ada PHP session initialization dan DB connection string tadi, jadi tak perlu ulang banyak kali connect ke DB.
include 'database.php';

# Step 2 : Cek sama ada user dah login ke belum.
if(isset($_SESSION['users_id']) && isset($_SESSION['users_email']) && isset($_SESSION['users_name']) && isset($_SESSION['users_level'])) # Kalau server detect sessions kat senarai ni sudah diset maksudnya user dah login ke system.
{
?>
	Anda sudah login ke system ini.
	<p>
		<input type="button" value="Teruskan ke Dashboard" onclick="location='03_dashboard.php';" />
	</p>
<?php
}
else # Kalau belum login, cuba proses input yg di POST dari 01_input.php
{
# Step 3 : Proses apa yg sepatutnya berlaku bila user masukkan input.

	# By default, initialize PHP variables untuk elakkan PHP warning dipaparkan jika tiada data di POST dari file 01_input.php, dan jugak untuk variable lain macam error message yg akan terlibat dalam file ni.
	$users_email = null;
	$users_password = null;
	$query_error = null;

	if(isset($_POST['email'])) # Input ni adalah daripada <input name="email" type="text" value="" /> tadi. Perhatikan bahawa attribute 'name' yg diambil kira sebagai PHP variable yg di POST.
	$users_email = addslashes($_POST['email']); # addslashes tu adalah untuk tambah slash / sekiranya ada special character yg digunakan macam simbol 'quotation marks', iaitu "
	if(isset($_POST['katalaluan'])) # Input ni adalah daripada <input name="katalaluan" type="password" value="" /> tadi.
	$users_password = $_POST['katalaluan']; # Sini tak perlu guna function addslashes sebab nanti kita akan hash guna function MD5.

	$users_password_hashed = md5($users_password); # MD5 hash adalah password yg telah ditukar daripada teks biasa yg boleh kita baca kepada suatu format lain yg manusia tak boleh faham.

	$query_statement01 = "select * from `users` where `email` = '$users_email' and `password` = '$users_password_hashed'"; # Buat statement SELECT untuk cari data dengan email dan password (hashed dengan MD5) yg dimasukkan.

	$query01 = mysqli_query($mysqli_connect, $query_statement01); # Execute SQL query.
	$query_error = mysqli_error($mysqli_connect); # Cek kalau2 ada error kat query.

	if(!$query_error) # Kalau takde error, buat benda kat bawah ni.
	{
		$query02 = mysqli_num_rows($query01); # Kira berapa banyak data / rows yg dijumpai daripada query tu.
	
		if($query02) # Kalau data dijumpai, maksudnya email & password yg dimasukkan tu adalah betul.
		{
			$query03 = mysqli_fetch_assoc($query01);
	
			# Ini adalah data daripada row kat table users.
			$users_id = $query03['id'];
			$users_email = $query03['email'];
			$users_name = $query03['name'];
			$users_level = $query03['level'];
	
			# Setkan user + browser session, iaitu untuk kita jadikan user ni logged-in / authenticated dalam system tu.
			$_SESSION['users_id'] = $users_id;
			$_SESSION['users_email'] = $users_email;
			$_SESSION['users_name'] = $users_name;
			$_SESSION['users_level'] = $users_level;
	
			echo 'Anda telah berjaya login ke system.';
			?>
			<p>
				<input type="button" value="Teruskan ke Dashboard" onclick="location='03_dashboard.php';" />
			</p>
			<?php
		}
		else # Kalau takde data, buat benda bawah ni.
		{
			?>
			Maaf, kombinasi email dan katalaluan adalah salah, atau tiada data dimasukkan.
			<p>
			<input type="button" value="Balik ke login form" onclick="location='01_input.php';" />
			</p>
			<?php
		}
	}
	else # Kalau ada error, buat benda kat bawah ni.
	die($query_error); # Display error message.
}
?>
