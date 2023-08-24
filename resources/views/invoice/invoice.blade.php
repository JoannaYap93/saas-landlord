@extends('layouts.master-without-nav')

@section('title')
    Invoice #{{ Arr::get($transaction, 'transaction_number') }}
@endsection

@section('css')
    <style>
        .round-big {
            border-radius: 1rem;
        }

        .download_invoice {
            cursor: pointer;
        }

        @media screen and (max-width: 450px) {
            .download_invoice {
                position: relative !important;
                left: 0 !important;
                text-align: left !important;
            }

            .download_invoice>p {
                text-align: left !important;
            }
        }

    </style>
@endsection

@section('content')
    <div class="col-md-8 offset-md-2 mt-3">
        <div class="text-center align-items-center mb-2">
            {{-- @if (@$invoice->company->hasMedia('company_logo'))
                <img src="{{ @$invoice->company->getFirstMediaUrl('company_logo') }}" alt="" width="15%"
                    style="border-radius: 2rem">
            @else
            @endif --}}
            <img src="{{asset('')}}assets/images/logo-light.svg" alt="" width="20%" style="border-radius: 2rem">
        </div>
        <div class="row m-0">
            <div class="col-12">
                <div class="card round-big">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title m-0">Invoice No: {{ Arr::get($transaction, 'transaction_number') }}</h4>
                                @php
                                    $transaction_mode = Arr::get($transaction, 'transaction_type');
                                @endphp
                                {{-- <p class=" m-0 mt-2">Invoice Date: {{ date_format(new DateTime(Arr::get($transaction, 'created_at')), 'M d, Y h:i A') }} </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-1 round-big">
                    <div class="card-body">
                        <h1 class="card-title" style="font-size: 3rem">
                            RM {{ number_format(Arr::get($transaction, 'subscription_grand_total_price', 0), 2) }}
                        </h1>
                        <h5 class="card-title">Date: {{ date_format(new DateTime(Arr::get($transaction, 'created_at')), 'M d, Y h:i A') }}</h5>
                        <div class="row mt-3">
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td style="font-weight: bold; padding-top: 0px; padding-bottom: 10px">
                                                Company Name: {{ Arr::get($transaction, 'tenant.tenant_name') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; padding-top: 0px; padding-bottom: 10px">
                                                Company Registration Number: {{ Arr::get($transaction, 'tenant.company_reg_no') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; padding-top: 0px; padding-bottom: 10px">
                                                Email: {{ Arr::get($transaction, 'tenant.company_email') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; padding-top: 0px; padding-bottom: 10px">
                                                Phone No: {{ Arr::get($transaction, 'tenant.company_phone_no') }}
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td style="font-weight: bold; padding-top: 0px; padding-bottom: 10px">
                                                Attn: {{ Arr::get($transaction, 'tenant.company_phone_no') }}
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <a href="{{ route('export.invoice', ['tenant' => tenant('id'), 'encrypt_number' => Crypt::encryptString($transaction->transaction_number)]) }}">
                                    <span class="download_invoice position-absolute text-center"
                                        style="left: 50%">
                                        <img src="{{ asset('images/invoice.svg') }}" alt="" width="50px">
                                        <p class="text-center">Click here for download</p>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2 round-big">
                    <div class="card-body">
                        <h4 class="card-title">Invoice Items</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="">
                                    <tr>
                                        <th>#</th>
                                        <th>Subscription Name</th>
                                        <th>Feature Activated</th>
                                        <th>Quantity</th>
                                        <th style="text-align: right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @php
                                            $subscriptionPlan = Arr::get($transaction, 'subscription_plan');
                                        @endphp
                                        @if ($subscriptionPlan)
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                {{ Arr::get($subscriptionPlan, 'subscription_name') }}
                                                <p class="small text-muted">{{ Arr::get($subscriptionPlan, 'subscription_description') }}</p>
                                            </td>
                                            <td>
                                                @foreach ($subscriptionPlan->feature as $feature)
                                                    <p class="text-muted m-0">{{ Arr::get($feature, 'feature_title') }}</p>
                                                @endforeach
                                            </td>
                                            <td>1</td>
                                            <td class="text-right">
                                                RM {{ number_format(Arr::get($transaction, 'subscription_grand_total_price', 0), 2) }}
                                            </td>
                                        @else
                                            <td colspan="5">"No Item"</td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    @stack('multi-payment')
    <script>
        $('#download_invoice').click(function() {
            let link = window.location.href;
            let new_link = link.replace('view_invoice', 'invoice');
            console.log(new_link);
            window.open(new_link, '_blank');
        });



    </script>
@endsection
