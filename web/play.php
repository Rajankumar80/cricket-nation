<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Player</title>

  <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
  <link rel="stylesheet" href="./style.css" />
</head>

<body>
  <video id="player" controls preload="auto" autoplay muted width="100" height="100"></video>

  <script src="https://cdn.jsdelivr.net/npm/hls.js@1.4.0/dist/hls.min.js"></script>
  <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      let video = document.getElementById("player");
      let source = "<?php
      if (isset($_GET["l"]) && array_key_exists($_GET["l"], $TsURLs)) {
        echo $TsURLs[$_GET["l"]];
      } else {
        echo $TsURLs["hindi"];
      }
      ?>";
    const defaultOptions = {};

    if (Hls.isSupported()) {
      const hls = new Hls(defaultOptions);
      hls.loadSource(source);
      hls.on(Hls.Events.MANIFEST_PARSED, function (event, data) {
        const availableQualities = hls.levels.map((l) => l.height);
        availableQualities.unshift(0)

        defaultOptions.controls = [
          "play-large",
          "rewind",
          "play",
          "fast-forward",
          "progress",
          "current-time",
          "mute",
          "volume",
          "captions",
          "settings",
          "pip",
          "fullscreen",
          "airplay",
        ];

        defaultOptions.quality = {
          default: 0,
          options: availableQualities,
          forced: true,
          onChange: (e) => updateQuality(e),
        }

        defaultOptions.i18n = {
          qualityLabel: {
            0: "Auto",
          }
        }



        player = new Plyr(video, defaultOptions);
      });

      hls.attachMedia(video);
      window.hls = hls;
    }

    function updateQuality(newQuality) {
      if (newQuality === 0) {
        window.hls.currentLevel = -1;
      }
      else {
        window.hls.levels.forEach((level, levelIndex) => {
          if (level.height === newQuality) {
            window.hls.currentLevel = levelIndex;
          }
        })
      }
    }
    });
  </script>
</body>

</html>