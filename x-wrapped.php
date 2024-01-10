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
        <h4><u>And that is not all! - You have done even more...</u></h4>
        <table>
            <tr>
                <th style="text-align: center">All-Time statistics</th>
            </tr>
            <tr>
                <th>Follow activity</th>
            </tr>
            <tr>
                <td>Following</td>
                <td><?php echo $dictData['following_count'] ?></td>
            </tr>
            <tr>
                <td>Followers</td>
                <td><?php echo $dictData['follower_count'] ?></td>
            </tr>
            <tr>
                <th>Tweet activity</th>
            </tr>
            <tr>
                <td>Tweets liked</td>
                <td><?php echo $dictData['tweets_liked'] ?></td>
            </tr>
            <tr>
                <td>Tweets posted</td>
                <td><?php echo $dictData['tweets_posted'] ?></td>
            </tr>
            <tr>
                <td>Community tweets posted</td>
                <td><?php echo $dictData['community_tweets_posted'] ?></td>
            </tr>
            <tr>
                <td>Community notes posted</td>
                <td><?php echo $dictData['community_notes_posted'] ?></td>
            </tr>
            <tr>
                <td>Searches made</td>
                <td><?php echo $dictData['search_count'] ?></td>
            </tr>
            <tr>
                <th>Direct Messages and Lists</th>
            </tr>
            <tr>
                <td>Personal DMs</td>
                <td><?php echo $dictData['direct_messages_count'] ?></td>
            </tr>
            <tr>
                <td>Group DMs</td>
                <td><?php echo $dictData['direct_group_messages_count'] ?></td>
            </tr>
            <tr>
                <td>Lists created</td>
                <td><?php echo $dictData['lists_created_count'] ?></td>
            </tr>
            <tr>
                <td>Lists membership count</td>
                <td><?php echo $dictData['lists_member_count'] ?></td>
            </tr>
            <tr>
                <th>Bad vibes</th>
            </tr>
            <tr>
                <td>Blocked users</td>
                <td><?php echo $dictData['blocked_count'] ?></td>
            </tr>
            <tr>
                <td>Account suspensions</td>
                <td><?php echo $dictData['suspensions_count'] ?></td>
            </tr>
            <tr>
                <th>Broadcasts and Moments</th>
            </tr>
            <tr>
                <td>Broadcasts watched</td>
                <td><?php echo $dictData['broadcast_count'] ?></td>
            </tr>
            <tr>
                <td>Broadcast comments tally</td>
                <td><?php echo $dictData['broadcast_comments_count'] ?></td>
            </tr>
            <tr>
                <td>Moments created</td>
                <td><?php echo $dictData['moment_count'] ?></td>
            </tr>
            <tr>
                <th>Your exposure to Ads</th>
            </tr>
            <tr>
                <td>Impressions with Ads</td>
                <td><?php echo $dictData['ad_impressions_count'] ?></td>
            </tr>
            <tr>
                <td>Engagements with Ads</td>
                <td><?php echo $dictData['ad_engagements_count'] ?></td>
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
                    let search_count = <?php echo json_encode($dictData['search_count']) ?>;
                    let tweets_liked = <?php echo json_encode($dictData['tweets_liked']) ?>;
                    let tweets_posted = <?php echo json_encode($dictData['tweets_posted']) ?>;
                    let community_tweets_posted = <?php echo json_encode($dictData['community_tweets_posted']) ?>;
                    let direct_messages_count = <?php echo json_encode($dictData['direct_messages_count']) ?>;
                    let direct_group_messages_count = <?php echo json_encode($dictData['direct_group_messages_count']) ?>;
                    let lists_member_count = <?php echo json_encode($dictData['lists_member_count']) ?>;
                    let broadcast_count = <?php echo json_encode($dictData['broadcast_count']) ?>;
                    let broadcast_comments_count = <?php echo json_encode($dictData['broadcast_comments_count']) ?>;
                    let ad_engagements_count = <?php echo json_encode($dictData['ad_engagements_count']) ?>;
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

