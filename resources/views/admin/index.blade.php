@extends('admin.admin_master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-primary-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Bugünkü Satış</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $today_earn }} <small class="text-success"><i
                                        class="fa fa-caret-up"></i> Azn</small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-warning-light rounded w-60 h-60">
                            <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Bu Aykı Satış</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $month_earn }} <small class="text-success"><i
                                        class="fa fa-caret-up"></i> Azn</small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-info-light rounded w-60 h-60">
                            <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Bu İlki Satış</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $year_earn }}<small class="text-danger"><i
                                        class="fa fa-caret-down"></i> Azn</small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Təsdiq Gözləyən Sifarişlər</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $pending_count }} <small
                                    class="text-danger"><i class="fa fa-caret-up"></i> Sifariş</small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title align-items-start flex-column">
                            Son Sifarişlər
                        </h4>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <thead>
                                    <tr class="text-uppercase bg-lightest">
                                        <th class="text-center" style="min-width: 250px"><span class="text-white">Tarix</span></th>
                                        <th class="text-center" style="min-width: 100px"><span class="text-fade">Sifariş №</span></th>
                                        <th class="text-center" style="min-width: 100px"><span class="text-fade">Kupon</span></th>
                                        <th class="text-center" style="min-width: 150px"><span class="text-fade">Məbləğ</span></th>
                                        <th class="text-center" style="min-width: 150px"><span class="text-fade">Status</span></th>
                                        <th class="text-center" style="min-width: 120px"><span class="text-fade">Məlumat</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr>
                                            <td class="text-center">
                                                <span class="text-fade font-weight-600 d-block font-size-16">
                                                    {{ Carbon\Carbon::parse($order->created_at)->diffForHumans() }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-white font-weight-600 d-block font-size-16">
                                                    {{ $order->order_number }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-white font-weight-600 d-block font-size-16">
                                                    {{ $order->coupon ?? '----' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-white font-weight-600 d-block font-size-16">
                                                    {{ $order->amount ?? $order->discount_amount }} Azn
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-primary-light badge-lg">
                                                    {{ $order->status }}
                                                </span>
                                            </td>
                                            <td class="text-right text-center">
                                                <a href="#"
                                                    class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                        class="mdi mdi-bookmark-plus"></span></a>
                                                <a href="#"
                                                    class="waves-effect waves-light btn btn-info btn-circle mx-5"><span
                                                        class="mdi mdi-arrow-right"></span></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <span class="text-center text-danger">Sifariş Yoxdur</span> 
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
