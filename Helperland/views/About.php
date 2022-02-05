    <?php 
        include 'header.php';
        
        if(isset($_SESSION['base_url'])){
            $_SESSION['base_url'] = "";
            $_SESSION['base_url'] = "?controller=Helperland&function=About";
        }
        else{
            $_SESSION['base_url'] = "?controller=Helperland&function=About";
        }
    ?>
    <title>About</title>

    <section class="bannerimage_about" id="bannerimage">
        <div class="img-fluid">
            <img src="../assets/img/hero-banner-img.png" class="img-fluid" height="370px" width="1560px">
        </div>
    </section>

    <section class="container-fluid">
        <div class="text-center">
            <div class=" justify-content-center align-self-center">
                <h2 class="headingfont"> A Few words about us</h2>
                <div class="separator-line"></div>
                <img src="../assets/img/forma-1-copy-5.png" style="padding-top: 5px;">
                <div class="separator-line"></div>
            </div>
        </div>

        <div class="row text-center justify-content-center">
            <div class="col-md-6 pt-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean molestie convallis tempor. Duis vestibulum vel risus condimentum dictum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis enim orci. Fusce
                risus lacus, sollicitudin eu magna sed, pharetra sodales libero. Proin tincidunt vel erat id porttitor. Donec tristique est arcu, sed dignissim velit vulputate ultricies.
                <br/><br/> Interdum et malesuada fames ac ante ipsum primis in faucibus. In hac habitasse platea dictumst. Vivamus eget mauris eget nisl euismod volutpat sed sed libero. Quisque sit amet lectus ex. Ut semper ligula et mauris tincidunt
                hendrerit. Aenean ut rhoncus orci, vel elementum turpis. Donec tempor aliquet magna eu fringilla. Nam lobortis libero ut odio finibus lobortis. In hac habitasse platea dictumst. Mauris a hendrerit felis. Praesent ac vehicula ipsum, at
                porta tellus. Sed dolor augue, posuere sed neque eget, aliquam ultricies velit. Sed lacus elit, tincidunt et massa ac, vehicula placerat lorem.
            </div>
        </div>
    </section>

    <section class="container-fluid">
        <div class="text-center">
            <div class=" justify-content-center align-self-center">
                <h2 class="headingfont"> Our Story</h2>
                <div class="separator-line"></div>
                <img src="../assets/img/forma-1-copy-5.png" style="padding-top: 5px;">
                <div class="separator-line"></div>
            </div>
        </div>

        <div class="row text-center justify-content-center">
            <div class="col-md-6 pt-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean molestie convallis tempor. Duis vestibulum vel risus condimentum dictum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis enim orci. Fusce
                risus lacus, sollicitudin eu magna sed, pharetra sodales libero. Proin tincidunt vel erat id porttitor. Donec tristique est arcu, sed dignissim velit vulputate ultricies.
                <br/><br/>Interdum et malesuada fames ac ante ipsum primis in faucibus. In hac habitasse platea dictumst. Vivamus eget mauris eget nisl euismod volutpat sed sed libero. Quisque sit amet lectus ex. Ut semper ligula et mauris tincidunt hendrerit.
                <br/><br/>Aenean ut rhoncus orci, vel elementum turpis. Donec tempor aliquet magna eu fringilla. Nam lobortis libero ut odio finibus lobortis. In hac habitasse platea dictumst. Mauris a hendrerit felis. Praesent ac vehicula ipsum, at porta
                tellus. Sed dolor augue, posuere sed neque eget, aliquam ultricies velit. Sed lacus elit, tincidunt et massa ac, vehicula placerat lorem.
            </div>
        </div>
    </section>

    <?php include 'newslatter-small.php' ?>

    <?php include 'footer.php';?>