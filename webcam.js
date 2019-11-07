var video = document.querySelector("#vid");
var overlay = document.querySelectorAll(".supers");
//getContext to work with canvas
var canv = document.getElementById("uploadCanvas");
var contx = canv.getContext('2d');
var image;

//set video from new_upload to stream from webcam
navigator.mediaDevices.getUserMedia({video:true}).then(function(stream) {
        video.srcObject = stream;
        video.play();
    }).catch(function(error) {
        console.log("Well, that did not work.");
    });

//draw to canvas on click of shoot button
document.getElementById('shoot').addEventListener('click', function() {
        contx.drawImage(video, 0, 0, 720, 480);
        document.getElementById('submit_taken').setAttribute("class", "button is-centered");
        // contx.drawImage(overlay, 0, 0, 720, 480);
    });

//upload taken pic on click of submit button
document.getElementById("submit_taken").addEventListener('click', function() {
    var dataURL = canv.toDataURL('image/png');
    console.log(dataURL);
    document.getElementById('taken').value = dataURL;
});


//choose edit overlays
overlay.forEach(function(element) {
    element.addEventListener('click', function(){
        image = element;
        if (image.src === "http://localhost:8080/camagru/filter_images/beer.png") {
            contx.drawImage(image, 140, 0, 480, 480);
        }
        if (image.src === "http://localhost:8080/camagru/filter_images/sexy_elf.png") {
            contx.drawImage(image, 0, 0, 715, 473);
        }
        if (image.src === "http://localhost:8080/camagru/filter_images/water_splash.png") {
            contx.drawImage(image, 140, 45, 380, 380);
        }
        if (image.src === "http://localhost:8080/camagru/filter_images/angel_wings.png") {
            contx.drawImage(image, 160, 205, 380, 275);
        }
        if (image.src === "http://localhost:8080/camagru/filter_images/jim_morrison.png") {
            contx.drawImage(image, 160, 205, 380, 275);
        }
        if (image.src === "http://localhost:8080/camagru/filter_images/windows.png") {
            contx.drawImage(image, 160, 205, 380, 275);
        }
    });
});