<template>
    <main>
      <div class="bienvenida text-center">
        <h1 style="color: white; font-family: 'Press Start 2P', cursive;" class="">App para biblioteca modelo</h1>
        <div class="container_mouse mt-5">
          <span  class="mouse-btn">
            <span  class="mouse-scroll"></span>
          </span>
        </div>
      </div>
    </main>
  </template>
  
  <style scoped>
  .bienvenida {
    margin: 10%;
  }
  
  i {
    margin: 2%;
    font-size: 42px;
  }
  
  .mouse-btn {
    margin: 10px auto;
    width: 40px;
    height: 80px;
    border: 3px solid var(--color-main1);
    border-radius: 20px;
    display: flex;
  }
  
  .mouse-scroll {
    display: block;
    width: 20px;
    height: 20px;
    background: var(--color-main1);
    border-radius: 50%;
    margin: auto;
    animation: scrolling13 1.5s linear infinite;
  }
  
  @keyframes scrolling13 {
    0% {
      opacity: 0;
      transform: translateY(-20px);
    }
  
    100% {
      opacity: 1;
      transform: translateY(20px);
    }
  }
  </style>