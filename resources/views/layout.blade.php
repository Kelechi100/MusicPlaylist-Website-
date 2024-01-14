<!doctype html> 
<html lang="en">      
    <head>         
        <meta charset="utf-8">         
        <title>Project 2</title>         
        <meta name="description" content="">         
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="description" content="Laravel Web Development project">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
            crossorigin="anonymous"
        >
    </head>      
    <body>
        <nav class="navbar bg-primary mb-3" data-bs-theme="dark">
            <header class="container">
                <nav class="navbar navbar-expand-md bg-primary mb-3" data-bs-theme="dark">
                    <div class="container">
                        <span class="navbar-brand mb-0 h1">Studnets Record</span> 
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"data-bs-target="#navbarNav"> 
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                           <ul class="navbar-nav"> 
                                <li class="nav-student">
                                    <a class="nav-link" href="/">Home</a>
                                </li>
                                <li class="nav-student">
                                    <a class="nav-link" href="/students">Student</a> 
                                </li>
                                <li class="nav-department">
                                     <a class="nav-link" href="/departments">Department</a>
                                </li> 
                           </ul>
                        </div>
                    </div>
                </nav> 


            </header>
        </nav>
        <main class="container">
            <div class="row">
                <div class ="col">
                    @yield('content')
                </div>
            </div>
        </main> 
        <footer class="text-bg-dark mt-3">
            <div class="container">
                <div class="row py-5">
                    <div class="col">
                        <p>Created by Iloghalu Kelechukwu Agnes 2ITBENG @2024</p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="/js/admin.js"></script> 
    </body>  
</html> 