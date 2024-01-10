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
} else {
    echo '<div class="watermark"></div>';
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
                <th style="text-align: center">Through the past year</th>
            </tr>
            <tr>
                <th>Likes</th>
            </tr>
            <tr>
                <td>Posts liked</td>
                <td><?php echo $dictData['post_likes_thisyear'] ?></td>
            </tr>
            <tr>
                <td>Comments liked</td>
                <td><?php echo $dictData['comment_likes_thisyear'] ?></td>
            </tr>
            <tr>
                <td>Stories liked</td>
                <td><?php echo $dictData['story_interactions_likes_thisyear'] ?></td>
            </tr>
            <tr>
                <th>Activity</th>
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
                <th>Saves</th>
            </tr>
            <tr>
                <td>Number of posts saved</td>
                <td><?php echo $dictData['saved_posts_thisyear'] ?></td>
            </tr>
            <tr>
                <th>Story interactions</th>
            </tr>
            <tr>
                <td>Quizzes guessed</td>
                <td><?php echo $dictData['story_interactions_quizzes_thisyear'] ?></td>
            </tr>
            <tr>
                <td>Polls voted on</td>
                <td><?php echo $dictData['story_interactions_polls_thisyear'] ?></td>
            </tr>
            <tr>
                <th>Follow Activity</th>
            </tr>
            <tr>
                <td>Follows given</td>
                <td><?php echo $dictData['following_total_thisyear'] ?></td>
            </tr>
            <tr>
                <td>Follows gotten</td>
                <td><?php echo $dictData['follows_total_thisyear'] ?></td>
            </tr>
            <tr>
                <th style="text-align: center">Through your entire account history</th>
            </tr>
            <tr>
                <th>Comments:</th>
            </tr>
            <tr>
                <td>Number of comments on posts</td>
                <td><?php echo $dictData['post_comments_alltime'] ?></td>
            </tr>
            <tr>
                <td>Number of comments on reels</td>
                <td><?php echo $dictData['reels_comments_alltime'] ?></td>
            </tr>
            <tr>
                <th>Firsts and Lasts...</th>
            </tr>
            <tr>
                <td>Account creation date</td>
                <td><?php echo $dictData['signup_date'] ?></td>
            </tr>
            <tr>
                <td>Your first ever story date</td>
                <td><?php echo $dictData['first_story_date'] ?></td>
            </tr>
            <tr>
                <td>Your first ever close friends story date</td>
                <td><?php echo $dictData['first_close_friends_story_date'] ?></td>
            </tr>
            <tr>
                <td>Your last posted story date</td>
                <td><?php echo $dictData['last_story_date'] ?></td>
            </tr>
            <tr>
                <td>Last login date</td>
                <td><?php echo $dictData['last_login_date'] ?></td>
            </tr>
            <tr>
                <td>Last logout date</td>
                <td><?php echo $dictData['last_logout_date'] ?></td>
            </tr>
            <tr>
                <th>Ads</th>
            </tr>
            <tr>
                <td>Advertisers using your activity</td>
                <td><?php echo $dictData['advertisers_using_your_activity_count'] ?></td>
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
                    let post_likes_thisyear = <?php echo json_encode($dictData['post_likes_thisyear']) ?>;
                    let comment_likes_thisyear = <?php echo json_encode($dictData['comment_likes_thisyear']) ?>;
                    let story_interactions_likes_thisyear = <?php echo json_encode($dictData['story_interactions_likes_thisyear']) ?>;
                    let story_interactions_quizzes_thisyear = <?php echo json_encode($dictData['story_interactions_quizzes_thisyear']) ?>;
                    let saved_posts_thisyear = <?php echo json_encode($dictData['saved_posts_thisyear']) ?>;
                    let posts_thisyear = <?php echo json_encode($dictData['posts_thisyear']) ?>;
                    let stories_thisyear = <?php echo json_encode($dictData['stories_thisyear']) ?>;
                    let follows_total_thisyear = <?php echo json_encode($dictData['follows_total_thisyear']) ?>;
                    let post_comments_alltime = <?php echo json_encode($dictData['post_comments_alltime']) ?>;
                    let reels_comments_alltime = <?php echo json_encode($dictData['reels_comments_alltime']) ?>;
                    let advertisers_using_your_activity_count = <?php echo json_encode($dictData['advertisers_using_your_activity_count']) ?>;
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
