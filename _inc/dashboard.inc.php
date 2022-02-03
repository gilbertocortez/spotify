<?php
// 
// This is Music Utopia Dashboard
// User has been authenticated and we can now intercact with their account
//
// Code by Gilberto Cortez
//

// Start new instance of CurlServer object
$__cURL = new CurlServer();

// Set URL for request to obtain the user top tracks
$req_url = 'https://api.spotify.com/v1/me/top/tracks';

// Start a GET request via cURL
$top_user_tracks = $__cURL->get_request($req_url, $_SESSION['spotify_token']->access_token);

// Set URL for request to obtain the user top artists
$req_url = 'https://api.spotify.com/v1/me/top/artists';

// Start a GET request via cURL
$top_user_artists = $__cURL->get_request($req_url, $_SESSION['spotify_token']->access_token);

// Include page header
include '_inc/html/header.inc.php';
?>
<header>
    <p><img src="images/logo.png" alt="Music Utopia Logo" class="header_logo">
        | <button onclick="window.open('logout.php', '_self');">Log Out</button>
        | <button id="togglePlay">Toggle Play</button></p>
    <h1>Helping you make the best of Spotfy!</h1>

    <script src="https://sdk.scdn.co/spotify-player.js"></script>
    <script>
        const token = '<?php echo $_SESSION['spotify_token']->access_token; ?>';
    </script>
    <script src="scripts/web_playback.js"></script>
    
</header>
<div class="container">
    <h2>My Top 20 Songs</h2>
    <div class="grid_container">
        <?php
        foreach ($top_user_tracks as $content_value) {
            if (is_array($content_value)) {
                // echo '<pre>';
                // print_r($content_value);
                // echo '</pre>';

                // Loop the obtained results to print content for user
                foreach ($content_value as $value) {

                    echo "<div class='grid_item'>";
                    echo "Song: $value->name <br/>";
                    echo "<button onclick=\"play_song('$value->uri')\">Play</button><br/><br/>";
                    echo "<button onclick=\"window.open('$value->uri')\">Open in Spotify</button><br/><br/>";
                    echo "</div>";
                }
            }
        }
        ?>
    </div>

    <h2>My Top 20 Artists</h2>
    <div class="grid_container">
        <?php
        foreach ($top_user_artists as $content_value) {
            if (is_array($content_value)) {
                // Loop the obtained results to print content for user
                foreach ($content_value as $value) {

                    echo "<div class='grid_item'>";
                    echo "Song: $value->name <br/>";
                    echo "<button onclick=\"window.open('$value->uri')\">Open in Spotify</button><br/><br/>";
                    echo "</div>";
                }
            }
        }
        ?>
    </div>
</div>
<?php

// Include page footer
include '_inc/html/footer.inc.php';
