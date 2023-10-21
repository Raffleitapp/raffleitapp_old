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
                        <th style="min-width: 150px">User</th>
                        <th style="min-width: 100px">Email</th>
                        <th>Phone No.</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="flex justify-center">

                            <span class="mx-2 text-success text-xl"><i class="bi bi-eye-fill"
                                    style="font-size:1rem"></i></span>

                            <span class="mx-2 text-danger text-xl"><i class="bi bi-trash-fill"
                                    style="font-size:1rem"></i></span>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
