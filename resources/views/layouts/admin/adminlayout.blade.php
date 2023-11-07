<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    {{-- link'resources/css/app.css' --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/master.css') }}" rel="stylesheet">

</head>

<body>

    <div class="admin-layout">
        <div class="admin-sidebar"  style="overflow-y: auto !important; min-height:90vh ">
            <div class="side-logo p-3 text-center">
                <img src="{{ asset('img/logo.png') }}" class="mx-auto" height="auto" width="120px" alt="">
            </div>
            <hr style="background: white; height:2px">
            <div class="side-item">

                <li
                    class="{{ request()->is('admin/dashboard*') ? 'active' : (request()->is('admin') ? 'active' : '') }}">
                    <a href="{{ route('admin.dashboard') }}" class="link-text"><span style="margin: 0 12px 0 0"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 30 30"
                                fill="none">
                                <path
                                    d="M6.25 13.75H11.25C12.625 13.75 13.75 12.625 13.75 11.25V6.25C13.75 4.875 12.625 3.75 11.25 3.75H6.25C4.875 3.75 3.75 4.875 3.75 6.25V11.25C3.75 12.625 4.875 13.75 6.25 13.75Z"
                                    fill="currentColor" />
                                <path
                                    d="M6.25 26.25H11.25C12.625 26.25 13.75 25.125 13.75 23.75V18.75C13.75 17.375 12.625 16.25 11.25 16.25H6.25C4.875 16.25 3.75 17.375 3.75 18.75V23.75C3.75 25.125 4.875 26.25 6.25 26.25Z"
                                    fill="currentColor" />
                                <path
                                    d="M16.25 6.25V11.25C16.25 12.625 17.375 13.75 18.75 13.75H23.75C25.125 13.75 26.25 12.625 26.25 11.25V6.25C26.25 4.875 25.125 3.75 23.75 3.75H18.75C17.375 3.75 16.25 4.875 16.25 6.25Z"
                                    fill="currentColor" />
                                <path
                                    d="M18.75 26.25H23.75C25.125 26.25 26.25 25.125 26.25 23.75V18.75C26.25 17.375 25.125 16.25 23.75 16.25H18.75C17.375 16.25 16.25 17.375 16.25 18.75V23.75C16.25 25.125 17.375 26.25 18.75 26.25Z"
                                    fill="currentColor" />
                            </svg></span> <span>Dashboard</span></a>
                </li>
                <li class="{{ request()->is('admin/category*') ? 'active' : '' }}">
                    <a href="{{ route('admin.category') }}" class="link-text"><span style="margin: 0 12px 0 0"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 30 30"
                                fill="none">
                                <circle cx="15" cy="12.5" r="3.75" stroke="#FDFDFD" stroke-width="2"
                                    stroke-linecap="round" />
                                <circle cx="15" cy="15" r="11.25" stroke="#FDFDFD" stroke-width="2" />
                                <path
                                    d="M22.2256 23.533C22.3846 23.4458 22.4597 23.2569 22.3925 23.0885C21.9105 21.8806 20.982 20.8168 19.7268 20.0415C18.3707 19.204 16.7093 18.75 15 18.75C13.2908 18.75 11.6293 19.204 10.2732 20.0415C9.01805 20.8168 8.0895 21.8806 7.60748 23.0885C7.54029 23.2569 7.61545 23.4458 7.77435 23.533C12.2746 26.0037 17.7254 26.0037 22.2256 23.533Z"
                                    fill="#FDFDFD" />
                            </svg></span> <span>Category</span></a>
                </li>
                <li class="{{ request()->is('admin/raffle*') ? 'active' : '' }}"><a class="link-text"
                        href="{{ route('admin.raffle') }}"><span style="margin: 0 12px 0 0"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 30 30"
                                fill="none">
                                <path
                                    d="M15 2.5C8.1 2.5 2.5 8.1 2.5 15C2.5 21.9 8.1 27.5 15 27.5C21.9 27.5 27.5 21.9 27.5 15C27.5 8.1 21.9 2.5 15 2.5ZM24.325 11.4L20.85 12.8375C20.2125 11.1375 18.875 9.7875 17.1625 9.1625L18.6 5.6875C21.225 6.6875 23.3125 8.775 24.325 11.4ZM15 18.75C12.925 18.75 11.25 17.075 11.25 15C11.25 12.925 12.925 11.25 15 11.25C17.075 11.25 18.75 12.925 18.75 15C18.75 17.075 17.075 18.75 15 18.75ZM11.4125 5.675L12.875 9.15C11.15 9.775 9.7875 11.1375 9.15 12.8625L5.675 11.4125C6.6875 8.775 8.775 6.6875 11.4125 5.675ZM5.675 18.5875L9.15 17.15C9.7875 18.875 11.1375 20.225 12.8625 20.85L11.4 24.325C8.775 23.3125 6.6875 21.225 5.675 18.5875ZM18.6 24.325L17.1625 20.85C18.875 20.2125 20.225 18.8625 20.85 17.1375L24.325 18.6C23.3125 21.225 21.225 23.3125 18.6 24.325Z"
                                    fill="#FDFDFD" />
                            </svg></span> <span>Raffles</span></a></li>
                <li><a class="link-text" href=""><span style="margin: 0 12px 0 0"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 30 30"
                                fill="none">
                                <path d="M18 21V3L15 5L12 3L9 5L6 3V21L9 19.5L12 21L15 19.5L18 21Z" stroke="#FDFDFD"
                                    stroke-width="2" stroke-linejoin="round" />
                                <path d="M10 9H14" stroke="#FDFDFD" stroke-width="2" stroke-linecap="round" />
                                <path d="M10 15H14" stroke="#FDFDFD" stroke-width="2" stroke-linecap="round" />
                                <path d="M10 12H14" stroke="#FDFDFD" stroke-width="2" stroke-linecap="round" />
                            </svg></span> <span>Tickets</span></a></li>
                <li class="{{ request()->is('admin/users*') ? 'active' : '' }}">
                    <a href="{{ url('admin/users') }}" class="link-text"><span style="margin: 0 12px 0 0"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 30 30"
                                fill="none">
                                <circle cx="15" cy="12.5" r="3.75" stroke="#FDFDFD" stroke-width="2"
                                    stroke-linecap="round" />
                                <circle cx="15" cy="15" r="11.25" stroke="#FDFDFD" stroke-width="2" />
                                <path
                                    d="M22.2256 23.533C22.3846 23.4458 22.4597 23.2569 22.3925 23.0885C21.9105 21.8806 20.982 20.8168 19.7268 20.0415C18.3707 19.204 16.7093 18.75 15 18.75C13.2908 18.75 11.6293 19.204 10.2732 20.0415C9.01805 20.8168 8.0895 21.8806 7.60748 23.0885C7.54029 23.2569 7.61545 23.4458 7.77435 23.533C12.2746 26.0037 17.7254 26.0037 22.2256 23.533Z"
                                    fill="#FDFDFD" />
                            </svg></span> <span>Users</span></a>
                </li>
                <li class="{{ request()->is('admin/admins*') ? 'active' : '' }}">
                    <a href="{{ route('admin.admins') }}" class="link-text" href=""><span
                            style="margin: 0 12px 0 0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 30 30" fill="none">
                                <circle cx="15" cy="10" r="4" stroke="#FDFDFD" stroke-width="2"
                                    stroke-linecap="round" />
                                <path
                                    d="M18.8684 9.875C19.2331 9.24337 19.8338 8.78247 20.5382 8.5937C21.2427 8.40494 21.9934 8.50376 22.625 8.86843C23.2566 9.2331 23.7175 9.83375 23.9063 10.5382C24.0951 11.2427 23.9962 11.9934 23.6316 12.625C23.2669 13.2566 22.6662 13.7175 21.9618 13.9063C21.2573 14.0951 20.5066 13.9962 19.875 13.6316C19.2434 13.2669 18.7825 12.6662 18.5937 11.9618C18.4049 11.2573 18.5038 10.5066 18.8684 9.875L18.8684 9.875Z"
                                    stroke="#FDFDFD" stroke-width="2" />
                                <path
                                    d="M6.36843 9.875C6.7331 9.24337 7.33375 8.78247 8.03825 8.5937C8.74274 8.40494 9.49337 8.50376 10.125 8.86843C10.7566 9.2331 11.2175 9.83375 11.4063 10.5382C11.5951 11.2427 11.4962 11.9934 11.1316 12.625C10.7669 13.2566 10.1662 13.7175 9.46175 13.9063C8.75726 14.0951 8.00663 13.9962 7.375 13.6316C6.74337 13.2669 6.28247 12.6662 6.0937 11.9618C5.90494 11.2573 6.00376 10.5066 6.36843 9.875L6.36843 9.875Z"
                                    stroke="#FDFDFD" stroke-width="2" />
                                <path
                                    d="M21.1021 22.5L20.1218 22.6974L20.2834 23.5H21.1021V22.5ZM25.9907 21.4L26.9444 21.0993L25.9907 21.4ZM18.4761 18.3882L17.8712 17.5918L16.7147 18.4703L17.9479 19.2373L18.4761 18.3882ZM25.1173 21.5H21.1021V23.5H25.1173V21.5ZM25.0369 21.7008C25.0319 21.6846 25.0273 21.6531 25.0351 21.6148C25.0425 21.5786 25.0578 21.5511 25.0724 21.5332C25.1006 21.4985 25.1241 21.5 25.1173 21.5V23.5C26.2764 23.5 27.3627 22.4258 26.9444 21.0993L25.0369 21.7008ZM21.2501 18.5C23.6003 18.5 24.6028 20.324 25.0369 21.7008L26.9444 21.0993C26.4501 19.5318 24.9971 16.5 21.2501 16.5V18.5ZM19.0809 19.1845C19.6043 18.787 20.297 18.5 21.2501 18.5V16.5C19.8532 16.5 18.7369 16.9343 17.8712 17.5918L19.0809 19.1845ZM17.9479 19.2373C19.333 20.0988 19.8985 21.589 20.1218 22.6974L22.0824 22.3026C21.8154 20.9769 21.0786 18.8292 19.0042 17.539L17.9479 19.2373Z"
                                    fill="#FDFDFD" />
                                <path
                                    d="M11.5241 18.3881L12.0522 19.2373L13.2855 18.4703L12.1289 17.5918L11.5241 18.3881ZM4.00951 21.4L3.0558 21.0993L3.0558 21.0993L4.00951 21.4ZM8.89805 22.5V23.5H9.71673L9.87837 22.6974L8.89805 22.5ZM8.75013 18.5C9.70313 18.5 10.3959 18.787 10.9192 19.1845L12.1289 17.5918C11.2632 16.9343 10.147 16.5 8.75013 16.5V18.5ZM4.96321 21.7008C5.39735 20.324 6.39985 18.5 8.75013 18.5V16.5C5.00306 16.5 3.55009 19.5318 3.0558 21.0993L4.96321 21.7008ZM4.88289 21.5C4.87604 21.5 4.89952 21.4985 4.9278 21.5332C4.9424 21.5511 4.95771 21.5786 4.96506 21.6148C4.97284 21.6531 4.9683 21.6846 4.96321 21.7008L3.0558 21.0993C2.63749 22.4258 3.72376 23.5 4.88289 23.5V21.5ZM8.89805 21.5H4.88289V23.5H8.89805V21.5ZM9.87837 22.6974C10.1016 21.589 10.6671 20.0988 12.0522 19.2373L10.996 17.539C8.92152 18.8291 8.18472 20.9769 7.91774 22.3026L9.87837 22.6974Z"
                                    fill="#FDFDFD" />
                                <path
                                    d="M15 17.5C19.6726 17.5 20.8519 20.9933 21.1495 22.7566C21.2414 23.3012 20.8023 23.75 20.25 23.75H9.75C9.19772 23.75 8.75856 23.3012 8.85048 22.7566C9.14812 20.9933 10.3274 17.5 15 17.5Z"
                                    stroke="#FDFDFD" stroke-width="2" stroke-linecap="round" />
                            </svg></span> <span>Administrators</span></a>
                </li>

                <li class="{{ request()->is('admin/payment-setting*') ? 'active' : '' }}">
                    <a href="{{ url('admin/payment-setting') }}" class="link-text" href=""><span
                            style="margin: 0 12px 0 0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z" />
                                <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z" />
                            </svg></span> <span>Payment Setting</span></a>
                </li>
                <li>
                    <a href="{{ url('/logout') }}" class="link-text" href=""><span
                            style="margin: 0 12px 0 0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                <path fill-rule="evenodd"
                                    d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                            </svg></span> <span>Logout</span></a>
                </li>



            </div>
        </div>
        <div class="admin-section-head">
            <div class="admin-head">

                <div class="menu-btn">
                    <i class="bi bi-list"></i>
                </div>
                <div class="flex align-items-center">
                    <span class="mx-3"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                            viewBox="0 0 30 30" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18.61 3.61183C17.5222 3.05954 16.294 2.75 15 2.75C10.9323 2.75 7.51511 5.80853 7.06591 9.85134L6.75116 12.6841C6.69796 13.1629 6.6753 13.3634 6.64216 13.5577C6.51903 14.2799 6.28329 14.9783 5.94356 15.6274C5.85213 15.802 5.74866 15.9752 5.50082 16.3883L4.70989 17.7065L4.67239 17.769C4.30178 18.3865 3.96733 18.9438 3.7731 19.4121C3.56959 19.9028 3.40084 20.5732 3.77578 21.2354C4.15072 21.8976 4.81235 22.0978 5.33784 22.1758C5.83936 22.2502 6.48928 22.2501 7.20947 22.25H7.20949L7.28237 22.25H22.7176L22.7905 22.25H22.7905C23.5107 22.2501 24.1606 22.2502 24.6621 22.1758C25.1876 22.0978 25.8493 21.8976 26.2242 21.2354C26.5991 20.5732 26.4304 19.9028 26.2269 19.4121C26.0327 18.9438 25.6982 18.3865 25.3276 17.769L25.2901 17.7065L24.4992 16.3883C24.2513 15.9752 24.1479 15.802 24.0564 15.6274C23.7167 14.9783 23.481 14.2799 23.3578 13.5577C23.3315 13.4031 23.3117 13.2447 23.278 12.9454C23.0238 12.9814 22.7641 13 22.5 13C22.0721 13 21.6557 12.9511 21.2559 12.8587L21.2611 12.905L21.2646 12.9372V12.9372C21.3132 13.3744 21.3422 13.6353 21.3863 13.8939C21.5446 14.8224 21.8477 15.7203 22.2845 16.5548C22.4061 16.7872 22.5411 17.0122 22.7674 17.3893L22.7674 17.3894L22.7842 17.4173L23.5751 18.7355C23.9954 19.436 24.2491 19.8641 24.3795 20.1783L24.3862 20.1947L24.3686 20.1974C24.0322 20.2473 23.5345 20.25 22.7176 20.25H7.28237C6.46548 20.25 5.96783 20.2473 5.63135 20.1974L5.61378 20.1947L5.62053 20.1783C5.75084 19.8641 6.00459 19.436 6.42488 18.7355L7.2158 17.4173L7.23252 17.3894C7.45883 17.0123 7.59387 16.7872 7.71551 16.5548C8.15231 15.7203 8.4554 14.8224 8.61371 13.8939C8.65779 13.6353 8.68677 13.3745 8.73533 12.9373L8.73533 12.9373L8.73892 12.905L9.05368 10.0722C9.39034 7.04226 11.9514 4.75 15 4.75C15.876 4.75 16.7117 4.93927 17.466 5.28092C17.7425 4.65453 18.1326 4.08949 18.61 3.61183ZM21.0174 5.48683C20.4136 5.93228 20.0173 6.64292 20.0005 7.44687C20.3772 8.01924 20.6589 8.66176 20.8221 9.35334C21.2657 9.7552 21.8543 10 22.5 10C22.6523 10 22.8014 9.98638 22.9462 9.9603L22.9341 9.85134C22.7483 8.1792 22.0547 6.67544 21.0174 5.48683ZM24.4459 20.3803C24.4461 20.3849 24.4464 20.3875 24.4466 20.3876C24.4466 20.3876 24.4467 20.3872 24.4466 20.3863C24.4466 20.3852 24.4463 20.3832 24.4459 20.3803ZM24.576 20.1505C24.5801 20.1482 24.5825 20.1472 24.5826 20.1473C24.5828 20.1474 24.5808 20.1485 24.576 20.1505ZM5.41734 20.1473C5.41752 20.1472 5.41989 20.1482 5.42394 20.1505C5.41919 20.1485 5.41716 20.1474 5.41734 20.1473ZM5.55406 20.3803C5.55394 20.3849 5.55356 20.3875 5.5534 20.3876C5.55324 20.3877 5.55331 20.3854 5.55406 20.3803Z"
                                fill="#FDFDFD" />
                            <path
                                d="M11.3778 22.0809C11.5914 23.2769 12.0622 24.3338 12.7171 25.0876C13.3721 25.8414 14.1745 26.25 15 26.25C15.8255 26.25 16.6279 25.8414 17.2829 25.0876C17.9378 24.3338 18.4086 23.2769 18.6222 22.0809"
                                stroke="#FDFDFD" stroke-width="2" stroke-linecap="round" />
                            <circle cx="22.5" cy="7.5" r="3" fill="#F44343" stroke="#F44343" />
                        </svg></span>
                    <div class="admin-img">
                        <img src="{{ asset('img/icon/user.png') }}" alt="">
                    </div>
                </div>

            </div>
            <div class="admin-content">
                <div class="container-fluid">
                    @yield('master-admin')
                </div>

            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        // $("div.toggle").hide();
        let toggle = false;


        if ($(window).width() < 961) {
            // $('.content-container').load('mobile-content.html');
            $("div.menu-btn i").show();
            // $(".conta").css("display", "none");
            $(".admin-layout .admin-sidebar").addClass("active-tog");
            $(".admin-layout .admin-sidebar").removeClass("active");


            $(".admin-layout .admin-section-head").addClass("active");


        } else {
            // $('.content-container').load('desktop-content.html');
            $("div.menu-btn i").hide();
            // $(".conta").css("display", "flex");
            $(".admin-layout .admin-section-head").removeClass("active");
            $(".admin-layout .admin-sidebar").addClass("active");
            $(".admin-layout .admin-sidebar").removeClass("active-tog");

            toggle = false;

        }
        $(window).resize(function() {
            if ($(window).width() < 961) {
                $("div.menu-btn i").show();
                $(".admin-layout .admin-sidebar").addClass("active-tog");
                $(".admin-layout .admin-sidebar").removeClass("active");
                $(".admin-layout .admin-section-head").addClass("active");


            } else {
                $("div.menu-btn i").hide();
                // $(".conta").css("display", "flex");
                $(".admin-layout .admin-section-head").removeClass("active");
                $(".admin-layout .admin-sidebar").removeClass("active-tog");

                toggle = false;

            }
        });
        $('div.menu-btn i').click(function() {

            if (!toggle) {
                $(".admin-layout .admin-sidebar").addClass("active-tog");
                // $(".admin-layout .admin-sidebar").removeClass("active");
                $(".admin-layout .admin-sidebar").css('top', '0');

                // $(".admin-layout .admin-section-head").addClass("active");
                toggle = true;

            } else {
                // $(".admin-layout .admin-section-head").removeClass("active");
                // $(".admin-layout .admin-sidebar").addClass("active");
                $(".admin-layout .admin-sidebar").addClass("active");
                $(".admin-layout .admin-sidebar").removeClass("active-tog");
                $(".admin-layout .admin-sidebar").css('top', '60px');



                toggle = false;
            }

        });
    </script>

</body>

</html>
