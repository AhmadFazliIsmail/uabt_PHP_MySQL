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
else # Kalau belum login, paparkan form untuk user login.
{
# Step 3 : Display user login form kalau user tu belum login.
?>
	<form method="post" action="02_process.php"> <!-- Ini adalah form untuk nak capture user input. Input akan dihantar untuk proses di file 02_process.php -->
	<table>
		<tr align="left" valign="top">
			<td width="30%">Email address</td>
			<td><input name="email" type="text" value="" /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input name="katalaluan" type="password" value="" /></td>
		</tr>
		<tr align="center">
			<td colspan="2">
				<input name="submitBtn" type="submit" value="Login" />
				<input name="resetBtn" type="reset" value="Kosongkan" />
			</td>
		</tr>
	</table>
	</form>
<?php
}
?>
