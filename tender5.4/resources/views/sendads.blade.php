<!DOCTYPE html>
<html>
<head>
    <style>
        div.gallery {
            margin: 0 auto;
            border: 1px solid #ccc;
            width: 40%;
            padding: 10px;
        }

        div.gallery:hover {
            border: 1px solid #777;
        }

        div.gallery img {
            width: 100%;
            height: auto;
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="gallery">
    <div class="desc"><h1>{{$title}}</h1></div>
    <a target="_blank" href="{{$image}}">
        <img src="{{$image}}" alt="Trolltunga Norway" width="1000" height="800">
    </a>
    <div class="desc">{{$des}}</div>
</div>

</body>
</html>
