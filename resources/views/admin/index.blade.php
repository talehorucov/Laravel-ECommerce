@extends('admin.admin_master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-primary-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-30 fas fa-badge-dollar"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Bugünkü Satış</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $today_earn }} <small class="text-success">
                                    Azn</small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-warning-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-30 fas fa-badge-dollar"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Bu Aykı Satış</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $month_earn }} <small class="text-success">
                                    Azn</small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-info-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-30 fas fa-badge-dollar"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Bu İlki Satış</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $year_earn }}<small class="text-danger">
                                    Azn</small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-30 fas fa-badge-check"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Təsdiq Gözləyən Sifarişlər</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $pending_count }} <small
                                    class="text-danger"> Sifariş</small></h3>
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
                                        <th class="text-center" style="min-width: 250px"><span
                                                class="text-white">Tarix</span></th>
                                        <th class="text-center" style="min-width: 100px"><span
                                                class="text-fade">Sifariş №</span></th>
                                        <th class="text-center" style="min-width: 100px"><span
                                                class="text-fade">Kupon</span></th>
                                        <th class="text-center" style="min-width: 150px"><span
                                                class="text-fade">Məbləğ</span></th>
                                        <th class="text-center" style="min-width: 150px"><span
                                                class="text-fade">Status</span></th>
                                        <th class="text-center" style="min-width: 120px"><span
                                                class="text-fade">Məlumat</span></th>
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
                                                <a href="{{ route('admin.order.detail',$order->order_number) }}" class="waves-effect waves-light btn btn-primary btn-circle mx-5">
                                                    <span style="font-size: 20px" class="fas fa-info-circle"></span>
                                                </a>
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
