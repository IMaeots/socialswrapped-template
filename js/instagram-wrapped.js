// Constant variables
const slideshowElement = document.querySelector(".slideshow");
const tableContainer = document.querySelector(".data-table");
const leftAd = document.querySelector(".left-div");
const rightAd = document.querySelector(".right-div");
// Get the path to correct persona picture.
function getPersonaImgPath() {
    let imagePath = myCharacters.imagePath;
    switch (persona) {
        case "Adventurer": return imagePath + 'adventurer2.png';
        case "Chiller": return imagePath + 'calm_guru2.png';
        case "Interactive bunny": return imagePath + 'interactive_bunny2.png';
        case "Lifestyle admirer": return imagePath + 'lifestyle_admirer2.png';
        case "Lurker": return imagePath + 'lurker2.png';
        case "Nolifer": return imagePath + 'nolifer2.png';
        case "Superman": return imagePath + 'superman2.png';
        case "The Charmer": return imagePath + 'the_charmer2.png';
        case "The Enthusiast": return imagePath + 'the_enthusiast2.png';
        case "Trend Follower": return imagePath + 'trend_follower2.png';
    }
}

// Activate the slideshow.
function startSlideshow() {
    // Intro
    slideshowElement.style.transition = 'opacity 0.5s';
    slideshowElement.style.opacity = '0';
    setTimeout(() => {
        slideshowElement.innerHTML = slideshowTextArray[0];
        slideshowElement.style.opacity = '1';
        // Start music player.
    }, 500);

    // Update the slideshow with slideshow text or display table of information.
    let index = 1;
    const slideshow = setInterval(updateSlideshow, 5000);
    function updateSlideshow() {
        if (index < slideshowTextArray.length) {
            if ((index + 1) === slideshowTextArray.length) {
                slideshowElement.style.opacity = '0';
                // Add image for last slide.
                const image = document.createElement('img');
                image.src = getPersonaImgPath(persona)
                image.style.width = '250px';
                image.style.height = '250px';
                slideshowElement.innerHTML = '';
                slideshowElement.appendChild(image);
                slideshowElement.innerHTML += `<br>${slideshowTextArray[index]}`;
                slideshowElement.style.opacity = '1';
                index++
            } else {
                slideshowElement.style.transition = 'opacity 0.5s';
                slideshowElement.style.opacity = '0';
                // Switch slideshow elements.
                setTimeout(() => {
                    slideshowElement.innerHTML = slideshowTextArray[index];
                    slideshowElement.style.opacity = '1';
                    index++;
                }, 500);
            }
        } else {
            // If the slideshow ends, display table of data.
            slideshowElement.innerHTML = '';
            slideshowElement.style.display = 'none';
            leftAd.style.display = 'block';
            rightAd.style.display = 'block';
            tableContainer.style.display = 'block';
            clearInterval(slideshow);
        }
    }
}

let canClick = true;
// Create a shareable image.
document.getElementById("shareButton").addEventListener("click", function () {
    if (canClick) {
        canClick = false;

        // Get canvas and set size.
        const canvas = document.getElementById("canvas");
        canvas.width = 1080;
        canvas.height = 1920;
        const context = canvas.getContext("2d");

        // Apply background for canvas.
        const gradient = context.createLinearGradient(0, 0, canvas.width, canvas.height);
        gradient.addColorStop(0, '#4c68d7');
        gradient.addColorStop(0.33, '#cd486b');
        gradient.addColorStop(0.66, '#fbad50');
        gradient.addColorStop(1, '#fccc63');
        context.fillStyle = gradient;
        context.fillRect(0, 0, canvas.width, canvas.height);

        // Get the correct Image.
        const img = new Image();
        img.src = getPersonaImgPath();

        img.onload = function () {
            context.drawImage(img, 220, 80, 640, 640);

            // Title.
            context.fillStyle = "white";
            context.font = "bold 64px Roboto";
            context.textAlign = "center";
            context.fillText(persona, canvas.width / 2, 750);
            context.font = "52px Roboto";
            context.fillText(persona_description, canvas.width / 2, 825);

            // List heading.
            context.fillStyle = "black";
            context.font = "bold 48px Roboto";
            context.textAlign = "center";
            context.fillText(`${name}\'s Instagram Wrapped:`, canvas.width / 2, 950);

            // Underline for "STATS".
            context.strokeStyle = "black";
            context.lineWidth = 2;
            context.beginPath();
            context.moveTo(canvas.width / 2 - 270, 975); // Start point
            context.lineTo(canvas.width / 2 + 270, 975); // End point
            context.stroke();

            // List
            context.font = "48px Roboto";
            context.fillText(`Posts liked: ${post_likes_thisyear}`, canvas.width / 2, 1050);
            context.fillText(`Comments liked: ${comment_likes_thisyear}`, canvas.width / 2, 1125);
            context.fillText(`Stories liked: ${story_interactions_likes_thisyear}`, canvas.width / 2, 1200);
            context.fillText(`Story quizzes solved: ${story_interactions_quizzes_thisyear}`, canvas.width / 2, 1275);
            context.fillText(`Posts saved: ${saved_posts_thisyear}`, canvas.width / 2, 1350);
            context.fillText(`Posts and stories posted: ${posts_thisyear + stories_thisyear}`, canvas.width / 2, 1425);
            context.fillText(`New followers: ${follows_total_thisyear}`, canvas.width / 2, 1500);
            context.fillText(`All-time comment count: ${post_comments_alltime + reels_comments_alltime}`, canvas.width / 2, 1575);
            context.fillText(`Advertisers that spy on you: ${advertisers_using_your_activity_count}`, canvas.width / 2, 1650);

            // Footer
            context.fillStyle = "#000000";
            context.font = "bold 42px Roboto";
            context.textAlign = "center";
            context.fillText("Socialswrapped.com", canvas.width / 2, 1820);
            context.font = "32px Roboto";
            context.globalAlpha = 0.5;
            context.fillText("Image by catalyststuff", canvas.width / 2, 1860);


            // Convert the canvas to a data URL.
            const dataURL = canvas.toDataURL("image/png");

            // Create a download link.
            const downloadLink = document.createElement("a");
            downloadLink.href = dataURL;
            downloadLink.download = "instagram_wrapped.png";

            // Hide the download link.
            downloadLink.style.display = "none";
            document.body.appendChild(downloadLink);

            // Trigger the download link.
            downloadLink.click();

            // Clean up.
            document.body.removeChild(downloadLink);
        }

        // Restore the canClick flag after 2 seconds.
        setTimeout(() => {
            canClick = true;
        }, 2000);
    }
})
