<?
// database access parameters

$host = "localhost";
$user = "postgres";
$pass = "postgres";
$db = "ipbgis_UTM48s";

// Buka Koneksi ke postgresSQL
$pgConn = pg_connect("host=$host dbname=$db user=$user password=$pass");
if (!$pgConn) {
	die("Tidak dapat terkoneksi.");
}
?>
