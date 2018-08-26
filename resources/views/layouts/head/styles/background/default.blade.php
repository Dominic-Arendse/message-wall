<style>
  #background {
    width: 100vw;
    height: 100vh;

    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);

    background-image: url({{ url('/images/backgrounds/default.jpg') }});
    background-size: 25%;
    background-position: center;
    background-repeat: repeat;
  }
  
  #background_dimmer {
    width: 100vw;
    height: 100vh;
    
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);

    background: linear-gradient(rgba(255, 255, 255, 1), rgba(255, 255, 255, 1), rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.25));
  }
</style>