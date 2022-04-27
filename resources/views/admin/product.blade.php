@extends('layouts.admin.app')
@section('content')
<div class="container">
    <div class="row p-3 mb-4 bg-white shadow rounded">
    <div class="col-md-12 p-3 px-md-3">
            <div class="px-2">
                <div class="p-2 pr-3 d-flex justify-content-between">
                    <div>
                        <h3> Products List </h3>
                    </div>
                </div>
                <div class="col-md-12 overflow-auto">
                    <table class="table" style="min-width: 700px">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Big Smokey Burgers</td>
                                <td><img src="https://picsum.photos/200" width="90px" height="50px" class="rounded"></td>
                                <td>£ 1.67</td>
                                <td>Fit Kitchen</td>
                                <td>Halal, Vegen</td>
                                <td><a href="#">View</a> | <a href="#">Remove request</a></td>
                            </tr>
                            <!-- test -->
                            <tr>
                                <td>Big Smokey Burgers</td>
                                <td><img src="https://picsum.photos/200" width="90px" height="50px" class="rounded"></td>
                                <td>£ 1.67</td>
                                <td>Fit Kitchen</td>
                                <td>Halal, Vegen</td>
                                <td><a href="#">View</a> | <a href="#">Remove request</a></td>
                            </tr>
                            <tr>
                                <td>Big Smokey Burgers</td>
                                <td><img src="https://picsum.photos/200" width="90px" height="50px" class="rounded"></td>
                                <td>£ 1.67</td>
                                <td>Fit Kitchen</td>
                                <td>Halal, Vegen</td>
                                <td><a href="#">View</a> | <a href="#">Remove request</a></td>
                            </tr>
                            <tr>
                                <td>Big Smokey Burgers</td>
                                <td><img src="https://picsum.photos/200" width="90px" height="50px" class="rounded"></td>
                                <td>£ 1.67</td>
                                <td>Fit Kitchen</td>
                                <td>Halal, Vegen</td>
                                <td><a href="#">View</a> | <a href="#">Remove request</a></td>
                            </tr>
                            <tr>
                                <td>Big Smokey Burgers</td>
                                <td><img src="https://picsum.photos/200" width="90px" height="50px" class="rounded"></td>
                                <td>£ 1.67</td>
                                <td>Fit Kitchen</td>
                                <td>Halal, Vegen</td>
                                <td><a href="#">View</a> | <a href="#">Remove request</a></td>
                            </tr>
                            <!--  -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

