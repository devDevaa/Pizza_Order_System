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
                                    <h2 class="title-1">Admin List</h2>

                                </div>
                            </div>
                            <div class="table-data__tool-right">
                                <a href="{{ route('auth#registerPage') }}">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>add account
                                    </button>
                                </a>
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    CSV download
                                </button>
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
                        <div class="row">
                            <div class="col-3">
                                <h3>Search Key: <span class="text-danger"> {{ request('key') }} </span></h3>
                            </div>
                            <div class=" offset-6 col-3 mb-4">
                                <form class=" form-header " action="{{ route('admin#list') }}" method="GET">
                                    <input class="au-input au-input--sm" type="text" name="key"
                                        placeholder="Search for data.." value="{{ request('key') }}" />
                                    <button class="au-btn--submit bg-dark" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- @if (count($categories) != 0) --}}
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th class="text-center">Photo</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Gender</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody class=" mt-3">
                                    @foreach ($admin as $item)
                                        <tr class="tr-shadow ">
                                            <input type="hidden" class="userId" value="{{ $item->id }}">
                                            <td class=" col-2 ">
                                                @if ($item->image == null)
                                                    @if ($item->gender == 'male')
                                                        <img src="{{ asset('image/male_user.png' . $item->image) }}"
                                                            class=" img-thumbnail shadow-sm" alt="">
                                                    @else
                                                        <img src="{{ asset('image/female_user.png' . $item->image) }}"
                                                            class=" img-thumbnail shadow-sm" alt="">
                                                    @endif
                                                @else
                                                    <img src="{{ asset('storage/' . $item->image) }}"
                                                        class=" img-thumbnail shadow-sm" alt="">
                                                @endif
                                            </td>

                                            <td class="text-center"> {{ $item->name }} </td>
                                            <td class="text-center">{{ $item->email }}</td>
                                            <td class="text-center">{{ $item->gender }}</td>
                                            <td class="text-center">{{ $item->phone }}</td>
                                            <td class="text-center">{{ $item->address }}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    @if (Auth::user()->id == $item->id)
                                                   @else
                                                   <select name="roleStatus" id="" class="roleChange">
                                                    <option value="admin" @if ($item->role == 'admin')
                                                        selected
                                                    @endif>Admin</option>
                                                    <option value="user"@if ($item->role == 'user')
                                                        selected
                                                    @endif>User</option>
                                                </select>
                                                @endif
                                                </div>

                                            </td>


                                            <td class="col-2 text-center">
                                                <div class="table-data-feature">
                                                    @if (Auth::user()->id == $item->id)
                                                    @else
                                                        <a href="{{ route('admin#changeRole', $item->id) }}">
                                                            <button class="item bg-success ml-2" data-toggle="tooltip"
                                                                data-placement="top" title="Change Role">
                                                                <i class="fa-solid fa-pencil text-white "></i>
                                                            </button></a>
                                                        <a href="{{ route('admin#delete', $item->id) }}">
                                                            <button class="item bg-danger ml-2" data-toggle="tooltip"
                                                                data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete text-white"></i>
                                                            </button></a>
                                                    @endif


                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <div class=" mt-3">
                                {{ $admin->appends(request()->query())->links() }}
                            </div> --}}
                        </div>
                        {{-- @else
                            <h3 class=" text-secondary text-center mt-5">Ooop! There is no Category Here!!</h3>
                        @endif --}}
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


            // change Status
            $('.roleChange').change(function () {
                $currentRole = $(this).val();
                $parentNode = $(this).parents('tr');
                 $userId = $parentNode.find('.userId').val();

                console.log($currentRole);


                $data = {
                    'role' :$currentRole,
                    'userId':$userId
                }

                $.ajax({
                    type :'get',
                    url:'http://localhost:8000/admin/ajax/account/role/change',
                    data:$data,
                    dataType: 'json',

                })
                // location.reload();
            })

        });
    </script>

@endsection
