$(document).pjax('div', '#pjax-container');

//Refresh URL container
function getURLs() {
  $.pjax.reload({
   container:'#urls',
   timeout: false,
   push: false,
   replace: false,
   async: false,
   url: 'getURLs.php'
  });
}

function getDateandTime() {
  $.pjax.reload({
    container:'#time',
    timeout: false,
    push: false,
    replace: false,
    url: 'getDateandTime.php'
  });
}

function refresh() {
  getURLs();
  getDateandTime();
}

$(document).on('pjax:send', function() {
  $('#urls').hide();
  $('#loader').show();
});

$(document).on('pjax:complete', function() {
  $('#urls').show();
  $('#loader').hide();
});

$(function() {
  $.pjax.defaults.timeout = false;
  refresh();
  setInterval(refresh, 10 * 60 * 1000); //refresh every 10 minutes
});
