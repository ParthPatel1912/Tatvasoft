function disablesetupservice() {
    var header = document.getElementById("bookservice");
    var btns = header.getElementsByClassName("btn");
    btns[0].className += " services-selected";
    document.getElementById("setupservicetab").style.display = "block";
    btns[0].disabled = true;
    btns[1].disabled = true;
    btns[2].disabled = true;
    btns[3].disabled = true;
}

function gotoscheduleplan() {
    var header = document.getElementById("bookservice");
    var btns = header.getElementsByClassName("btn");
    btns[1].className += " services-selected";
    var hidediv = document.getElementById("setupservicetab");
    hidediv.style.display = "none";
    document.getElementById("scheduleplantab").style.display = "block";
    var imgs = header.getElementsByTagName("img");
    imgs[1].src = "../1 HomePage/assets/img/schedule-white.png";
    btns[0].disabled = false;
}

function gotoyourDetails() {
    var header = document.getElementById("bookservice");
    var btns = header.getElementsByClassName("btn");
    btns[2].className += " services-selected";
    var imgs = header.getElementsByTagName("img");
    imgs[2].src = "../1 HomePage/assets/img/details-white.png";
    document.getElementById("scheduleplantab").style.display = "none";
    document.getElementById("detailstab").style.display = "block";
    btns[1].disabled = false;
}

function gotomakepayment() {
    var header = document.getElementById("bookservice");
    var btns = header.getElementsByClassName("btn");
    var imgs = header.getElementsByTagName("img");
    imgs[3].src = "../1 HomePage/assets/img/payment-white.png";
    btns[3].className += " services-selected";
    document.getElementById("detailstab").style.display = "none";
    document.getElementById("paymenttab").style.display = "block";
    btns[2].disabled = false;
}

function checkIfSelected(para) {
    var btns = document.getElementsByClassName("circle");
    var imgs = document.getElementsByClassName("img-book-service");
    var hidden = document.getElementsByClassName("hidden-input");
    if (hidden[para].value == "notselected") {
        hidden[para].value = "selected";
        btns[para].style.border = "3px solid #146371";
        var path = "../1 HomePage/assets/img/" + (para + 1) + "-green.png";
        imgs[para].src = path;
    } else {
        hidden[para].value = "notselected";
        btns[para].style.border = "1px solid gray";
        var path = "../1 HomePage/assets/img/" + (para + 1) + ".png";
        imgs[para].src = path;
    }
}

function gotobacksetupservice() {
    var header = document.getElementById("bookservice");
    var btns = header.getElementsByClassName("btn");
    var imgs = header.getElementsByTagName("img");
    var hidediv = document.getElementById("scheduleplantab");
    var hidediv2 = document.getElementById("detailstab");
    var hidediv3 = document.getElementById("paymenttab");
    hidediv.style.display = "none";
    hidediv2.style.display = "none";
    hidediv3.style.display = "none";
    // console.log(btns[1].value);
    btns[1].disabled = true;
    // imgs[1].src = "../1 HomePage/assets/img/schedule.png";
    // btns[1].className += " services";
    // console.log(btns[2].value);
    btns[2].disabled = true;
    // imgs[2].src = "../1 HomePage/assets/img/details.png";
    // btns[2].className += " services";
    // console.log(btns[3].value);
    btns[3].disabled = true;
    // imgs[3].src = "../1 HomePage/assets/img/payment.png";
    // btns[3].className += " services";
    document.getElementById("setupservicetab").style.display = "block";
}

function gotobackscheduleplan() {
    var header = document.getElementById("bookservice");
    var btns = header.getElementsByClassName("btn");
    var imgs = header.getElementsByTagName("img");
    var hidediv = document.getElementById("setupservicetab");
    var hidediv2 = document.getElementById("detailstab");
    var hidediv3 = document.getElementById("paymenttab");
    hidediv.style.display = "none";
    hidediv2.style.display = "none";
    hidediv3.style.display = "none";
    btns[2].disabled = true;
    // imgs[2].src = "../1 HomePage/assets/img/details.png";
    // btns[2].className += "";
    // btns[2].className += " services";
    btns[3].disabled = true;
    // imgs[3].src = "../1 HomePage/assets/img/payment.png";
    // btns[3].className += "";
    // btns[3].className += " services";
    document.getElementById("scheduleplantab").style.display = "block";

    // if (btns[1].className == " services-selected") {
    //     document.getElementById("scheduleplantab").style.display = "block";
    //     document.getElementById("setupservicetab").style.display = "none";
    // } else {
    //     document.getElementById("scheduleplantab").style.display = "block";
    //     document.getElementById("setupservicetab").style.display = "none";
    // }
}

function gotobackyourdetails() {
    var header = document.getElementById("bookservice");
    var btns = header.getElementsByClassName("btn");
    var imgs = header.getElementsByTagName("img");
    var hidediv = document.getElementById("setupservicetab");
    var hidediv2 = document.getElementById("scheduleplantab");
    var hidediv3 = document.getElementById("paymenttab");
    hidediv.style.display = "none";
    hidediv2.style.display = "none";
    hidediv3.style.display = "none";
    btns[3].disabled = true;
    // imgs[3].src = "../1 HomePage/assets/img/payment.png";
    // btns[3].className += "";
    // btns[3].className += " services";
    document.getElementById("detailstab").style.display = "block";

    // if (btns[2].className == " services-selected") {
    //     document.getElementById("detailstab").style.display = "block";
    //     document.getElementById("scheduleplantab").style.display = "none";
    //     document.getElementById("setupservicetab").style.display = "none";
    // } else {
    //     document.getElementById("detailstab").style.display = "block";
    //     document.getElementById("scheduleplantab").style.display = "none";
    //     document.getElementById("setupservicetab").style.display = "none";
    // }
}