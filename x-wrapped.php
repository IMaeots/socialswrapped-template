<?php
/*
Template Name: x-wrapped-template
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
    <div class="tiktok-data-table">
        <h3 style="text-align: left"><u>And that is not all! - You did even more...</u></h3>
        <table>
            <tr>
                <th>Activity History Range</th>
            </tr>
            <tr>
                <td>Earliest video watched in data</td>
                <td><?php echo $dictData['start_date'] ?></td>
            </tr>
            <tr>
                <td>Last video watched in data</td>
                <td><?php echo $dictData['last_vid_in_data'] ?></td>
            </tr>
            <tr>
                <th>Watch Sessions</th>
            </tr>
            <tr>
                <td>Total videos watched</td>
                <td><?php echo $dictData['num_videos_watched'] ?></td>
            </tr>
            <tr>
                <td>Total watch time</td>
                <td><?php echo "{$dictData['total_watch_time']} min ({$dictData['total_watch_days']} days)" ?></td>
            </tr>
            <tr>
                <td>Watch sessions</td>
                <td><?php echo $dictData['num_watch_sessions'] ?></td>
            </tr>
            <tr>
                <td>Longest watch session</td>
                <td><?php echo "{$dictData['longest_watch_date']} ({$dictData['longest_watch_time']} min)" ?></td>
            </tr>
            <tr>
                <td>Average session length</td>
                <td><?php echo "{$dictData['avg_session_length']} min"?></td>
            </tr>
            <tr>
                <td>Average time spent on each video</td>
                <td><?php echo "{$dictData['avg_video_length']} seconds" ?></td>
            </tr>
            <tr>
                <td>Most active weekday</td>
                <td><?php echo $dictData['tiktok_day'] ?></td>
            </tr>
            <tr>
                <th>Comments</th>
            </tr>
            <tr>
                <td>Total comments</td>
                <td><?php echo $dictData['num_of_comments'] ?></td>
            </tr>
            <tr>
                <td>Average comment length</td>
                <td><?php echo $dictData['avg_comment_length'] ?></td>
            </tr>
            <tr>
                <td>Most used emoji</td>
                <td><?php echo "{$dictData['favourite_emoji']} (x{$dictData['favourite_emoji_amount']})" ?></td>
            </tr>
            <tr>
                <th>Likes</th>
            </tr>
            <tr>
                <td>Total likes</td>
                <td><?php echo $dictData['num_of_likes'] ?></td>
            </tr>
            <tr>
                <td>Day with most liked posts</td>
                <td><?php echo "{$dictData['record_of_likes_date']} (x{$dictData['record_of_likes']})" ?></td>
            </tr>
            <tr>
                <th>Shares</th>
            </tr>
            <tr>
                <td>Total shares</td>
                <td><?php echo $dictData['num_of_shares'] ?></td>
            </tr>
            <tr>
                <td>Day with most shared posts</td>
                <td><?php echo "{$dictData['most_shares_day']} (x{$dictData['most_shares_amount']})" ?></td>
            </tr>
            <tr>
            <tr>
                <th>Lives</th>
            </tr>
            <tr>
                <td>Total lives viewed</td>
                <td><?php echo $dictData['total_lives_viewed'] ?></td>
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
                    let num_videos_watched = <?php echo json_encode($dictData['num_videos_watched']) ?>;
                    let total_watch_time = <?php echo json_encode($dictData['total_watch_time']) ?>;
                    let num_watch_sessions = <?php echo json_encode($dictData['num_watch_sessions']) ?>;
                    let avg_session_length = <?php echo json_encode($dictData['avg_session_length']) ?>;
                    let longest_watch_time = <?php echo json_encode($dictData['longest_watch_time']) ?>;
                    let num_of_likes = <?php echo json_encode($dictData['num_of_likes']) ?>;
                    let num_of_comments = <?php echo json_encode($dictData['num_of_comments']) ?>;
                    let num_of_shares = <?php echo json_encode($dictData['num_of_shares']) ?>;
                    let tiktok_day = <?php echo json_encode($dictData['tiktok_day']) ?>;
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
        src="https://open.spotify.com/embed/playlist/65LdqYCLcsV0lJoxpeQ6fW?utm_source=generator"
        width="300" height="80" allowfullscreen="" loading="lazy"
        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
</body>
<?php wp_footer(); ?>
</html>

