<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ارسال مناقصات يوم الاثنين</title>
    <!--Import Google Icon Font-->
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>

        *{
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -o-box-sizing: border-box;
            box-sizing: border-box;
        }

        body
        {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            font-family: 'DroidArabicKufi';
            overflow-x: hidden
        }

        ::-webkit-scrollbar
        {
            width: 7px;  /* for vertical scrollbars */
            height: 7px; /* for horizontal scrollbars */
        }

        ::-webkit-scrollbar-track
        {
            background: rgba(0, 0, 0, 0.1);
        }

        ::-webkit-scrollbar-thumb
        {
            background: #ffc107;
        }

        /* start Tenders */
        .Tenders {padding-bottom: 50px;padding-top: 50px}

        .Tenders h1
        {
            color: #ffc80b;
            font-weight: 100;
            font-size: 30px;
            text-align: center
        }

        .Tenders .box
        {
            border: 1px solid #ccc;
            padding: 20px 10px;
            margin-bottom: 20px;
            width: 20%;
            text-align: center;
            margin: 50px auto;
            -webkit-transition: all .7s ease-in-out;
            -moz-transition: all .7s ease-in-out;
            -o-transition: all .7s ease-in-out;
            transition: all .7s ease-in-out;
        }

        .Tenders .box:hover
        {
            background: #785ea8;
        }

        .Tenders .box:hover h6 {color: #ffc80b}

        .Tenders .box:hover span,
        .Tenders .box:hover p
        {
            color: #fff;
        }

        .Tenders .box:hover button
        {
            background: #ffc80b;
            color: #fff;
            border: 1px solid transparent
        }

        .Tenders .box h6
        {
            margin-bottom: 20px
        }

        .Tenders .box h6,
        .Tenders .box p
        {
            color: #888;
            font-size: large;
        }

        .Tenders .box span
        {
            font-size: 16px;
            font-weight: 600
        }

        .Tenders .box button
        {
            border-radius: 21px;
            background: none;
            border: 1px solid #ffc107;
            color: #ffc107;
            padding: 10px 30px;
            font-size: large;
            cursor: pointer
        }
        /* end Tenders */

        @media (max-width: 767px) {
            .Tenders .box {width: 40%}
            .Tenders .box button {padding: 5px 15px;font-size: 16px;}
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .Tenders .box {width: 30%}
            .Tenders .box button {padding: 10px 20px;font-size: 20px;}
        }

    </style>
</head>
<body>
<!-- start Tenders -->
<section class="Tenders">
    <div class="container">
        <div class="row">
            <div class="col s12 center-align">
                <h1>مناقصات</h1>
                <div class="col s4 offset-s4 box hvr-float-shadow">
                    <h6>مناقصات  {{$day}}</h6>
                    <span>{{$date}}</span>
                    <p>فقط من المناقصات والمزايدات الصادرة مقدمة مجانا من مناقصة</p>
                    <a href="{{asset('/tendersbydate/'.$date.'/'.$interested)}}">
                    <button class="btn waves-effect waves-light" type="submit" name="action">اعرض المناقصات
                    </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end Tenders -->
</body>
</html>
