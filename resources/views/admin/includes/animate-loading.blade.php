<style type="text/css">
  #preloader{position:fixed;z-index:1800;top:0;right:0;bottom:0;left:0;width:100%;height:100%;background-color:#5ea1e5}
  .no-js #preloaders,.oldie #preloaders{display:none}
  #loader{position:absolute;top:calc(50% - 1.25em);left:calc(50% - 1.25em)}
  .loader{display:inline-block;width:30px;height:30px;position:relative;border:4px solid #Fff;top:50%;animation:loader 2s infinite ease}
  .loader-inner{vertical-align:top;display:inline-block;width:100%;background-color:#fff;animation:loader-inner 2s infinite ease-in}
  @keyframes loader {
  0%{transform:rotate(0deg)}
  25%{transform:rotate(180deg)}
  50%{transform:rotate(180deg)}
  75%{transform:rotate(360deg)}
  100%{transform:rotate(360deg)}
  }
  @keyframes loader-inner {
  0%{height:0}
  25%{height:0}
  50%{height:100%}
  75%{height:100%}
  100%{height:0}
  }
</style>

<div id='preloader'>
    <div id='loader'>
      <span class='loader'>
        <span class='loader-inner'></span>
      </span>
    </div>
</div>

