<?php
/*
Template Name: Instagram Wrapped
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
                <th>Last and First...</th>
            </tr>
            <tr>
                <td>Last login date</td>
                <td><?php echo $dictData['last_login_timestamp'] ?></td>
            </tr>
            <tr>
                <td>Last logout date</td>
                <td><?php echo $dictData['last_logout_timestamp'] ?></td>
            </tr>
            <tr>
                <td>Your first ever story date</td>
                <td><?php echo $dictData['first_ever_story_timestamp'] ?></td>
            </tr>
            <tr>
                <th>Story interactions this year!</th>
            </tr>
            <tr>
                <td>Number of Quizzes interacted with</td>
                <td><?php echo $dictData['story_interactions_quizzes_current'] ?></td>
            </tr>
            <tr>
                <td>Number of Polls interacted with</td>
                <td><?php echo $dictData['story_interactions_polls_current'] ?></td>
            </tr>
            <tr>
                <td>Number of likes on Stories</td>
                <td><?php echo $dictData['story_interactions_likes_current'] ?></td>
            </tr>
            <tr>
                <th>Comments:</th>
            </tr>
            <tr>
                <td>Total comments on posts all time</td>
                <td><?php echo $dictData['post_comments_alltime'] ?></td>
            </tr>
            <tr>
                <td>Total comments on reels all time</td>
                <td><?php echo $dictData['reels_comments_alltime'] ?></td>
            </tr>
            <tr>
                <th>Likes</th>
            </tr>
            <tr>
                <td>Posts liked this year</td>
                <td><?php echo $dictData['post_likes_current'] ?></td>
            </tr>
            <tr>
                <td>Comments liked this year</td>
                <td><?php echo $dictData['comment_likes_current'] ?></td>
            </tr>
            <tr>
                <th>About you:</th>
            </tr>
            <tr>
                <td>Number of posts this year</td>
                <td><?php echo $dictData['posts_thisyear'] ?></td>
            </tr>
            <tr>
                <td>Number of stories this year</td>
                <td><?php echo $dictData['stories_thisyear'] ?></td>
            </tr>
            <tr>
                <td>Number of accounts you viewed because Instagram pushed them...</td>
                <td><?php echo $dictData['suggested_accounts_viewed_alltime'] ?></td>
            </tr>
            <tr>
                <th>Saves</th>
            </tr>
            <tr>
                <td>Number of posts saved this year</td>
                <td><?php echo $dictData['saved_posts_thisyear'] ?></td>
            </tr>
            <tr>
                <th>Persona</th>
            </tr>
            <tr>
                <td>Your persona</td>
                <td><?php echo $dictData['persona'] ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><?php echo $dictData['persona_description'] ?></td>
            </tr>
        </table>
        <div>
            <h4>SocialsWrapped - be sure to recommend us to your friends and have a comparison! :)</h4>
            <button id="shareButton">Share your wrapped</button>
            <canvas id="canvas" style="display: none">
                <script>
                    // Give necessary variables to canvas.
                    let name = <?php echo json_encode($dictData['name']) ?>;
                    let post_comments_alltime = <?php echo json_encode($dictData['post_comments_alltime']) ?>;
                    let reels_comments_alltime = <?php echo json_encode($dictData['reels_comments_alltime']) ?>;
                    let first_ever_story_timestamp = <?php echo json_encode($dictData['first_ever_story_timestamp']) ?>;
                    let story_interactions_likes_current = <?php echo json_encode($dictData['story_interactions_likes_current']) ?>;
                    let post_likes_current = <?php echo json_encode($dictData['post_likes_current']) ?>;
                    let comment_likes_current = <?php echo json_encode($dictData['comment_likes_current']) ?>;
                    let saved_posts_thisyear = <?php echo json_encode($dictData['saved_posts_thisyear']) ?>;
                    let suggested_accounts_viewed_alltime = <?php echo json_encode($dictData['suggested_accounts_viewed_alltime']) ?>;
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
        src="https://open.spotify.com/embed/playlist/6QE0dKR03JAFYsa9zXz7Zf?utm_source=generator"
        width="300" height="80" allowfullscreen="" loading="lazy"
        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
</body>
<?php wp_footer(); ?>
</html>
