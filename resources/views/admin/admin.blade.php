@extends('layouts.admin.adminlayout')
@section('master-admin')
<style>
    h2.head {
        color: #000;

        /* H3 Bold */

        font-size: 1.5rem;
        font-style: normal;
        font-weight: 700;
        line-height: 90%;
    }

    p.head-desc {
        color: #000;

        /* Title 1 */

        font-size: .8rem;
        font-style: normal;
        font-weight: 400;
        line-height: 90%;
    }

    table thead {
        background: var(--primary-color);
        color: var(--white-color);
        padding: 8px 0px;

    }

    table thead tr {
        padding: 8px 0px;
        color: var(--white-color, #FDFDFD);
        /* Title 3 Bold */

        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: 140%;
    }
</style>
<div class="row align-items-center justify-between">
    <div class="col-6">
        <div class="p-3">
            <h2 class="head">Administrators</h2>
            <p class="head-desc">Manage your admins</p>

        </div>
    </div>
    <div class="col-6 ">
        <button class="btn btn-sm btn-outline-primary float-end mx-auto hover:bg-black hover:text-white p-2 " onclick="location.href='{{url('/admin/new-admin')}}'">Add New Admin</button>
    </div>
</div>


<div class="card p-3">
    <h2 class="head">All Admins</h2>
    @if (session()->has('message'))
    <div class="alert text-center alert-success" role="alert">
        {{session()->get('message')}}
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-hover table-responsive">
            <thead>
                <tr class="text-center">
                    <th>S/No</th>
                    <th style="min-width: 150px">User</th>
                    <th style="min-width: 100px">Email</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $data = DB::table('users')->where("user_type", 2)->get();
                @endphp

                @if (count($data) > 0)
                @foreach ($data as $index => $row)
                <tr class="text-center">
                    <td>{{$index + 1}}</td>
                    <td>{{$row->first_name.' '.$row->last_name}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->username}}</td>
                    <td><button  class="btn btn-sm {{$row->status == 1 ? 'btn-success' : 'btn-danger'}}">{{$row->status == 1 ? 'Active' : 'Deactive'}}</button></td>
                    <td class="">
                        <div class="flex justify-center">
                            <span onclick="location.href='{{url('admin/admin/'.$row->id)}}'" class="mx-2 text-success text-xl"><i class="bi bi-eye-fill" style="font-size:1rem"></i></span>

                            <span class="mx-2 text-danger text-xl"><i class="bi bi-trash-fill" style="font-size:1rem"></i></span>

                        </div>

                    </td>
                </tr>
                @endforeach

                @endif

                @if (count($data) == 0)
                <tr class="text-center">
                    <td colspan="6">No data found</td>

                </tr>
                @endif

            </tbody>
        </table>
    </div>
</div>
@endsection
