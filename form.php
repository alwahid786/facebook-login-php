<?php
session_start();

if (!isset($_SESSION['fb_access_token'])) {
    header('Location: index.php');
    exit;
}

echo '<form method="post" action="fetch-posts.php">
  <label for="url">Group/Page URL:</label>
  <input type="text" id="url" name="url">
  <input type="submit" value="Fetch Posts">
</form>';
