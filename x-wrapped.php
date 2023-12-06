<?php
/*
Template Name: X Wrapped
*/
?>
<?php
// Start session and access data stored in the session.
session_start();

if (isset($_SESSION['data'])) {
    $dictData = $_SESSION['data'];
    $slideshowData = $_SESSION['data_for_slideshow_json'];
} else {
    session_destroy();
    wp_redirect(home_url());
    exit;
}

session_destroy();

// Check if running on demo mode -> display the watermark & make fake data.
if ($dictData['demo'] === 1) {
    echo '<div class="watermark">This is a demo! To see your data wrapped -><br>Go back to socialswrapped.com main page! :)</div>';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Head content goes here -->
    <?php wp_head(); ?>
</head>
<body>
<script>
    let slideshowTextArray = <?php echo $slideshowData ?>;
    let persona = '<?php echo $dictData['persona'] ?>';
    let persona_description = '<?php echo $dictData['persona_description'] ?>';
</script>
<!-- Slideshow of summarised information -->
<div class="slideshow">
    <div style="cursor: pointer;" onclick="startSlideshow()"><h3>Click here to begin!</h3></div>
</div>
<div class="left-div"></div>
<!-- Table of wrapped social media data -->
<div class="middle-div">
    <div class="data-table">
        <h4><u>And that is not all! - You did even more...</u></h4>
        <table>
            <tr>
                <th>Likes</th>
            </tr>
            <tr>
                <td>Posts liked this year</td>
                <td><?php echo $dictData['tweets_liked'] ?></td>
            </tr>
        </table>
        <div>
            <h4>SocialsWrapped - be sure to recommend us to your friends and have a comparison! :)</h4>
            <button id="shareButton">Share your wrapped</button>
            <canvas id="canvas" style="display: none">
                <script>
                    // Give necessary variables to canvas.
                    let name = <?php echo json_encode($dictData['name']) ?>;
                    let tweets_liked = <?php echo json_encode($dictData['tweets_liked']) ?>;
                </script>
            </canvas>
            <br>
            <p style="text-align: center; padding: 16px; color: rgba(255, 255, 255, 0.5)">
                Made by IMaeots<br>
                <a href="https://socialswrapped.com" style="text-decoration: underline; color: inherit">socialswrapped.com</a><br><br>
                <span style="font-size: 12px;">Thanks to <a href="https://www.freepik.com/author/catalyststuff" style="text-decoration: underline; color: inherit">catalyststuff</a> from Freepik for avatars.</span>
            </p>
        </div>
    </div>
</div>
<div class="right-div"></div>
<iframe id="spotifyIframe"
        src="https://open.spotify.com/embed/album/37dKlvajGi2mmHLPgWBvLj?utm_source=generator&theme=0"
        width="300" height="80" allowfullscreen="" loading="lazy"
        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
</body>
<?php wp_footer(); ?>
</html>

