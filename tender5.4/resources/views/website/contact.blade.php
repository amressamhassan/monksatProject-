@extends('layouts.app')
@section('title') المناقصات | اتصل بنا @endsection
@section('active_contact')  class="active"  @endsection
@section('content')

    <!-- start header -->
    <section class="contact-us-header">
        <div class="bg-header">

            <div class="container">
                <div class="row">
                    <div class="col s12 right-align">
                        <h1>تواصل معنا</h1>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end header -->

    <!-- start map -->
    <div id="map"></div>


    <!-- end map -->

    <!-- start contact us-->
    <section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l6">
                     <form class="form-horizontal" action="{{url('/contact')}}" method="post">
                        {{csrf_field()}}
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input name="name" id="icon_prefix" type="text" class="validate">
                            <label for="icon_prefix">الاسم</label>
                        </div>

                        <div class="input-field col s12">
                            <i class="material-icons prefix">person_pin</i>
                            <input  name="company" id="icon_prefix" type="text" class="validate">
                            <label for="icon_prefix">الشركة</label>
                        </div>

                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input  name="email" id="icon_telephone" type="tel" class="validate">
                            <label for="icon_telephone">الايميل</label>
                        </div>

                        <div class="input-field col s12">
                            <i class="material-icons prefix">phone</i>
                            <input  name="ph" id="icon_telephone" type="tel" class="validate">
                            <label for="icon_telephone">رقم الهاتف</label>
                        </div>

                        <div class="input-field col s12">
                            <i class="material-icons prefix fa fa-map-marker"></i>
                            <input  name="address" id="icon_telephone" type="tel" class="validate">
                            <label for="icon_prefix2">العنوان</label>
                        </div>

                        <div class="input-field col s12">
                            <i class="material-icons prefix">comment</i>
                            <textarea  name="mes" id="icon_prefix2" class="materialize-textarea"></textarea>
                            <label for="icon_prefix2">الرسالة</label>
                        </div>
                        <input  type="hidden" id="lan" name="lan" value="0"></input>
                        <input type="hidden" id="lat" name="lat" value="0"></input>
                        <div class="col s12">
                            <button class="hvr-bounce-to-right btn waves-effect waves-light amber" type="submit" name="action">ارسل
                                <i class="material-icons right">send</i>
                            </button>

                            <span class="right"><b>*</b> مطلوب</span>
                        </div>
                     </form>
                </div>
                <div class="col s12 m12 l5 right-align">
                    <div class="info">
                        <p>كن علي</p>
                        <p>تواصل</p>
                        <p>معنا</p>
                    </div>
                    <div class="info-info">
                        <p class="text-lighten-4 center-align"><i class="material-icons prefix center">phone</i> +{{getSetting('phone')}}</p>
                        <p class="text-lighten-4 center-align"><i class="material-icons prefix center">local_post_office</i> {{getSetting('email')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact us-->


    <!-- start map -->
    <script>
        var map, infoWindow;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat:  31.246998899999998, lng:  29.970166199999998},
                zoom: 15
            });
            infoWindow = new google.maps.InfoWindow;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat:31.246998899999998,
                        lng: 29.970166199999998,
                    };
                    $('#lat').val(position.coords.latitude);
                    $('#lan').val(position.coords.longitude);
                    $('#city').val(position.coords.address);
                    infoWindow.setPosition(pos);
                    infoWindow.setContent('  عنوان مناقصات مصر  ');
                    infoWindow.open(map);
                    map.setCenter(pos);
                    var marker = new google.maps.Marker({
                        position: pos,
                        map: map,
                    });
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVA8W4HuhW_31bNVtjqTTv5rSWkP2YaoU&callback=initMap">
    </script>
    <!-- start map -->
@endsection