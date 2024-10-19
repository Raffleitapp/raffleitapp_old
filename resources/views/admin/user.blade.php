@extends('layouts.admin.adminlayout')
@section('master-admin')
<style>
    h2.head {
        color: #000;

        /* H3 Bold */
        font-family: Poppins;
        font-size: 1.5rem;
        font-style: normal;
        font-weight: 700;
        line-height: 90%;
    }

    p.head-desc {
        color: #000;

        /* Title 1 */
        font-family: Poppins;
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
        font-family: Poppins;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: 140%;
    }

    .profile-image{
        height: 50px;
        width: 50px;
        border-radius: 50%;
        object-fit: cover;
        object-position: center;
    }
</style>
<div class="p-3">
    <h2 class="head">All Users</h2>
    <p class="head-desc">Manage your users</p>

</div>
<div class="card p-3">
    <h2 class="head">All Users</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-responsive">
            <thead>
                <tr class="text-center">
                    <th>S/No</th>
                    <th>Cover Image</th>
                    <th style="min-width: 150px">User</th>
                    <th style="min-width: 100px">Email</th>
                    <th>Username.</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $user = DB::table('users')->where('user_type', 1)->paginate(15)->withQueryString(['custom_page' => 'page']);
                @endphp
                @foreach ($user as $index => $item)
                <tr class="text-center align-middle">
                    <td>{{$index + 1}}</td>
                    <td>
                        <img class="profile-image mx-auto" src="{{asset('uploads/images/'.$item->image)}}" alt="">
                    </td>
                    <td>{{$item->first_name.' '.$item->last_name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->username}}</td>
                    <td><button class="btn btn-sm {{$item->status == 1 ? 'btn-success' : 'btn-danger'}}">{{$item->status == 1 ? 'Active' : 'Deactive'}}</button></td>
                    <td class="">
                        <div class="flex justify-center">
                            <span class="mx-2 text-success text-xl"><i class="bi bi-eye-fill" style="font-size:1rem"></i></span>

                            {{-- <span class="mx-2 text-danger text-xl"><i class="bi bi-trash-fill" style="font-size:1rem"></i></span> --}}

                        </div>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    {{ $user->links('vendor.pagination.bootstrap-5') }}

</div>
@endsection
