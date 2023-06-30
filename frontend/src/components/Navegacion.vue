<template>
    <main id="inicio">
      <nav class="navbar navbar-expand-lg bg-trasparent">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" height=200px >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-center  mt-3 " id="navbarNav">
            <ul class="navbar-nav text-center">
              <li class="nav-item hvr-float">
                <a class="nav-link mx-5" aria-current="page" href="#inicio">inicio</a>
              </li>
              <li class="nav-item hvr-float">
                <a class="nav-link  mx-5" href="#socios">Socios</a>
              </li>
              <li class="nav-item hvr-float">
                <a class="nav-link  mx-5" href="#prestamos">Prestamos</a>
              </li>
              <li class="nav-item hvr-float">
                <a class="nav-link  mx-5" target="_blank" href="#acercade">Acerca de</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </main>
  </template>
  
  <style scoped>
  a {
    color: rgb(255, 0, 0);
    font-size: 24px;
    padding: 1cm;
    border-radius: 10%;
  }
  navbar-toggler{
    background-color: #fa8072; border-radius:10%;
    
  }
  a:hover {
    color: #fa8072;
  }
  
  a:focus {
    color: aliceblue;
  }
  
  /* Float */
  .hvr-float {
    display: inline-block;
    vertical-align: middle;
    -webkit-transform: perspective(1px) translateZ(0);
    transform: perspective(1px) translateZ(0);
    box-shadow: 0 0 1px rgba(0, 0, 0, 0);
    -webkit-transition-duration: 0.3s;
    transition-duration: 0.3s;
    -webkit-transition-property: transform;
    transition-property: transform;
    -webkit-transition-timing-function: ease-out;
    transition-timing-function: ease-out;
  }
  
  .hvr-float:hover,
  .hvr-float:focus,
  .hvr-float:active {
    -webkit-transform: translateY(-8px);
    transform: translateY(-8px);
  }
  </style>