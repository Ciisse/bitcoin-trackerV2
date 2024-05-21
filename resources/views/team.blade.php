<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onze Team</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: black; 
        }
        .spline-embed-container {
            width: 100%;
            height: 100%;
            position: relative;
        }
        spline-viewer {
            width: 100%;
            height: 100%;
            display: block;
        }
        a {
            cursor: pointer; 
        }
    </style>
</head>
<body>
    <div class="spline-embed-container">
        <spline-viewer loading-anim-type="none" url="https://prod.spline.design/qI-URCQqBuj2hva8/scene.splinecode"></spline-viewer>
    </div>
    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.3.8/build/spline-viewer.js"></script>
</body>
</html>
