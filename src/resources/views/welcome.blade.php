<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shahriar Farzam</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@800&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/main.js" type="text/javascript"></script>
    <style>
        .card i {
            color: darkslategray;
        }
        h1 {
            text-align: justify-all;
            font-family: 'Dosis', sans-serif;
        }
        @media (max-width: 480px) {
            .header-text {
                margin-right: 85%;
            }
        }

    </style>
</head>
<body>
<!-- Menu -->

<nav class="navbar navbar-inverse sticky-top bg-light navbar-light">
    <div class="container-fluid">
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h3 class="header-text">Shahriar Farzam</h3>
        <!-- Brand
        <a class="navbar-brand" href="#"><i style="font-size: 2rem;">Shahriar Farzam</i></a>
        -->
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="tel:004917643613808"><h4>Let's talk via Phone</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact-section"><h4>Let's contact via E-Mail</h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#cv-section"><h4>Let's see my CV</h4></a>
                </li>
            </ul>
        </div>


    </div>
</nav>

<!-- End Menu -->

<!-- main Container -->
<div class="container-fluid" style="padding-top: 50px">

    <div class="row ">
        <div class="col-md-6">
            <br>
            <div class="toast" style="margin-left: 5%;margin-top: 2%;" data-autohide="false">
                <div class="toast-header">
                    <strong class="mr-auto text-primary">Welcome</strong>
                    <small class="text-muted">1 mins ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                </div>
                <div class="toast-body" id="toast-text" style="color: #3b5998;background: lightgrey;">
                    <h2 id="city" ></h2>
                    <h5 id="temp" ></h5>
                    <h5 id="temp-feels" ></h5>
                    <h5 id="temp-max" ></h5>
                    <h5 id="temp-min" ></h5>
                    <h5 id="weather" ></h5>
                </div>
            </div>
            <h1 style="margin-top: 2em;margin-left:0.5em;font-size: 4.9rem;line-height: 1.5;">
                Hi, I'm Shahriar.<br> I am a Creative Web Developer living in Nuremberg, Germany since 2019.
            </h1>
        </div>

        <div class="col-md-6" style="width: fit-content;">
            <div >
                <img src="{{ asset('img/Img-Intro.png') }}" class="img-responsive" alt="I am Software Engineer" style="width: 100%;height: 100%;">
            </div>

        </div>

    </div>

    <!-- 2nd Row -->
    <div class="row ">
        <div class="col-md-6" style="width: fit-content;">
            <div>
                <img src="img/Img-Intro2.png" class="img-responsive" alt="I am Software Engineer" style="width: 100%;height: 100%;">
            </div>
        </div>

        <div class="col-md-6 d-flex align-items-center ">
            <h1 style="font-size: 5rem;line-height: 1.5;">
                I could <s style="color: lightgray">solve every Problem</s> find the best way to solve the Problems and Developing them.
            </h1>
        </div>

    </div>

    <!-- 3rd Row -->
    <div class="row">
        <div class="col-md-6 d-flex align-items-center ">

            <div class="card text-center" style="margin: 2em;">
                <div class="card-header text-left"><h4>Skills</h4></div>
                <div class="card-content">
                    <!-- 1st Row -->
                    <div class="row text-center" style="padding: 1.5em;">
                        <div class="col s4 m2">
                            <i class="fab fa-html5 fa-5x"></i> <br> HTML
                        </div>
                        <div class="col s4 m2">
                            <i class="fab fa-css3 fa-5x" ></i> CSS
                        </div>
                        <div class="col s4 m2">
                            <i class="fab fa-bootstrap fa-5x" ></i> Bootstrap
                        </div>
                        <div class="col s4 m2">
                            <i class="fab fa-js fa-5x" ></i> <br> JS
                        </div>
                        <div class="col s4 m2">
                            <i class="fab fa-github fa-5x" ></i>  GitHub
                        </div>
                        <div class="col s4 m2">
                            <i class="fab fa-git-alt fa-5x" ></i> <br>Git
                        </div>
                    </div>

                    <!-- 2nd Row -->
                    <div class="row text-center" style="padding: 2em;">
                        <div class="col s4 m2">
                            <i class="fab fa-bitbucket fa-5x"></i> <br> Bitbucket
                        </div>
                        <div class="col s4 m2">
                            <i class="fab fa-docker fa-5x" ></i> Docker
                        </div>
                        <div class="col s4 m2">
                            <i class="fas fa-database fa-5x" ></i> Database
                        </div>
                        <div class="col s4 m2">
                            <i class="fab fa-php fa-5x" ></i> <br> PHP
                        </div>
                        <div class="col s4 m2">
                            <i class="fab fa-laravel fa-5x" ></i><br>  Laravel
                        </div>

                    </div>

                    <!-- 3rd Row -->
                    <div class="row text-center" style="padding: 1.5em;">
                        <div class="col s4 m2">
                            <i class="fab fa-windows fa-5x"></i> <br> Windows
                        </div>
                        <div class="col s4 m2">
                            <i class="fab fa-linux fa-5x" ></i> <br> Linux
                        </div>
                        <div class="col s4 m2">
                            <i class="fab fa-ubuntu fa-5x" ></i> <br> Ubuntu
                        </div>
                        <div class="col s4 m2">
                            <i class="fas fa-cloud fa-5x" ></i> <br> Cloud
                        </div>

                    </div>

                    <div class="card-footer text-left">
                        <h5>For more details let's see <a href="#cv-section">my CV</a></h5>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-6" style="width: fit-content;">
            <div>
                <img src="img/Img-Skill.png" class="img-responsive" alt="Skills" style="width: 100%;height: 100%;">
            </div>
        </div>

    </div>

    <!-- 4rd Row -->
    <div class="row " id="project-section">
        <div class="col-md-6" style="width: fit-content;">
            <div>
                <img src="img/Img-project.png" class="img-responsive" alt="I am Software Engineer" style="width: 100%;height: 100%;">
            </div>
        </div>

        <div class="col-md-6 d-flex align-items-center text-center " style="padding-left: 10%;">
            <h1 style="font-size: 5rem;line-height: 1.5;" class="d-flex align-items-center text-center">
                <a class="btn btn-outline-dark btn-lg" href="https://github.com/shfarzam/docker-laravel" style="width: 100%;font-size: 2.2rem" role="button">  See some Sample Projects here...</a>
            </h1>

        </div>

    </div>

    <!-- 5rd Row -->
    <div class="row " id="cv-section">

        <div class="col-md-6 d-flex align-items-center ">
            <h1 style="font-size: 5rem;line-height: 1.5;">
                Let's download my CV to know me a little bit more...
                <br>
                <a class="btn btn-outline-dark btn-lg text-center" href="files/cv.pdf" style="width: 30%;font-size: 2.2rem" role="button" download="Farzam CV">  Download </a>
            </h1>

        </div>
        <div class="col-md-6" style="width: fit-content; padding-left: 1%;">
            <div>
                <img src="img/Img-resume.png" class="img-responsive" alt="My Resume" style="width: 100%;height: 100%;">
            </div>
        </div>

    </div>


    <!-- 6rd Row -->
    <div class="row " id="contact-section">
        <div class="col-md-6" style="width: fit-content;">
            <div>
                <img src="img/Img-Contact.png" class="img-responsive" alt="Contact Me" style="width: 100%;height: 100%;">
            </div>
        </div>

        <div class="col-md-6 d-flex align-items-center text-center " style="width: 100%;">
            <div class="card text-left" style="width: 90%;">
                <div class="card-body">
                    <h2 class="card-title">Contact Information</h2>
                    <p class="card-text"><h4>You could easily try to contact me...</h4></p>
                    <h5>
                        E-Mail: <a href="mailto:sh.farzam@hotmail.com" class="card-link">sh.farzam@hotmail.com</a>
                        <br>
                        Phone: <a href="tel:+4917643613808" class="card-link">+49-17643613808</a>
                    </h5>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- End Main Container -->

