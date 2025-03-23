$(document).on('DOMContentLoaded livewire:navigated', function () {
  if (window.location.pathname !== "/livewire") return;

  var $input = $("#animated-placeholder");
  if (!$input.length || $input.data("animated")) return; // Cegah animasi dobel

  $input.data("animated", true); // Tandai bahwa animasi sudah jalan

  var longUrl = "https://example.com/very/long/url/path";
  var shortUrl = "https://lovilink.com/myurl";
  var typingSpeed = 70;
  var deletingSpeed = 40;
  var pauseAfterTyping = 1500;
  var i = 0;

  function typePlaceholder(text, callback) {
    if (i < text.length) {
      $input.attr("placeholder", $input.attr("placeholder") + text.charAt(i));
      i++;
      setTimeout(function () {
        typePlaceholder(text, callback);
      }, typingSpeed);
    } else if (callback) {
      setTimeout(callback, pauseAfterTyping);
    }
  }

  function deletePlaceholder(callback) {
    if (i > 0) {
      $input.attr("placeholder", $input.attr("placeholder").slice(0, -1));
      i--;
      setTimeout(function () {
        deletePlaceholder(callback);
      }, deletingSpeed);
    } else if (callback) {
      callback();
    }
  }

  $input.attr("placeholder", "");
  typePlaceholder(longUrl, function () {
    deletePlaceholder(function () {
      i = 0;
      typePlaceholder(shortUrl);
    });
  });
});