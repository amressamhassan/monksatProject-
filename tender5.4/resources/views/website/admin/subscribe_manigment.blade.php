@extends('layouts.admin')
@section('title')
    اضافة مناقصة@endsection

@section('content')
    <div class="main-content">
        <div class="panel-content">

            <div class="container">
                <div class="row">
                    <h2 class="main-title-sec">ادارة المناقصات</h2><br>
                    <h3 class="text-right">مناقصات 2017</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="right">التسلسل</th>
                            <th class="right">عنوان</th>
                            <th class="right">اسم الشركة</th>
                            <th class="right">جريدة</th>
                            <th class="right">وصف</th>
                            <th class="right">تصنيف</th>
                            <th class="right">صورة</th>
                            <th class="right">الادارة</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row" class="right">1</th>
                            <td>Mark</td>
                            <td>7Ds</td>
                            <td>Al Ahram</td>
                            <td>Mark Mark</td>
                            <td>web site</td>
                            <td class="text-center">
                                <img class="center-block img-responsive" src="images/logo-1.png" data-toggle="modal" data-target="#myModal">
                            </td>
                            <td class="text-center">
                                <button class="btn btn-info">تعديل</button>
                                <button class="btn btn-danger">حذف</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <nav aria-label="Page navigation">
                        <div class="container">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img class="img-responsive" src="images/logo-1.png" style="width: 100%;height: 500px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <h3 class="text-right">مناقصات 2018</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="right">التسلسل</th>
                            <th class="right">عنوان</th>
                            <th class="right">اسم الشركة</th>
                            <th class="right">جريدة</th>
                            <th class="right">وصف</th>
                            <th class="right">تصنيف</th>
                            <th class="right">صورة</th>
                            <th class="right">الادارة</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row" class="right">1</th>
                            <td>Mark</td>
                            <td>7Ds</td>
                            <td>Al Ahram</td>
                            <td>Mark Mark</td>
                            <td>web site</td>
                            <td>
                                <!-- Button trigger modal -->
                                <img class="center-block img-responsive" src="images/logo-1.png" data-toggle="modal" data-target="#myModal">
                            </td>
                            <td class="text-center">
                                <button class="btn btn-info">تعديل</button>
                                <button class="btn btn-danger">حذف</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <nav aria-label="Page navigation">
                        <div class="container">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img class="img-responsive" src="images/logo-1.png" style="width: 100%;height: 500px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- Panel Content -->
        <!-- Panel Content -->
    </div>
@endsection