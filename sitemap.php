<?php

//////////////////////////////////
/////////// DATABASE /////////////
//////////////////////////////////

function db_connect()
{
    static $connection;
    if (!isset($connection)) {
	  $serverName = "www.kukahub.com";
		$serverUsername = "kukahubc_armedin";
		$serverPassword = "naruto";
		$serverDatabase="kukahubc_database";
		$connection=mysqli_connect($serverName, $serverUsername, $serverPassword, $serverDatabase);
    }

    if ($connection === false) {
        return mysqli_connect_error();
    }

    return $connection;
}

function db_query($query)
{
    $connection = db_connect();
    mysqli_query($connection, "set names 'utf8'");
    $result = mysqli_query($connection, $query);
    return $result;
}

function db_escapeString($value)
{
    return mysqli_real_escape_string(db_connect(), $value);
}

$root_dir = "https://www.kukahub.com";

//Sitemap

header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version = "1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

?>
<!--General Sitemaps(Non Dynamic) -->

<url>
    <loc><?php echo $root_dir ?></loc>
    <changefreq>weekly</changefreq>
    <priority>1.00</priority>
</url>

<url>
    <loc><?php echo $root_dir."/about/faq.php" ?></loc>
    <changefreq>weekly</changefreq>
</url>

<url>
    <loc><?php echo $root_dir."/about/terms-of-use.php" ?></loc>
    <changefreq>weekly</changefreq>
</url>


<url>
    <loc><?php echo $root_dir."/all-courses.php" ?></loc>
    <changefreq>weekly</changefreq>
</url>


<url>
    <loc><?php echo $root_dir."/introduction-to-matrices.php" ?></loc>
    <changefreq>weekly</changefreq>
</url>

<url>
    <loc><?php echo $root_dir."/login.php" ?></loc>
    <changefreq>weekly</changefreq>
</url>


<url>
    <loc><?php echo $root_dir."/register.php" ?></loc>
    <changefreq>weekly</changefreq>
</url>


<!--Dynamic Sitemaps(Users) -->

<?php

$query = db_query("SELECT ID FROM User");

while($row = mysqli_fetch_assoc($query)){
  $profileURL = $root_dir."/profile.php?id=".$row[ID];
  $friendsURL = $root_dir."/friends.php?id=".$row[ID];
  $aboutURL = $root_dir."/about.php?id=".$row[ID];
  echo'<url>
        <loc>' .$profileURL.'</loc>
        <changefreq>weekly</changefreq>
      </url>
      <url>
        <loc>' .$friendsURL.'</loc>
        <changefreq>weekly</changefreq>
      </url>
      <url>
        <loc>' .$aboutURL.'</loc>
        <changefreq>weekly</changefreq>
      </url>';
}


?>



</urlset>
