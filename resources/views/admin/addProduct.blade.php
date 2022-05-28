@extends('layouts.admin.app')
@section('content')
<div class="container">
    <div class="row p-3 m-md-4 bg-white shadow ">
        <div class="col-md-12 py-2 pb-3 d-flex justify-content-between">
            <h3>Add Product</h3>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="form-group bg-white p-3 col-md-6">
                    <label for="pname">Product Type</label>
                    <select class="form-control" id="type-selector" onchange="image_reset(event)">
                        <option value="sp"> Simple Product </option>
                        <option value="vp"> Variable Product </option>
                        <option value="gp"> Grouped Product </option>
                    </select>
                </div>
            </div>

            <div class="sp add-product row">
                <div class="bg-white p-3 col-md-6">
                    <form id="sp_form">
                        <meta name="_token" content="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label for="pname">Product Name</label>
                            <input type="text" name="product_name" id="pname" class="form-control" placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="product_category" class="form-control">
                                    <option value='{{$category->id}}'> {{ $category->name }} </option>
                            </select>
                        </div>
                        <div class="d-flex">
                            <div  class="form-group w-50 px-1">
                                <label for="qty">Qty</label>
                                <input type="text" name="product_qty" id="qty" class="form-control" placeholder="Qty 1">
                            </div>
                            <div class="form-group w-50 px-1">
                                <label for="price">Price</label>
                                <input name="product_price" type="text" id="price" class="form-control" placeholder="pkr 100">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="product_description" type="text" id="description" class="form-control" placeholder="product description">
                            </textarea>
                        </div>
                        <div class=" form-group">
                            <div class="bg-white d-flex justify-content-between">
                                <div class="container mt-3 w-100">
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between bg-white">
                                            <h4>Product Images</h4>
                                            <input type="file" id="sp_image" class="d-none" onchange="image_select(event)" multiple >
                                            <button class="btn btn-sm btn-primary" type="button" onclick="document.getElementById('sp_image').click()">Choose Images</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-5 w-100 d-flex justify-content-start ">
                            <button type="button" id="sp_submit" class="btn btn-primary">Save Product</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 p-3">
                    <div class="bg-white d-flex flex-wrap justify-content-start" id="container">

                    </div>
                </div>
            </div>

            <div class="vp add-product d-none row">
                <div class="bg-white p-3 col-md-6">
                    <form id="vp_form">
                        <meta name="_token" content="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label for="pname">Product Name</label>
                            <input type="text" name="product_name" id="pname" class="form-control" placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="product_category" class="form-control">
                                <option value='{{$category->id}}'> {{ $category->name }} </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="product_description" type="text" id="description" class="form-control" placeholder="product description">
                            </textarea>
                        </div>
                        <div class=" form-group">
                            <div class="bg-white d-flex justify-content-between">
                                <div class="container mt-3 w-100">
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between bg-white">
                                            <h4>Product Images</h4>
                                            <input type="file" id="vp_image" class="d-none" onchange="image_select(event)" multiple >
                                            <button class="btn btn-sm btn-primary" type="button" onclick="document.getElementById('vp_image').click()">Choose Images</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-3">
                            <div class="row">
                                <div id="varient_headings" class="col-md-12 d-none">
                                    <div class="row mb-4">
                                        <div class="col-md-4 col-lg-4">
                                            <label for="varient">Varient</label>
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <label for="varient">Quantity</label>
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                            <label for="varient">Price</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="cover__selected__varient">
                                    <!-- here display selected__ varients -->
                                </div>
                            </div>
                            <div class="row p-0 m-0">
                                <div class="col-md-4 col-lg-4 p-0 px-1">
                                    <label for="varient">Varient</label>
                                    <input type="text" id="varient" class="form-control" placeholder="Varient">
                                </div>
                                <div class="col-md-4 col-lg-3 p-0 px-1">
                                    <label for="qty">Quantity</label>
                                    <input type="number" id="v_qty" class="form-control" placeholder="10">
                                </div>
                                <div class="col-md-4 col-lg-3 p-0 px-1">
                                    <label for="price">Price</label>
                                    <input type="number" id="v_price" class="form-control" placeholder="Price">
                                </div>
                                <div class="col-md-3 col-lg-2 p-0 px-1">
                                    <label for="add_varient"></label><br/>
                                    <button id="add_varients" type="button" class="mt-2 btn btn-success" onclick="add_varient()">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="pt-5 d-flex justify-content-start">
                            <button type="button" id="vp_submit" class="btn btn-primary"> Save Product</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 p-3">
                    <div class="bg-white d-flex flex-wrap justify-content-start" id="vp_container">

                    </div>
                </div>
            </div>

            <div class="gp add-product d-none">
                <div class="">
                    <h3>gp-content</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(()=>{
            // change selected product type
            $('#type-selector').on('change', ()=>{
                $('.add-product').addClass('d-none');
                let curr = '.' + $('#type-selector').val();
                console.log(curr)
                $(curr).removeClass('d-none');
            })
        });
            // this variable will store images for preview
        let images = [];
        let varients = [];
        function add_varient() {
            let varient = $('#varient').val();
            let qty = $('#v_qty').val();
            let price = $('#v_price').val();
            varients.push({
                varient, qty, price
            })
            console.log(varients);
            dispaly_varient();
        }
        function dispaly_varient(){
            if (varients.length > 0 ) {
                $('#cover__selected__varient').html('')
                $('#varient_headings').removeClass('d-none')
            }
            varients.forEach( (ele, index) => {
                $('#cover__selected__varient').append(
                    '<div class="row mb-4">' +
                        '<div class="col-md-4 col-lg-4">'+
                            '<label for="varient">'+ ele.varient +'</label>'+
                        '</div>'+
                        '<div class="col-md-3 col-lg-3">'+
                            '<label for="varient">'+ ele.qty +'</label>'+
                        '</div>' +
                        '<div class="col-md-3 col-lg-3">'+
                            '<label for="varient">'+ ele.price +'</label>'+
                        '</div>'+
                        '<div class="col-md-3 col-lg-2">'+
                            '<label class="fa fa-times" style="cursor:pointer" onclick="varient_remove('+ index +')"  data-index='+ index +'></label>'+
                        '</div>'+
                    '</div>'
                )
            });
        }

        function varient_remove(index)
        {
            if (index > -1)
            {
                varients.splice(index, 1);
            }
            dispaly_varient();
        }


        // Images Preview
        function image_select(e) {
            var image = e.target.files;
            // var image = document.querySelector('.image').files;
            for (i = 0; i < image.length; i++) {
                if (check_duplicate(image[i].name)) {
                    images.push({
                        "name" : image[i].name,
                        "url" : URL.createObjectURL(image[i]),
                        "file" : image[i],
                    })
                } else
                {
                        alert(image[i].name + " is already added to the list");
                }
            }

            // document.getElementById('form').reset();
            document.getElementById('container').innerHTML = image_show();
            document.getElementById('vp_container').innerHTML = image_show();
        }

        // this function will show images in the DOM
        function image_show() {
            var image = "";
            images.forEach((i) => {
                image += `<div class="image_container d-flex justify-content-center position-relative">
                    <img src="`+ i.url +`" alt="Image">
                    <span class="position-absolute" onclick="delete_image(`+ images.indexOf(i) +`)">&times;</span>
                </div>`;
            })
            return image;
        }



        // this function will delete a specific Image from the container
        function delete_image(e) {
            images.splice(e, 1);
            document.getElementById('container').innerHTML = image_show();
            document.getElementById('vp_container').innerHTML = image_show();
        }




        // this function will check duplicate images
        function check_duplicate(name) {
            var image = true;
            if (images.length > 0) {
                for (e = 0; e < images.length; e++) {
                    if (images[e].name == name) {
                        image = false;
                        break;
                    }
                }
            }
            return image;
        }
        // Image Reset
        function image_reset(event) {
            images = [];
            document.getElementById('container').innerHTML = image_show();
            document.getElementById('vp_container').innerHTML = image_show();
        }
        // this function will get all images from the array
        function get_image_data() {
            var form = new FormData()
            for (let index = 0; index < images.length; index++) {
                form.append("file[" + index + "]", images[index]['file']);
            }
            return form;
        }

        let formData;

        $('#sp_submit').click(function(){
            let myForm = document.getElementById('sp_form');
            formData = new FormData(myForm);
            formData.append("type", 'sp');
            for (let index = 0; index < images.length; index++) {
                formData.append("file[" + index + "]", images[index]['file']);
            }
            submit_form_data(formData)
        });

        $('#vp_submit').click(function(){

            alert('vp_form')
            let myForm = document.getElementById('vp_form');
            formData = new FormData(myForm);
            formData.append("type", 'vp');
            for (let index = 0; index < images.length; index++) {
                formData.append("file[" + index + "]", images[index]['file']);
            }
            formData.append("varients", JSON.stringify(varients));
            submit_form_data(formData)
        });

        function submit_form_data (formData) {
            alert("sending data")
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('admin.add-product') }}",
                type: "POST",
                processData: false,
                contentType: false,
                cache: false,
                data: formData,
                success: function (res)
                {
                    console.log(res);
                    if(res.status === 200)
                    {
                        console.log(' successfully send ');
                    }
                }
            })
        }
    </script>
@endpush

