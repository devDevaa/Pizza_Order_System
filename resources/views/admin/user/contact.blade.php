@extends('admin.layouts.master')

@section('title', 'Admin List')

@section('content')

    <!-- PAGE CONTAINER-->
    <div class="page-container">


        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Customer Review</h2>

                                </div>
                            </div>

                        </div>

                        @if (session('deleteSuccess'))
                            <div class="col-4 offset-8">
                                <div class="alert alert-warning alert-dismissible fade show " role="alert">
                                    <i class="fa-regular fa-circle-check fa-1x"></i> {{ session('deleteSuccess') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="close"></button>
                                </div>
                            </div>
                        @endif


                        {{-- @if (count($categories) != 0) --}}
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th class="text-center">Account</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Message</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody class=" mt-3">
                                    @foreach ($userMessage as $item)
                                        <tr class="tr-shadow ">
                                            <td class="text-center"> {{ $item->account_name }} </td>
                                            <td class="text-center"> {{ $item->name }} </td>
                                            <td class="text-center">{{ $item->email }}</td>
                                            <td class="text-center">{{ $item->phone }}</td>
                                            <td class="text-center">{{ Str::words($item->message, 5,' ...Read More') }}</td>
                                            <td class="col-2">
                                                <div class="table-data-feature">
                                                    <a href="{{ route('customer#contactDetails', $item->id) }}">
                                                        <button class="item bg-primary ml-2 " data-toggle="tooltip"
                                                            data-placement="top" title="View">
                                                            <i class="fa-solid fa-eye text-white"></i>
                                                        </button></a>
                                                    {{-- <a href="{{ route('product#updatePage', $item->id) }}">
                                                        <button class="item bg-warning ml-2" data-toggle="tooltip"
                                                            data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit text-white"></i>
                                                        </button></a> --}}
                                                    <a href="{{ route('customer#delete', $item->id) }}">
                                                        <button class="item bg-danger ml-2" data-toggle="tooltip"
                                                            data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete text-white"></i>
                                                        </button></a>

                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

    </div>
@endsection
@section('scriptSource')
    <script>
        $(document).ready(function() {


            // // change Status
            // $('.roleChange').change(function () {
            //     $currentRole = $(this).val();
            //     $parentNode = $(this).parents('tr');
            //      $userId = $parentNode.find('.userId').val();

            //     console.log($currentRole);


            //     $data = {
            //         'role' :$currentRole,
            //         'userId':$userId
            //     }

            //     $.ajax({
            //         type :'get',
            //         url:'http://localhost:8000/admin/ajax/account/role/change',
            //         data:$data,
            //         dataType: 'json',

            //     })
            //     // location.reload();
            // })

        });
    </script>

@endsection