<!-- Begin Footer -->
<footer class="bg-light text-center text-white" style="padding-top: 3em">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Linkedin -->
            <a id="skype" class="btn btn-primary btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button">
                <i class="fab fa-skype"></i></a>

            <!-- Facebook -->
            <a id="facebook" class="btn btn-primary btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button">
                <i class="fab fa-facebook-f"></i>
            </a>

            <!-- Twitter -->
            <a id="twitter" class="btn btn-primary btn-floating m-1" style="background-color: #55acee;" href="#!" role="button">
                <i class="fab fa-twitter"></i>
            </a>

            <!-- Google -->
            <a id="google" class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button">
                <i class="fab fa-google"></i></a>

            <!-- Instagram -->
            <a id="instagram" class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button">
                <i class="fab fa-instagram"></i>
            </a>

            <!-- Linkedin -->
            <a id="linkedin" class="btn btn-primary btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button">
                <i class="fab fa-linkedin-in"></i></a>

            <!-- Github -->
            <a id="github" class="btn btn-primary btn-floating m-1"  style="background-color: #333333;"  href="http://www.github.com" role="button">
                <i class="fab fa-github"></i></a>
        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2021 Copyright:
        <a class="text-white" href="mailto:sh.farzam@hotmail.com">Shahriar Farzam</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- End Footer -->

</body>
</html>
